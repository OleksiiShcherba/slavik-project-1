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
        // Create connection
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;

        // $result = $conn->query('SELECT * FROM Users WHERE `id` = 2');

        // if ($result->num_rows > 0) {
        //     // output data of each row
        //     while ($row = $result->fetch_assoc()) {
        //         echo "id: " . $row["id"] . " - Name: " . $row["username"] . "\n";
        //     }
        // } else {
        //     echo "0 results";
        // }

        // mysqli_close($conn);
    }

    public function saveUser(string $username)
    {
        $connection = $this->connect();

        $result = $connection->query("INSERT INTO Users (id, username) VALUES (" . time() . ", '" . $username . "')");

        $connection->close();

        return $result;
    }
}
