<?php

namespace App\Requests;

class UpdateShopperRequest extends Validator implements RequestContract
{

    /**
     * @inheritDoc
     */
    public static function fields(): array
    {
        return ['email', 'name', 'lastName', 'phone', 'city', 'street', 'houseNumber'];
    }

    /**
     * @inheritDoc
     */
    public static function validate(array $data)
    {
        self::run(self::fields(), $data);
    }
}