<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\User;

class ContactController extends Controller
{
    public function index() {
        return view('other/contact');
    }

    public function sendEmail(Request $request) {
        request()->validate([
            'naam' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'bericht' => ['required', 'string', 'min:10'],
            'onderwerp' => ['required', 'string']
        ]);
        $email = $request->input('email');
        $bericht = $request->input('bericht');
        $onderwerp = $request->input('onderwerp');
        $beheerders = User::where('role_id', 1)->get();
        foreach ($beheerders as $beheerder){
            Mail::to($beheerder->email)->send(new ContactMail($bericht, $email, $onderwerp));
        }
        return redirect(route('contact'));
    }
}
