<?php

require 'vendor/autoload.php';
require 'lib/mcStatus/mcStatus.php';

$klein = new \Klein\Klein();
$status = new \mcStatus\mcStatus();

$klein->respond('/', function ($request, $response, $service) {
    $service->render('views/index.php');
});


$klein->respond('/server/[:host]', function ($request, $response, $service) use ($status) {
    $status->host = $request->host;
    $status->serverStatus();
    if($status->serverStatus()) {
        $service->render('views/server.php', array('server' => $status->server));
    } else {
        $service->render('views/error/error.php');
    }
});

$klein->respond('/server/[:host]/[:port]', function ($request, $response, $service) use ($status) {
    $status->host = $request->host;
    $status->port = $request->port;
    if($status->serverStatus()) {
        $service->render('views/server.php', array('server' => $status->server));
    } else {
        $service->render('views/error/error.php');
    }
});

/*
$klein->respond('/server/img/[:host].png', function ($request) {
    return 'Hello ' . $request->host;
});
*/

// If no server is provided, redirect to main page
$klein->respond('/server/', function ($request, $response, $service) use ($status) {
    $response->redirect('/');
});

$klein->dispatch();