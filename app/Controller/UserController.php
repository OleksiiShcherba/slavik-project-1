<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class UserController
{
	public function createUser(Request $request){
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

		echo($html);
	}


	public function newUser(Request $request){
		var_dump($request->query->get('username'));
	}
}