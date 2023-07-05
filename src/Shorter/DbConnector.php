<?php

namespace App\Shorter;

use Illuminate\Database\Capsule\Manager as Capsule;

class DbConnector
{
    public Capsule $capsule;

    public function __construct()
    {
        $this->capsule = new Capsule();
        $this->capsule->addConnection([
            'driver' => 'mysql',
            'host' => 'php_pro_2_mysql',
            'database' => 'php_pro',
            'username' => 'doctor',
            'password' => 'pass4doctor',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            ]);
    }

    public function getConnection()
    {
        return $this->capsule;
    }

}