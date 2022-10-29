<?php

namespace App\Exceptions;

class ApiException
{
    public static function handler($msg, $code)
    {
        return [
                'message' => $msg,
                'code' => $code
        ];
    }
}