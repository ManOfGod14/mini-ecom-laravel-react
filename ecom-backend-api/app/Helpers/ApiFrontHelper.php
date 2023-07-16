<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ApiFrontHelper {
    #...
    public static function guard() {
        return Auth::guard('apiuser');
    }

    #...
    public static function attempt($credentials) {
        return Auth::guard('apiuser')->attempt($credentials);
    }

    #...
    public static function login($user) {
        return Auth::guard('apiuser')->login($user);
    }

    #...
    public static function logout() {
        return Auth::guard('apiuser')->logout();
    }
    
    #...
    public static function currentUser($key = 'all') {
        if($key == 'all')
            return Auth::guard('apiuser')->user();
        
        return Auth::guard('apiuser')->user()->$key;
    }

    #...
    public static function getUserTokenAccessData() {
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

    /**
     * vérifier la disponibilité de username
     */
    public static function checkAvailabilityUsername($username) {
        $userData = User::where('username', $username)->first();
        
        if(!empty($userData))
            return true;

        return false;
    }

    /**
     * vérifier la disponibilité de l'adresse mail
     */
    public static function checkAvailabilityEmail($email) {
        // $userData = User::where('email', $email)->first();
        $userData = User::whereEmail($email)->first();
        
        if(!empty($userData))
            return true;

        return false;
    }
}