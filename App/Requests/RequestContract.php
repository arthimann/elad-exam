<?php

namespace App\Requests;

interface RequestContract
{
    /**
     * Set required fields
     * @return string[]
     */
    public static function fields(): array;

    /**
     * Validate inputs
     * In case of error, stop the code the throw the error
     * @param array $data
     */
    public static function validate(array $data);

    /**
     * Run the validation check
     * @param array $fields
     * @param array $data
     */
    public static function run(array $fields, array $data);
}