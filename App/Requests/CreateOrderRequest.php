<?php

namespace App\Requests;

class CreateOrderRequest extends Validator implements RequestContract
{
    /**
     * @inheritDoc
     */
    public static function fields(): array
    {
        return ['fishaShoperId', 'orderId', 'orderTotal', 'token'];
    }

    /**
     * @inheritDoc
     */
    public static function validate(array $data)
    {
        self::run(self::fields(), $data);
    }
}