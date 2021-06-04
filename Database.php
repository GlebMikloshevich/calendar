<?php

use PDO;
class Database
{
    protected static $_pdo;
    private static $config = [
        'dbname' => 'calendar',
        'host' => 'localhost',
        'user' => 'calendar_user',
        'password' => 'password'
    ];

    public static function get_pdo() {
        if (empty(static::$_pdo))
        {
            static::$_pdo = new PDO('mysql:host=' . static::$config['host'] . ';dbname=' . static::$config['dbname'],
                static::$config['user'],
                static::$config['password']);
        }
        return static::$_pdo;
    }

}