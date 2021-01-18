<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Rules\PWValidation;
use Illuminate\Support\Str;

class ProfielController extends Controller
{
    public function profiel($username) {
        $user = User::where('username', $username)->first();
        return view('profiel.index', [
            'user' => $user
        ]);
    }

    public function opslaan($username, Request $request) {
        request()->validate([
            'straat' => ['required', 'string'],
            'huisnummer' => ['required', 'string'],
            'postcode' => ['required', 'numeric', 'min:1000', 'max:9999'],
            'plaats' => ['required', 'string'],
            'geboortedatum' => ['required', 'date_format:d/m/Y', 'before:tomorrow'],
        ]);
        $user = User::where('username', $username)->first();
        if ($request->hasFile('avatar')){
            if ($request->file('avatar')->isValid()) {
                $request->validate([
                    'avatar' => 'mimes:jpeg,png|max:5000'
                ]);
                $extension = $request->avatar->extension();
                $path = \Str::replaceArray("storage", ["public"], $user->avatar);
                Storage::delete($path);
                $request->avatar->storeAs('/public/images', "avatar". $user->id .".". $extension);
                $url = Storage::url('images/avatar'. $user->id .".". $extension);
                $user->avatar = $url;
            }
        }

        $user->biografie = $request->input('biografie');
        $user->straat = $request->input('straat');
        $user->huisnummer = $request->input('huisnummer');
        $user->postcode = $request->input('postcode');
        $user->plaats = $request->input('plaats');
        $user->geboortedatum = date('Y-m-d', strtotime(Str::replaceArray('/',['-','-'],$request->input('geboortedatum'))));

        if ($request->input('oldpassword') != null){
            request()->validate([
                'oldpassword' => ['string', new PWValidation],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            if ($request->input('password') != null && $request->input('password') == $request->input('password_confirmation')){
                $user->password = bcrypt($request->input('password'));
            }
        }


        $user->updated_at = now();
        $user->save();
        return redirect( route('profiel', ['username' => $user->username]));
    }

    public function users() {
        $users = User::all();
        return view('profiel.users', [
            'users' => $users
        ]);
    }

    public function reserveringen($username) {
        $user = User::where('username', $username)->first();
        $voorstellingen = $user->voorstellingen()->get();
        return view('profiel.reserveringen', [
            'user' => $user,
            'voorstellingen' => $voorstellingen,
        ]);
    }
}
