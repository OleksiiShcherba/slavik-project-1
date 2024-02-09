<?php

namespace App\Services;

class DB
{
    private $servername = "localhost:3307";
    private $database = "messaging";
    private $username = "root";
    private $password = "dev";

    public function connect()
    {
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }

    public function saveUser(string $username)
    {
        $connection = $this->connect();

        $result = $connection->query("INSERT INTO Users (username) VALUES ('" . $username . "');");

        $last_inserted_id = mysqli_insert_id($connection);

        $result = $connection->query("SELECT * FROM Users WHERE id = $last_inserted_id");
        $result = mysqli_fetch_assoc($result);

        $connection->close();

        return $result;
    }
}
