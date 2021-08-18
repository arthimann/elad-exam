<?php

namespace App\Database;

use Exception;
use Illuminate\Database\Capsule\Manager as Capsule;

class Connection
{
    private static $instance;

    /**
     * Prevent from creating an instance
     */
    protected function __construct()
    {
    }

    /**
     * Prevent from clone this class
     */
    private function __clone()
    {
    }

    /**
     * Un-serialization are not permitted for singletons
     * @throws Exception
     */
    public function __wakeup()
    {
        throw new Exception("Cannot un-serialize singleton");
    }

    /**
     * Make a connection to DB and singleton
     * @return void
     */
    public static function connect()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Capsule;
            self::$instance->addConnection([
                'driver' => 'mysql',
                'host' => 'localhost',
                'database' => 'database',
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
            ]);
        }
    }

    /**
     * Get singleton connection
     * @return Capsule
     * */
    public static function getInstance(): Capsule
    {
        return self::$instance;
    }
}