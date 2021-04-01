<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

//Route Hello
$routes->add('hello', new Routing\Route('/hello/{name}', [
    'name' => 'World',
    '_controller' => function ($request) {
        // $foo will be available in the template
        $request->attributes->set('foo', 'bar');

        $response = render_template($request);

        return $response;
    }
]));

//Route Goodbye
$routes->add('bye', new Routing\Route('/bye', [
    'name' => 'World',
    '_controller' => function ($request) {
        $request->attributes->set('foo', 'bar');

        $response = render_template($request);

        return $response;
    }
]));

//Route année bissextile
$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', [
    'year' => null,
    '_controller' => 'Calendar\Controller\LeapYearController::index',
]));


return $routes;
