<?php

namespace App\Models;

use App\Database\Connection;
use Illuminate\Database\Eloquent\Model;

class ShopperModel extends Model
{
    /**
     * Model's table name
     * @var string
     */
    protected $table = 'shopper';

    /**
     * Which fields in DB is mass assigment
     * @var string[]
     */
    protected $fillable = [
        'email',
        'name',
        'lastName',
        'phone',
        'city',
        'street',
        'houseNumber',
    ];

    /**
     * Get DB instance and connect to the DB for ORM
     */
    public function __construct()
    {
        parent::__construct();
        Connection::getInstance()::table($this->table);
    }
}