<?php

namespace App\Requests;

class CreateShopperRequest extends Validator implements RequestContract
{
    /**
     * Set required fields
     * @return string[]
     */
    public static function fields(): array
    {
        return ['email', 'name', 'lastName', 'phone', 'city', 'street', 'houseNumber'];
    }

    /**
     * Validate inputs
     * In case of error, stop the code the throw the error
     * @param array $data
     */
    public static function validate(array $data)
    {
        self::run(self::fields(), $data);
    }
}