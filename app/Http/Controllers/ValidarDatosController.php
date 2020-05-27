<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidarDatosController extends Controller
{
    public function validateString(String $string)
    {
        $string = htmlentities($string, ENT_QUOTES, "UTF-8");
        $string = filter_var($string, FILTER_SANITIZE_STRING);
        return $string;
    }

    public function validateDatetime(String $originalDate)
    {
        $date = date('Y-m-d H:i:s',strtotime($originalDate));
        return $date;
    }

    public function validateInt($value){
        return (int)$value;
    }

    public function valueToBool($value)
    {
        if ($value == null || $value == 'off' || $value == 'false') {
            $bool = false;
        } else if ($value == 'on' || $value == 'true'){
            $bool = true;
        }
        return $bool;
    }
}
