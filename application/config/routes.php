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

// API Routes
$route['api/admin']['GET'] = 'api/admin/index';
$route['api/admin/(:num)']['GET'] = 'api/admin/show/$1';
$route['api/admin']['POST'] = 'api/admin/store';
$route['api/admin/(:num)']['PUT'] = 'api/admin/update/$1';
$route['api/admin/(:num)']['DELETE'] = 'api/admin/delete/$1';

$route['api/services']['GET'] = 'api/services/index';
$route['api/services/(:num)']['GET'] = 'api/services/show/$1';
$route['api/services']['POST'] = 'api/services/store';
$route['api/services/(:num)']['PUT'] = 'api/services/update/$1';
$route['api/services/(:num)']['DELETE'] = 'api/services/delete/$1';

$route['api/users']['GET'] = 'api/users/index';
$route['api/users/(:num)']['GET'] = 'api/users/show/$1';
$route['api/users']['POST'] = 'api/users/store';
$route['api/users/(:num)']['PUT'] = 'api/users/update/$1';
$route['api/users/(:num)']['DELETE'] = 'api/users/delete/$1';

$route['api/index']['GET'] = 'api/index/index'; 

