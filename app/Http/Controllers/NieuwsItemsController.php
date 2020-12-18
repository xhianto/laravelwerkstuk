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
        $title = $request->input('title');
        $tekst = $request->input('tekst');
        $image = $request->file('image');
        \DB::insert('insert into nieuwsitems (title, tekst, afbeeldinguri, created_at, updated_at) values (?, ?, ?, ?, ?)', [$title, $tekst, "1", now(), now()]);
        $item = \DB::table('nieuwsitems')->latest()->first();
        if ($request->hasFile('image')){
            if ($request->file('image')->isValid()) {
                $validated = $request->validate([
                    'image' => 'mimes:jpeg,png|max:5000'
                ]);
                $extension = $request->image->extension();

                $request->image->storeAs('/public/images', $item->id . "." . $extension);
                $url = Storage::url('images/'. $item->id .".". $extension);
                \DB::update('update nieuwsitems set afbeeldinguri = ? where id = ?', [$url, $item->id]);
            }
        }
        return redirect(route('nieuws'));
    }

    function valideerPicture($picture){
        if ($_FILES["picture"]["size"] != 0){
            if ($picture["size"] > 26214400 ){
                return "file is too big (max: 25mb)";
            }else if (strtolower($picture["type"]) == "image/jpeg" || strtolower($picture["type"] == "image/png")){
                $upload_dir = "uploads/";
                if ($picture["error"] == "UPLOAD_ERR_OK"){
                    $tmp_name = $picture["tmp_name"];
                    $name = basename($picture["name"]);
                    move_uploaded_file($tmp_name, "$upload_dir/$name");
                }
                return "";
            }
            return "Picture is not a jpg or png file";
        }
        else{
            return "Picture required";
        }


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
