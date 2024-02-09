<?php

namespace App\Controller;

use App\Models\User;
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
                <input type='text' name='main_username' />
                <input type='text' name='friend_username' />
                <button type='submit'>Greet me</button>
            </form>
        </body>
        </html>";

        echo ($html);
    }

    public function newUser(Request $request)
    {
        $user = new User();
        $save_user = $user->saveUser($request->query->get('main_username'));
        $save_user = $user->saveUser($request->query->get('friend_username'));

        DB::disconnect();
    }
}
