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
        $nieuwsItems = Nieuwsitem::all();
        return view('nieuws.index', [
            "nieuwsItems" => $nieuwsItems
        ]);
    }

    public function nieuwstoevoegen(Request $request) {
        Nieuwsitem::create([
            'title' => $request->input('title'),
            'tekst' => $request->input('tekst'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $item = Nieuwsitem::latest()->first();
        if ($request->hasFile('image')){
            if ($request->file('image')->isValid()) {
                $request->validate([
                    'image' => 'mimes:jpeg,png|max:5000'
                ]);
                $extension = $request->image->extension();

                $request->image->storeAs('/public/images', "nieuws". $item->id .".". $extension);
                $url = Storage::url('images/nieuws'. $item->id .".". $extension);
                $item->afbeeldinguri = $url;
                $item->save();
            }
        }
        return redirect(route('nieuws'));
    }

    public function bewerkverwijder(Request $request) {
        $id = $request->input('nieuwsItem');
        $item = Nieuwsitem::find($id);
        switch ($request->input('keuze')) {
            case 'bewerk':
                return view('nieuws/bewerk', [
                    "item" => $item
                ]);
            case 'verwijder':
                return view('nieuws/verwijder', [
                    "item" => $item
                ]);
        }
    }

    public function bewerk(Request $request){
        if ($request->input('keuze') == "bewerk"){
            $item = Nieuwsitem::find($request->input('itemId'));
            if ($request->hasFile('image')){
                if ($request->file('image')->isValid()) {
                    $request->validate([
                        'image' => 'mimes:jpeg,png|max:5000'
                    ]);
                    $extension = $request->image->extension();
                    $path = \Str::replaceArray("storage", ["public"], $item->afbeeldinguri);
                    Storage::delete($path);
                    $request->image->storeAs('/public/images', "nieuws". $item->id .".". $extension);
                    $url = Storage::url('images/nieuws'. $item->id .".". $extension);
                    $item->afbeeldinguri = $url;
                }
            }
            $item->title = $request->input('title');
            $item->tekst = $request->input('tekst');
            $item->save();
        }
        return redirect(route('nieuws'));
    }

    public function verwijder(Request $request){
        if ($request->input('keuze') == "verwijder"){
            $item = Nieuwsitem::find($request->input('itemId'));
            $item->delete();
        }
        return redirect(route('nieuws'));
    }
}
