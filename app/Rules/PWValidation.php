<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PWValidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //$decrypted = \Crypt::decrypt(\Auth::user()->password);
        return \Hash::check($value, \Auth::user()->password);
    }
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Wachtwoord is onjuist.';
    }
}
