<?php
use Cake\Routing\Router;

Router::plugin('Seijatachi', function ($routes) {
    $routes->fallbacks('InflectedRoute');
});
