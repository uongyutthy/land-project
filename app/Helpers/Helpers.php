<?php

namespace App\Helpers;

use App\Models\UserHospital;
use App\User;
use DB;
use Illuminate\Support\Carbon;

class Helpers
{

    /**
     * var http error code our own error code
     */
    const HTTP_SUCCESS_CODE = 200;
    /**
     * var http error code our own error code
     */
    const HTTP_ERROR_CODE = 422;

    const DATE_FORMAT_dMY = 'd-M-Y';
    const DATE_FORMAT_dMYHi = 'd-M-Y H:i';
    const DATE_FORMAT_dMYHis = 'd-M-Y H:i:s';
    const DATE_FORMAT_YmdHis = 'Y-m-d H:i:s';


    /*
    * function get language
    */
    public static function lang(){
        return \App::getLocale();
    }

    public static function dateFormat($date, $dateFormat = self::DATE_FORMAT_dMY){
        return empty($date) ? '' : Carbon::parse($date)->format($dateFormat);
    }

    public static function selected($v1, $v2){
        return $v1 == $v2 ? 'selected' : '';
    }

    public static function numberFormat($amount){
        return !isset($amount) ? '' : number_format($amount);
    }

    public static function currencyFormat($amount){
        return !isset($amount) ? '' : '$'.number_format($amount, 2);
    }

}

