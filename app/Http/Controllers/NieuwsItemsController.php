<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nieuwsitem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use function GuzzleHttp\json_decode;

class NieuwsItemsController extends Controller
{
    public function nieuws() {
        $nieuwsItems = Nieuwsitem::orderBy('created_at', 'desc')->take(10)->get();
        return view('nieuws.index', [
            'nieuwsItems' => $nieuwsItems
        ]);
    }

    public function nieuwstoevoegen(Request $request) {
        $data = request()->validate([
            'title' => ['required', 'string'],
            'tekst' => ['required', 'string', 'min:10'],
        ]);
        Nieuwsitem::create($data);
        $item = Nieuwsitem::latest()->first();
        if ($request->hasFile('image')){
            if ($request->file('image')->isValid()) {
                $request->validate([
                    'image' => 'mimes:jpeg,png|max:5000'
                ]);
                $extension = $request->image->extension();

                $request->image->storeAs('/public/images', "nieuws". $item->id .".". $extension);
                $url = Storage::url('images/nieuws'. $item->id .".". $extension);
                $item->afbeelding = $url;
                $item->save();
            }
        }
        return redirect(route('nieuws'));
    }

    public function bewerkverwijder(Request $request) {
        $id = $request->input('nieuwsItem');
        switch ($request->input('keuze')) {
            case 'bewerk':
                return redirect(route('bewerk', [
                    'id' => $id
                ]));
            case 'verwijder':
                return redirect(route('verwijder', [
                    'id' => $id
                ]));
        }
    }
    public function bewerk($id){
        $item = Nieuwsitem::find($id);
        return view('nieuws.bewerk', [
            'item' => $item
        ]);
    }

    public function verwijder($id){
        $item = Nieuwsitem::find($id);
        return view('nieuws.verwijder', [
            'item' => $item
        ]);
    }

    public function bewerken(Request $request){
        if ($request->input('keuze') == "bewerk"){
            request()->validate([
                'title' => ['required', 'string'],
                'tekst' => ['required', 'string', 'min:10'],
            ]);
            $item = Nieuwsitem::find($request->input('itemId'));
            if ($request->hasFile('image')){
                if ($request->file('image')->isValid()) {
                    $request->validate([
                        'image' => 'mimes:jpeg,png|max:5000'
                    ]);
                    $extension = $request->image->extension();
                    $path = \Str::replaceArray("storage", ["public"], $item->afbeelding);
                    Storage::delete($path);
                    $request->image->storeAs('/public/images', "nieuws". $item->id .".". $extension);
                    $url = Storage::url('images/nieuws'. $item->id .".". $extension);
                    $item->afbeelding = $url;
                }
            }
            $item->title = $request->input('title');
            $item->tekst = $request->input('tekst');
            $item->save();
        }
        return redirect(route('nieuws'));
    }

    public function verwijderen(Request $request){
        if ($request->input('keuze') == "verwijder"){
            $item = Nieuwsitem::find($request->input('itemId'));
            $item->delete();
        }
        return redirect(route('nieuws'));
    }
}
