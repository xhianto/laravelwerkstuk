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
        $data = request()->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'username' => ['required', 'string', 'min:4','max:20', 'unique:users'],
            'geboortedatum' => ['required', 'date_format:d/m/Y', 'before:tomorrow'],
            'voornaam' => ['required', 'string'],
            'familienaam' => ['required', 'string'],
            'straat' => ['required', 'string'],
            'huisnummer' => ['required', 'string'],
            'postcode' => ['required', 'numeric', 'min:1000', 'max:9999'],
            'plaats' => ['required', 'string']
        ]);
        $data['geboortedatum'] = date('Y-m-d', strtotime(\Str::replaceArray('/',['-','-'],$data['geboortedatum'])));
        $data['role_id'] = $request->input('soortGebruiker');
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect(route('gebruikersbeheer'));
    }
}
