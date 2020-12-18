<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nieuwsitem;
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
        $title = $request->input('title');
        $tekst = $request->input('tekst');
        \DB::insert('insert into nieuwsitems (title, afbeeldinguri, tekst, created_at, updated_at) values (?, ?, ?, ?, ?)', [$title, 'Plaatje moet nog komen', $tekst, now(), now()]);
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
            $title = $request->input('title');
            $tekst = $request->input('tekst');
            $itemid = $request->input('itemId');
            $afbeelinguri = "Hier komt afbeelding";
            \DB::update('update nieuwsitems set title = ?, tekst = ?, afbeeldinguri = ?, updated_at = ? where id = ?', [$title, $tekst, $afbeelinguri, now(), $itemid]);
        }
        return redirect(route('nieuws'));
    }

    public function verwijder(Request $request){
        if ($request->input('keuze') == "verwijder"){
            \DB::delete('delete from nieuwsitems  where id = ?', [$request->input('itemId')]);
        }
        return redirect(route('nieuws'));
    }

    public function authentication() {

    }
}
