<?php

namespace App\Models;

use App\Services\DB;

class User
{
    public function saveUser(string $username)
    {
        $connection = DB::connect();

        $result = $connection->query("INSERT INTO Users (username) VALUES ('" . $username . "');");
        $last_inserted_id = mysqli_insert_id($connection);

        $result = $connection->query("SELECT * FROM Users WHERE id = $last_inserted_id");
        $result = mysqli_fetch_assoc($result);

        return $result;
    }
}
