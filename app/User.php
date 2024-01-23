<?php

namespace App;

class User extends BaseUser {
	public string $name = "Oleksii";

	public function callMe(): void
	{
		$friend = new Friends\Slavik();
		echo($friend->name);
	}
}