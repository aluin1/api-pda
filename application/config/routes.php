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
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

// Users API Routes 
$route['users/register'] = 'users/register';
$route['users/login'] = 'users/login';
$route['users/all'] = 'users/all';
$route['users/detail'] = 'users/detail';
$route['users/profile_user'] = 'users/profile_user';
$route['users/update'] = 'users/update';
$route['users/delete'] = 'users/delete';

// Attendance API Routes
$route['attendance/attend'] = 'attendance/attend';
$route['attendance/attend_all'] = 'attendance/attend_all';
$route['attendance/attend_personal'] = 'attendance/attend_personal';
$route['attendance/delete'] = 'attendance/delete';
$route['attendance/list'] = 'attendance/list';
$route['generate/export_pdf'] = 'generate/export_pdf';
$route['generate/export_excel'] = 'generate/export_excel';

// Log API Routes
$route['log/logging'] = 'log/logging';
$route['log/get_logging'] = 'log/get_logging';
$route['log/get_logging_personal'] = 'log/get_logging_personal';
$route['log/delete'] = 'log/delete';

// Office Location API Routes
$route['office_location/set_office'] = 'Office_Location/set_office';
$route['office_location/edit_office'] = 'Office_Location/edit_office';
$route['office_location/edit_office_default'] = 'Office_Location/edit_office_default';
$route['office_location/detail_office_default'] = 'Office_Location/detail_office_default';
$route['office_location/get_office_all'] = 'Office_Location/get_office_all';
$route['office_location/get_office_personal'] = 'Office_Location/get_office_personal';
/*
| -------------------------------------------------------------------------
| Sample REST API Routes

| -------------------------------------------------------------------------
*/
$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
