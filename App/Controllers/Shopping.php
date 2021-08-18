<?php

namespace App\Controllers;

use App\Resources\Shopper;

class Shopping
{
    private $shopper;

    public function __construct()
    {
        $this->shopper = new Shopper();
    }

    /**
     * Store new shopper
     */
    public function storeShopper()
    {
        $this->shopper->createNewOrder([
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'lastName' => $_POST['lastName'],
            'phone' => $_POST['phone'],
            'city' => $_POST['city'],
            'street' => $_POST['street'],
            'houseNumber' => $_POST['houseNumber'],
        ]);
    }

    /**
     * Update shopper data
     */
    public function updateShopper()
    {
        $this->shopper->updateShopper([
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'lastName' => $_POST['lastName'],
            'phone' => $_POST['phone'],
            'city' => $_POST['city'],
            'street' => $_POST['street'],
            'houseNumber' => $_POST['houseNumber'],
        ]);
    }

    /**
     * Get shopper details by ID
     */
    public function get()
    {
        $this->shopper->getShopperById($_GET['id']);
    }

    /**
     * Store new order
     */
    public function storeOrder()
    {
        $this->shopper->createNewOrder([
            'foo' => 'bar',
        ]);
    }

    /**
     * Get all order using shopper ID
     */
    public function all()
    {
        $this->shopper->getOrders($_GET['shopper_id']);
    }
}