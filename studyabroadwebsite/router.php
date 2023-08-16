<?php
include_once('includes/db.php');

$db = init_sqlite_db('db/site.sqlite', 'db/init.sql');

include_once("includes/sessions.php");
$session_messages = array();
process_session_params($db, $session_messages);

// checking if the current user an admin
define('ADMIN_GROUP_ID', 1); // see init.sql
$is_admin = is_user_member_of($db, ADMIN_GROUP_ID);


const ROUTES = array(
  '/' => 'pages/home.php',
  '/insert' => 'pages/insert.php',
  '/details' => 'pages/details.php',
  '/login' => 'pages/login.php'
);

function match_static($uri)
{
  // Match route as is; match "/public"
  if (preg_match('/^\/public\//', $uri) && file_exists('.' . $uri)) {
    return $uri;
  }

  // Look for static resource in public folder;
  // match /favicon.ico, etc.
  $public_path = './public' . $uri;
  if (file_exists($public_path)) {
    return $public_path;
  }

  return NULL;
}

function match_routes($uri, $routes)
{
  // If the URI ends with /, remove it
  if (preg_match('/^\/.+\/$/', $uri)) {
    $uri = preg_replace('/\/$/', '', $uri);
  }

  if (array_key_exists($uri, $routes)) {
    return $routes[$uri];
  } else {
    return NULL;
  }
}

// Grabs the URI and separates it from query string parameters
error_log('');
error_log('HTTP Request: ' . $_SERVER['REQUEST_URI']);
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];

if ($php_file = match_routes($request_uri, ROUTES)) {

  // Include PHP file from route look-up
  require $php_file;
} else if ($file_path = match_static($request_uri)) {

  if ($file_path == $request_uri) {
    // let the web server respond for static resources
    return False;
  } else {
    // Serve up file from public folder
    readfile($file_path);
  }
} else {

  error_log("  404 Not Found: " . $request_uri);
  http_response_code(404);

  // Display 404 page.
  require 'pages/404.php';
}
