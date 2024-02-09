<?php

namespace App\Controller;

use App\Services\DB;
use Symfony\Component\HttpFoundation\Request;

class UserController
{
    public function createUser(Request $request)
    {
        $html = "<!DOCTYPE html>
        <html>
        <head>
            <title>My Webpage</title>
        </head>
        <body>
            <h1>Hello, world! Hello " . $request->query->get('username') . "</h1>
            <form action='http://localhost/new/user'>
                <input type='text' name='username' />
                <button type='submit'>Greet me</button>
            </form>
        </body>
        </html>";

        echo ($html);
    }

    public function newUser(Request $request)
    {
        $db = new DB();
        $save_user = $db->saveUser($request->query->get('username'));
        var_dump($save_user);

        if ($save_user) {
            echo ("SAVED");
        } else {
            echo ("FAILED");
        }
    }
}
