<?php

use Symfony\Component\Routing;

function is_leap_year($year = null) {
    if (null === $year) {
        $year = date('Y');
    }

    return 0 === $year % 400 || (0 === $year % 4 && 0 !== $year % 100);
}

$routes = new Routing\RouteCollection();
/* $routes->add('hello', new Routing\Route('/hello/{name}', ['name'=>'World']));
$routes->add('bye', new Routing\Route('/bye'));
 */
$routes->add('hello', new Routing\Route('/hello/{name}', [
    'name' => 'World',
    '_controller' => function ($request) {
        // $foo will be available in the template
        $request->attributes->set('foo', 'bar');

        $response = render_template($request);

        return $response;
    }
]));

$routes->add('bye', new Routing\Route('/bye', [
    'name' => 'World',
    '_controller' => function ($request) {
        $request->attributes->set('foo', 'bar');

        $response = render_template($request);

        return $response;
    }
]));

return $routes;