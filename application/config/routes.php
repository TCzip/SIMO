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
|	http://codeigniter.com/user_guide/general/routing.html
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

//welcome page
$route['welcome'] = 'Welcome/index';
$route['signin'] = 'Welcome/signin';

//inside system
$route['home'] = 'Inside/home';
$route['schedule'] = 'Inside/schedule';
$route['user_create'] = 'settings/user_create';
$route['schedule_create'] = 'schedule/create';
$route['schedule_groups'] = 'schedule/groups';
$route['schedule_newGroup'] = 'schedule/newGroup';
$route['schedule_exchange'] = 'schedule/exchange';
$route['schedule_exchangeAdjustment'] = 'schedule/exchangeAdjustment';
$route['change_password'] = 'settings/change_password';
$route['user_settings'] = 'settings/user_settings';
$route['schedule_viewByGroups'] = 'schedule/viewByGroups';
$route['schedule_viewByMembers'] = 'schedule/viewByMembers';


//actions
$route['logout'] = 'Inside/logout';
//$route['change_password'] = 'Inside/change_password';
$route['set_password'] = 'Inside/set_password';
