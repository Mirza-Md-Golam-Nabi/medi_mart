<?php

use App\User;
use Illuminate\Support\Facades\Auth;

if (!function_exists('authUser')) {
    function authUser():  ? User
    {
        if (Auth::check()) {
            return Auth::user();
        }

        return null;
    }
}
