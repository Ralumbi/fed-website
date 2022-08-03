<?php

use App\Core\Templates;

$route = new Router();

$route->Route('/', function() {
    Templates::Page('header');
    Templates::Page('home/index');
    Templates::Page('footer');
});

$route->Route('/about', function() {
    Templates::Page('header');
    Templates::Page('home/about');
    Templates::Page('footer');
});

$route->Route('/contact', function() {
    Templates::Page('header');
    Templates::Page('home/contact');
    Templates::Page('footer');
});

$route->Route('/lookup', function() {
    Templates::Page('header');
    Templates::Page('home/lookup');
    Templates::Page('footer');
});


/**
 * User pages
 */

$route->Route('/register', function() {
    Templates::Page('header');
    Templates::Page('user/register');
    Templates::Page('footer');
});

$route->Route('/login', function() {
    Templates::Page('header');
    Templates::Page('user/login');
    Templates::Page('footer');
});

$route->Route('/dashboard', function() {
    Templates::Page('header');
    Templates::Page('user/dashboard');
    Templates::Page('footer');
});

$route->Route('/members', function() {
    Templates::Page('header');
    Templates::Page('user/members');
    Templates::Page('footer');
});

$action = $_SERVER['REQUEST_URI'];

$route->Dispatch($action);