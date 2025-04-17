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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// API Routes
$route['api/users']['get'] = 'api/users_controller/index'; // GET - All
$route['api/users/(:num)']['get'] = 'api/users_controller/show/$1'; // GET - Show
$route['api/users']['post'] = 'api/users_controller/create'; // POST - Create
$route['api/users/(:num)']['put'] = 'api/users_controller/update/$1'; // PUT - Update
$route['api/users/(:num)']['patch'] = 'api/users_controller/update/$1'; // PATCH - Update
$route['api/users/(:num)']['delete'] = 'api/users_controller/delete/$1'; // DELETE - Delete

$route['api/profiles']['get'] = 'api/profiles_controller/index'; // GET - All
$route['api/profiles/(:num)']['get'] = 'api/profiles_controller/show/$1'; // GET - Show
$route['api/profiles']['post'] = 'api/profiles_controller/create'; // POST - Create
$route['api/profiles/(:num)']['put'] = 'api/profiles_controller/update/$1'; // PUT - Update
$route['api/profiles/(:num)']['patch'] = 'api/profiles_controller/update/$1'; // PATCH - Update
$route['api/profiles/(:num)']['delete'] = 'api/profiles_controller/delete/$1'; // DELETE - Delete
