<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['admin/insert-announcement'] = 'admin/dashboard/insert_announcement';
$route['admin/add-announcement'] = 'admin/dashboard/add_announcement';
$route['admin/announcement'] = 'admin/dashboard/announcement';
$route['admin'] = 'admin/login';
$route['dashboard/logout'] = 'partner/dashboard/logout';
$route['email'] = 'partner/dashboard/email';
$route['view-discussion'] = 'partner/dashboard/view_discussion';
$route['insert-topic'] = 'partner/dashboard/insert_topic';
$route['new-topic'] = 'partner/dashboard/new_topic';
$route['general-announcement'] = 'partner/dashboard/general_announcement';
$route['exclusive-announcement'] = 'partner/dashboard/exclusive_announcement';
$route['add-partner'] = 'partner/login/add_partner';
$route['register'] = 'partner/login/register';
$route['login'] = 'partner/login';
$route['dashboard'] = 'partner/dashboard';
$route['auth'] = 'partner/auth';
$route['default_controller'] = 'partner/login';
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */