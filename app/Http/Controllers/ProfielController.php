<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfielController extends Controller
{
    public function profiel($username) {
        $user = User::where('username', $username)->first();
        //$user->geboortedatum = date('d/m/Y', strtotime($user->geboortedatum));
        //dd($user);
        return view('profiel.index', [
            'user' => $user
        ]);
    }

    public function opslaan($username, Request $request) {
        //dd($request, $username);
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
        $user->geboortedatum = date('Y-m-d', strtotime($request->input('geboortedatum')));
        if ($request->input('password') != null && $request->input('password') == $request->input('bevestigPassword')){
            $user->password = bcrypt($request->input('password'));
        }
        $user->updated_at = now();
        //dd($user);
        $user->save();
        return redirect( route('profiel', ['username' => $user->username]));
    }
}
