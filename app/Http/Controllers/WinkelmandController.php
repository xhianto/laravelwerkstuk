<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Request;

class WinkelmandController extends Controller
{
    public function index() {
        $winkelmand = null;
        if (Request::session()->exists('winkelmand')){
            $winkelmand = Request::session()->get('winkelmand');
        }
        $totaal = 0;
        if ($winkelmand != null){
            foreach ($winkelmand as $item){
                $totaal += $item[0]->prijs * $item[1];
            }
        }
        return view('winkelmand.index', [
            'winkelmand' => $winkelmand,
            'totaal' => $totaal
        ]);
    }

    public function afhandelen(\Illuminate\Http\Request $request){
        switch ($request->input('keuze')) {
            case 'afrekenen':
                $winkelmand = Request::session()->pull('winkelmand');
                $userId = $request->input('user');
                foreach ($winkelmand as $item){
                    $voorstelling = $item[0];
                    $voorstelling->users()->attach([
                        $userId => [
                            'aantal' => $item[1]
                        ]
                    ]);
                    $voorstelling->gereserveerd =+ $item[1];
                    $voorstelling->save();
                }
                return redirect(route('films'));
            case 'winkelwagenlegen':
                Request::session()->forget('winkelmand');
                return redirect(route('winkelmand'));
        }
    }
}
