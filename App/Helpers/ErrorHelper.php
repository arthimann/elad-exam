<?php

namespace App\Helpers;

use \Exception;

class ErrorHelper
{
    /**
     * Abort the code and show the error
     * @param int $code
     * @param string $message
     */
    public static function abort(int $code, string $message)
    {
        try {
            throw new Exception($message, $code);
        } catch (Exception $exception) {
            print_r($exception->getMessage());
            die($exception->getCode());
        }
    }
}