<?php

namespace App\Requests;

use App\Helpers\ErrorHelper;

abstract class Validator
{
    /**
     * Run the validation check
     * @param array $fields
     * @param array $data
     */
    public static function run(array $fields, array $data)
    {
        foreach ($fields as $val) {
            if (empty($data[$val])) {
                ErrorHelper::abort(422, "The required {$val} parameter is missing or empty");
            }
        }
    }
}