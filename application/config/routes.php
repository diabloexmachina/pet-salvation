<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'pet/index';
$route['admin/login'] = 'admin/login';
$route['admin/home'] = 'admin/home';
$route['admin/authenticate'] = 'admin/authenticate';

//services routes

$route['pet/add/pet-info'] = 'pet/create_pet';

$route['pet/edit/pet-info/(:num)'] = 'pet/edit_pet/$1';



$route['pet/update/pet-info/(:num)'] = 'pet/update_pet/$1'; 

$route['pet/show/pet-info/(:num)'] = 'pet/show_pet/$1'; 

$route['pet/delete/pet-info/(:num)'] = 'pet/delete_pet/$1'; 

//update pet claim status

$route['pet/update/pet-status/(:num)/(:any)'] = 'pet/update_status/$1/$2';


//$route['default_controller'] = 'welcome';
//$route['404_override'] = '';
//$route['translate_uri_dashes'] = FALSE;
