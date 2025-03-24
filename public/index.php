<?php

include_once    "../src/config.defaults.php";
include_once    "../config/config.php"; // Import config

try {
    require_once    "../vendor/autoload.php"; // Import dependencies from Composer
} catch (\Throwable $e) {
    http_response_code(500);
    die("<style>html{font-family:system-ui,sans-serif;}</style><h1>ByeCorps ID</h1><h2>500 Internal Server Error</h2><p>Unable to load libraries from <code>../vendor</code>!<p>Please install the required dependencies for ByeCorps ID using <code>composer install</code></p><hr><pre>$e</pre>");
}

// Logging is handled by Monolog
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\BrowserConsoleHandler;

$log = new Logger("byecorps-id");
$log->pushHandler(new StreamHandler("../logs/bcid.log", Level::Warning));
$log->pushHandler(new BrowserConsoleHandler());

// Initialise Sentry
if ($CONFIG["SENTRY_ENABLED"]) {
    \Sentry\init([
        'dsn' => $CONFIG["SENTRY_DSN"],
        // Specify a fixed sample rate
        'traces_sample_rate' => 1.0,
      ]);
}

// Inital database things
require_once    "../src/database.php";

$uri    = parse_url($_SERVER['REQUEST_URI']);
$path   = $uri["path"];
$path_parts = explode("/", substr($path, 1));
$path_parts[0] = "/" . $path_parts[0];

//$query  = $uri["query"];

// These routes only apply to the first part of the URL (before the second "/")
$routes = [
    "/" => "../src/views/landing.php",
];

// Handoff to router for that path.
if (key_exists($path_parts[0], $routes)) {
    require $routes[$path_parts[0]];
} else {
    require '../src/views/404.php';
}
