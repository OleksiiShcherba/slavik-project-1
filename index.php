<?php
require('vendor/autoload.php');

use App\Controller\UserController;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\Request;

try {
	$routes = new RouteCollection();

	$route = new Route('/user', ['_controller' => UserController::class, '_function' => 'createUser']);
	$routes->add('getUser', $route);

	$route = new Route('/new/user', ['_controller' => UserController::class, '_function' => 'newUser']);
	$routes->add('newUser', $route);

	$route = new Route('', ['_controller' => UserController::class, '_function' => 'basic']);
	$routes->add('basic', $route);


	$request = Request::createFromGlobals();
	$context = new RequestContext();

	$matcher = new UrlMatcher($routes, $context);
	$parameters = $matcher->matchRequest($request);

	(new $parameters['_controller'])->{$parameters['_function']}($request);
} catch (\Throwable $e) {
	var_dump($e->getMessage());
}
