<?php

namespace App\Models;

use App\Database\Connection;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    /**
     * Model's table name
     * @var string
     */
    protected $table = 'order';

    /**
     * Get DB instance and connect to the DB for ORM
     */
    public function __construct()
    {
        parent::__construct();
        Connection::getInstance()::table($this->table);
    }
}