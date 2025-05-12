<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MatchOldPassword implements Rule
{
    /**
     * Menentukan apakah aturan validasi dilalui.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Cek apakah password yang dimasukkan cocok dengan password lama yang tersimpan
        return Hash::check($value, Auth::user()->password);
    }

    /**
     * Mendapatkan pesan kesalahan validasi.
     *
     * @return string
     */
    public function message()
    {
        return 'Password lama yang Anda masukkan tidak cocok.';
    }
}
