<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// Auth routes
$route['auth/login'] = 'auth/login';
$route['auth/process_login'] = 'auth/process_login'; // Route for processing login
$route['auth/logout'] = 'auth/logout'; // Route for logging out
$route['auth/register'] = 'auth/register'; // Route for registration
$route['auth/register_process'] = 'auth/register_process'; // Route for processing registration