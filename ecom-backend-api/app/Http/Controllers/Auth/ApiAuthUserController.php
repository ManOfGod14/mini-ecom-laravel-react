<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ApiFrontHelper;
use App\Helpers\JsonHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiAuthUserController extends Controller
{
    public function login(Request $request) {
        $rules = [
            "email" => "required|email",
            "password" => "required"
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return JsonHelper::jsonResponseError($validator->errors()->first());
        } else {
            $identifiants = $request->only('email', 'password');
            if(!$token = ApiFrontHelper::attempt($identifiants)) {
                return JsonHelper::jsonResponseError("Echec de connexion, email ou mot de passe incorrect !");
            }
            return self::respondWithToken($token);
        }
    }

    public function register(Request $request) {
        $rules = [
            "last_name" => "required|string|max:255",
            "first_name" => "required|string|max:255",
            "username" => "required|string|max:15",
            "email" => "required|string|email|max:255",
            "password" => "required|string|min:6|confirmed",
            "civility_id" => "required",
            "country_id" => "required",
            "city_name" => "required|string|max:255",
            "phone_number" => "required|regex:/^[0-9]{10}$/"
        ];

        $validator = Validator::make($request->all(), $rules);
        if(!$validator->fails()) {
            $data_request = $request->all();
            $username = $data_request['username'];
            $email = $data_request['email'];

            if(!ApiFrontHelper::checkAvailabilityUsername($username)) {
                if(!ApiFrontHelper::checkAvailabilityEmail($email)) {
                    unset($data_request['password_confirmation']);
                    $data_request['password'] = bcrypt($data_request['password']);

                    try {
                        $user = User::create($data_request);
                        if(!empty($user->id)) {
                            return JsonHelper::jsonResponseSuccess($user, 'Compte crée avec succès !');
                        } else {
                            return JsonHelper::jsonResponseError("Echec de création de compte !");
                        }
                    } catch (\Exception $e) {
                        return JsonHelper::jsonResponseError($e->getMessage());
                    }
                }

                return JsonHelper::jsonResponseError("Echec d'enregistrement, car cet email [".$email."] a déjà un compte !");
            }

            return JsonHelper::jsonResponseError("Echec d'enregistrement, car le username [".$username."] choisit est déjà pris !");
        }

        return JsonHelper::jsonResponseError($validator->errors()->first());
    }

    /**
     * Get the token array structure.
     * @param string $token
     */
    protected function respondWithToken($token) {
        return response()->json([
            'type' => "success",
            'message' => "Authentifié avec succès !",
            'result' => [
                'token_type' => 'Bearer',
                'access_token' => $token,
                'authorization' => 'Bearer '.$token,
                'user' => ApiFrontHelper::getUserTokenAccessData()
            ]
        ]);
    }
}
