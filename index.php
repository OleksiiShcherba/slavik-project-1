<?php

require('vendor/autoload.php');

use App\User;

$users = new User();
var_dump($users->name);