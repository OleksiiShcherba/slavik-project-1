<?php

namespace App\Services;

class DB
{
    private static $servername = "localhost:3307";
    private static $database = "messaging";
    private static $username = "root";
    private static $password = "dev";

    private static $database_connection;

    protected function __construct()
    {

    }

    protected function __clone()
    {

    }

    protected function __wakeup()
    {
        throw new Exception("You cant create DB from json.", 403);
    }

    public static function connect()
    {
        if (empty(self::$database_connection)) {
            self::$database_connection = mysqli_connect(self::$servername, self::$username, self::$password, self::$database);

            if (self::$database_connection->connect_error) {
                die("Connection failed: " . self::$database_connection->connect_error);
            }
        }

        return self::$database_connection;
    }

    public static function disconnect()
    {
        self::$database_connection->close();
        self::$database_connection = null;
    }
}
