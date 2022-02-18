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
$route['default_controller']     = 'ct_home';
$route['login']                  = 'ct_login';
$route['admin']                  = 'ct_login';
$route['moderator']              = 'ct_login';
$route['reporter']               = 'ct_login';
$route['404_override']           = '';

//For frontend 
$route['home']                   = 'ct_home/index';
$route['category/(:any)']        = 'ct_home/category_view/$1';
$route['news/(:any)']            = 'ct_home/news_view/$1';
$route['search/(:any)']          = 'ct_home/news_search_result/$1';
$route['archive/(:any)']         = 'ct_home/archive_news_search/$1';
$route['video']                  = 'ct_home/video_page';
$route['video/(:any)']           = 'ct_home/video_page';
$route['page/(:any)']            = 'ct_home/page_view/$1';
$route['contact']                = 'ct_home/contact_page';
$route['contact/(:any)']         = 'ct_home/contact_page';
$route['user/(:any)']            = 'ct_home/user_view/$1';
$route['tags/(:any)']            = 'ct_home/tag_view/$1';

//For frontend login
$route['login']                   = 'ct_login/index';

$route['translate_uri_dashes']   = FALSE;
