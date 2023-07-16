<?php

namespace App\Http\Controllers\Api;

use App\Helpers\JsonHelper;
use App\Http\Controllers\Controller;
use App\Models\Civility;
use App\Models\Country;
use Illuminate\Http\Request;

class ApiGlobalController extends Controller
{
    /**
     * get civilities list
     */
    public function getCivilities() {
        $civilities = Civility::where('actived', 1)->get();

        return JsonHelper::jsonResponseSuccess($civilities);
    }

    /**
     * get countries list
     */
    public function getCountries() {
        $countries = Country::where('actived', 1)->get();
        
        return JsonHelper::jsonResponseSuccess($countries);
    }
}
