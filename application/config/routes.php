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
$route['default_controller'] = 'zhome';
$route['sell/condo/:any/:any/:any/:any']='zhome/unitDetail2/$1/$2/$3/$4';
$route['sell/condo/:any/:any/:any']='zhome/unitDetail2/$1/$2/$3';
$route['sell/condo/:any/:any']='zhome/unitDetail2/$1/$2';
$route['%E0%B8%84%E0%B8%AD%E0%B8%99%E0%B9%82%E0%B8%94%E0%B9%80%E0%B8%88%E0%B9%89%E0%B8%B2%E0%B8%82%E0%B8%AD%E0%B8%87%E0%B8%82%E0%B8%B2%E0%B8%A2%E0%B9%80%E0%B8%AD%E0%B8%87/condo/:any/:any']='zhome/unitDetail2/$1/$2';
$route['rent/condo/:any/:any/:any/:any']='zhome/unitDetail2/$1/$2/$3/$4';
$route['rent/condo/:any/:any/:any']='zhome/unitDetail2/$1/$2/$3';
$route['rent/condo/:any/:any']='zhome/unitDetail2/$1/$2';
$route['undefined/condo/:any/:any']='zhome/unitDetail2/$1/$2';
$route['%E0%B8%84%E0%B8%AD%E0%B8%99%E0%B9%82%E0%B8%94%E0%B9%80%E0%B8%88%E0%B9%89%E0%B8%B2%E0%B8%82%E0%B8%AD%E0%B8%87%E0%B9%83%E0%B8%AB%E0%B9%89%E0%B9%80%E0%B8%8A%E0%B9%88%E0%B8%B2%E0%B9%80%E0%B8%AD%E0%B8%87/condo/:any/:any']='zhome/unitDetail2/$1/$2';
$route['condo/%E0%B8%84%E0%B8%AD%E0%B8%99%E0%B9%82%E0%B8%94/:any/:any/:any']='zhome/unitDetail2/$1/$2/$3';
$route['condo/%E0%B8%84%E0%B8%AD%E0%B8%99%E0%B9%82%E0%B8%94/:any/:any']='zhome/unitDetail2/$1/$2';
$route['condo/%E0%B8%84%E0%B8%AD%E0%B8%99%E0%B9%82%E0%B8%94/:any']='zhome/unitDetail2/$1';
$route['condo/:any/:any/:any/:any']='zhome/unitDetail2/$2/$3/$4';
$route['condo/:any/:any/:any']='zhome/unitDetail2/$2/$3';
$route['condo/:any/:any']='zhome/unitDetail2/$2';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// $route['email'] = 'Email_Controller';
