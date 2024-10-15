<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['index'] = 'Controller/index';
$route['logout'] = 'Controller/logout';
$route['login'] = 'Controller/login';

$route['menu'] = 'Controller/menu';
$route['insert'] = 'Controller/input';
$route['get-persons/(:any)'] = 'Controller/get_persons/$1';
$route['menuKeluar'] = 'Controller/menuKeluar';
$route['insertKeluar'] = 'Controller/inputKeluar';
$route['searchId'] = 'Controller/searchKodeRelasi';
$route['insertMasuk'] = 'Insert/insert_data';
