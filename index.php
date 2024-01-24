<?php
require('vendor/autoload.php');

use App\Controller\UserController;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$route = new Route('user', ['_controller' => UserController::class, '_function' => 'getUser']);

$routes = new RouteCollection();
$routes->add('getUser', $route);

$context = new RequestContext();
$matcher = new UrlMatcher($routes, $context);
$parameters = $matcher->match($_SERVER['REQUEST_URI']);
var_dump($parameters);