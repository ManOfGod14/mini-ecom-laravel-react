<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class ApiFrontHelper {
    #...
    static function guard() {
        return Auth::guard('apiuser');
    }

    #...
    static function attempt($credentials) {
        return Auth::guard('apiuser')->attempt($credentials);
    }

    #...
    static function login($user) {
        return Auth::guard('apiuser')->login($user);
    }

    #...
    static function logout() {
        return Auth::guard('apiuser')->logout();
    }
    
    #...
    static function currentUser($key = 'all') {
        if($key == 'all')
            return Auth::guard('apiuser')->user();
        
        return Auth::guard('apiuser')->user()->$key;
    }

    #...
    static function getUserTokenAccessData() {
        return [
            'id' => self::currentUser('id'),
            'first_name' => self::currentUser('first_name'),
            'last_name' => self::currentUser('last_name'),
            'username' => self::currentUser('username'),
            'email' => self::currentUser('email'),
            'phone_number' => self::currentUser('phone_number'),
            'uri_photo' => self::currentUser('uri_photo'),
        ];
    }
}