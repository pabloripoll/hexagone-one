<?php

$debug = true;
if ($debug) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

require_once dirname(__DIR__, 1).'/vendor/autoload.php';

use App\Request;
use App\Response;
use App\System;

$request = new Request;
$response = new Response;

$env = (new System)->env();

if ($request->method == 'get' && $request->route == '/router/test') {
    echo '<pre>'; print_r($request); echo '</pre>';

    exit;
}

if ($request->method == 'post') {
    $response->json($request);

    exit;
}

$response->json(['message' => $env]);
