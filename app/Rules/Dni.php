<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Dni implements Rule
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

        if (preg_match ('/^[0-9]{8}[A-Z]{1}/', $value)){
            return true;
        }
        if (preg_match ('/^[X-Y]{1}[0-9]{7}[A-Z]{1}/', $value)){
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El DNI o NIE insertado no es correcto.';
    }
}
