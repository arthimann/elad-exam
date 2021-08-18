<?php

namespace App\Resources;

use GuzzleHttp\Client;
use App\Models\OrderModel;
use App\Models\ShopperModel;
use App\Requests\CreateOrderRequest;
use App\Requests\CreateShopperRequest;
use App\Requests\UpdateShopperRequest;

class Shopper
{
    private Client $rest;

    public function __construct()
    {
        $this->rest = new Client();
    }

    /**
     * Create new shopper
     * @param array $shopper
     * @return int
     */
    public function createNewShopper(array $shopper): int
    {
        CreateShopperRequest::validate($shopper);
        $data = [
            'email' => $shopper['email'],
            'name' => $shopper['name'],
            'lastName' => $shopper['lastName'],
            'phone' => $shopper['phone'],
            'city' => $shopper['city'],
            'street' => $shopper['street'],
            'houseNumber' => $shopper['houseNumber'],
        ];
        /**
         * Create shopper in Shop DB and send to Fisha API
         * Create module method will create only unique email value
         * */
        $insertedID = ShopperModel::create($data);
        if ($insertedID) {
            $this->rest->post('fisha.api.co.il', $data);
        }
        return $insertedID;
    }

    /**
     * Update exist shopper
     * @param array $shopper
     * @return int
     */
    public function updateShopper(array $shopper): int
    {
        UpdateShopperRequest::validate($shopper);
        $affectedID = ShopperModel::where('email', $shopper['email'])->update($shopper);
        if ($affectedID) {
            $this->rest->patch('fisha.api.co.il', $shopper);
        }
        return $affectedID;
    }

    /**
     * Get shopper by ID
     * @param int $shopperID
     * @return object
     */
    public function getShopperById(int $shopperID): object
    {
        return ShopperModel::first($shopperID);
    }

    /**
     * Create new shopper order
     * @param array $order
     * @return int
     */
    public function createNewOrder(array $order): int
    {
        CreateOrderRequest::validate($order);
        $response = $this->rest->post('fisha.api.co.il', $order)->getBody()->getContents();
        return OrderModel::create($response);
    }

    /**
     * Get all order by shopper ID
     * @param int $shopper
     * @return array
     */
    public function getOrders(int $shopper): array
    {
        return OrderModel::where('shopper_id', $shopper)->get();
    }
}