<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class ApiBackHelper {
    #...
    static function guard() {
        return Auth::guard('apiadmin');
    }

    #...
    static function attempt($credentials) {
        return Auth::guard('apiadmin')->attempt($credentials);
    }

    #...
    static function login($user) {
        return Auth::guard('apiadmin')->login($user);
    }

    #...
    static function logout() {
        return Auth::guard('apiadmin')->logout();
    }
    
    #...
    static function currentAdmin($key = 'all') {
        if($key == 'all')
            return Auth::guard('apiadmin')->user();
        
        return Auth::guard('apiadmin')->user()->$key;
    }

    #...
    static function getAdminTokenAccessData() {
        return [
            'id' => self::currentAdmin('id'),
            'first_name' => self::currentAdmin('first_name'),
            'last_name' => self::currentAdmin('last_name'),
            'username' => self::currentAdmin('username'),
            'email' => self::currentAdmin('email'),
            'phone_number' => self::currentAdmin('phone_number'),
            'uri_photo' => self::currentAdmin('uri_photo'),
        ];
    }
}