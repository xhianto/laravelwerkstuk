<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Validator;

class GebruikersBeheerController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'userame' => ['required', 'max:20', 'unique:users'],
        ]);
    }
    public function index()
    {
        $beheerders = User::where('role_id', 1)->orderBy('username')->get();
        $users = User::where('role_id', 2)->orderBy('username')->get();
        return view('gebruikersbeheer.index', [
            'beheerders' => $beheerders,
            'users' => $users
        ]);
    }

    public function gebruikerNaarBeheerder(Request $request) {
        if ($request->input('gebruiker') != 0){
            $user = User::find($request->input('gebruiker'));
            $user->role_id = 1;
            $user->save();
        }
        return redirect(route('gebruikersbeheer'));
    }

    public function beheerderNaarGebruiker(Request $request) {
        if ($request->input('beheerder') != 0){
            $beheerder = User::find($request->input('beheerder'));
            $beheerder->role_id = 2;
            $beheerder->save();
        }
        return redirect(route('gebruikersbeheer'));
    }

    public function beheerRegistreer(Request $request){
        $geboortedatum = date('Y-m-d', strtotime($request->input('geboortedatum')));
        User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role_id' => $request->input('soortGebruiker'),
            'voornaam' => $request->input('voornaam'),
            'familienaam' => $request->input('familienaam'),
            'straat' => $request->input('straat'),
            'huisnummer' => $request->input('huisnummer'),
            'postcode' => $request->input('postcode'),
            'plaats' => $request->input('plaats'),
            'geboortedatum' => $geboortedatum,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect(route('gebruikersbeheer'));
    }
}
