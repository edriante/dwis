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
$route['profile'] = 'Main_controller/profile';
$route['admin_profile'] = 'adm_profile/profile';




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


$route['users']['get'] = 'users/index_get';
$route['users']['post'] = 'users/index_post';
$route['api/users/(:num)']['GET'] = 'api/users/show/$1';
$route['api/users/(:num)']['PUT'] = 'api/users/update/$1';
$route['api/users/(:num)']['DELETE'] = 'api/users/delete/$1';

$route['categories']['get'] = 'categories/index_get';
$route['categories']['post'] = 'categories/index_post';
$route['api/categories/(:num)']['GET'] = 'api/categories/show/$1';
$route['api/categories/(:num)']['PUT'] = 'api/categories/update/$1';
$route['api/categories/(:num)']['DELETE'] = 'api/categories/delete/$1';







