<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Voorstelling;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isEmpty;

class FilmsController extends Controller
{
    public function index(){
        $films = Film::all();
        return view('films.index', [
            'films' => $films,
        ]);
    }

    public function voorstelling($id){
        $film = Film::find($id);
        $voorstellingen = Voorstelling::where('film_id', $id)->get();
        return view('films.voorstellingen', [
            'film' => $film,
            'voorstellingen' => $voorstellingen,
        ]);
    }

    public function inWinkelMandje(Request $request){
        $voorstelling = Voorstelling::find($request->input('voorstelling'));
        $beschikbaar = $voorstelling->zaal->plaatsen - $voorstelling->gereserveerd;
        $getal = "aantal". $request->input('voorstelling');
        $messages = array(
            $getal.'.required' => 'Aantal is verplicht.',
            $getal.'.min' => 'Aantal moet minimaal :min zijn.',
            $getal.'.max' => 'Er zijn maar :max plaats(en) beschikbaar.',
            $getal.'.numeric' => 'Aantal moet een nummer zijn.',
        );
        $rules = array(
            $getal => 'required|numeric|min:1|max:'. $beschikbaar
        );
        request()->validate($rules, $messages);
        if (!$request->session()->exists('winkelmand')){
            $winkelmand = array([$voorstelling, $request->input($getal)]);
            $request->session()->put('winkelmand', $winkelmand);
            session()->save();
        }
        else{
            $request->session()->push('winkelmand', [$voorstelling, $request->input($getal)]);
            session()->save();
        }
        return Redirect(route('winkelmand'));
    }
}
