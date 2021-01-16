<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FAQsController extends Controller
{
    public function index() {
        $categories = Faq::all()->pluck('categorie')->unique()->sort();
        return view('faq.index', [
            'categories' => $categories,
            'faqs' => null
        ]);
    }

    public function categorie(Request $request) {
        $categorie = $request->input('categorie');
        $categories = Faq::all()->pluck('categorie')->unique()->sort();
        $faqs = Faq::where('categorie', $categorie)->get();
        return view('faq.index', [
            'faqs' => $faqs,
            'categories' => $categories
        ]);
    }

    public function nieuweFaq(){
        return view('faq.nieuwefaq');
    }

    public function faqAanmaken(Request $request) {
        $data = request()->validate([
            'categorie' => ['required', 'string', 'min:3'],
            'vraag' => ['required', 'string', 'min:5'],
            'antwoord' => ['required', 'string', 'min:10'],
        ]);
        Faq::create($data);
        return redirect(route('faq'));
    }

    public function faqBewerkVerwijder(Request $request){
        $id = $request->input('faqItem');
        switch ($request->input('keuze')) {
            case 'bewerk':
                return redirect(route('faqBewerk', [
                    'id' => $id
                ]));
            case 'verwijder':
                return redirect(route('faqVerwijder', [
                    'id' => $id
                ]));
        }
    }

    public function bewerk($id){
        $item = Faq::find($id);
        return view('faq.bewerk', [
            'item' => $item
        ]);
    }

    public function verwijder($id){
        $item = Faq::find($id);
        return view('faq.verwijder', [
            'item' => $item
        ]);
    }

    public function bewerken(Request $request){
        if ($request->input('keuze') == "bewerk"){
            request()->validate([
                'categorie' => ['required', 'string', 'min:3'],
                'vraag' => ['required', 'string', 'min:5'],
                'antwoord' => ['required', 'string', 'min:10'],
            ]);
            $item = Faq::find($request->input('itemId'));
            $item->vraag = $request->input('vraag');
            $item->antwoord = $request->input('antwoord');
            $item->categorie = $request->input('categorie');
            $item->save();
        }
        return redirect(route('faq'));
    }

    public function verwijderen(Request $request){
        if ($request->input('keuze') == "verwijder"){
            $item = Faq::find($request->input('itemId'));
            $item->delete();
        }
        return redirect(route('faq'));
    }
}
