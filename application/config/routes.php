<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['auth/login'] = 'auth/login';
$route['auth/process_login'] = 'auth/process_login'; 
$route['auth/logout'] = 'auth/logout'; 
$route['auth/register'] = 'auth/register'; 
$route['auth/register_process'] = 'auth/register_process';
$route['Main_controller/edit_user/(:num)'] = 'Main_controller/edit_user/$1';
$route['Main_controller/update_user'] = 'Main_controller/update_user';
$route['Main_controller/edit_service/(:num)'] = 'Main_controller/edit_service/$1';
$route['Main_controller/update_service'] = 'Main_controller/update_service';
$route['get_chart_data'] = 'Main_controller/get_chart_data';
$route['get_users_data'] = 'Main_controller/get_users_data';

