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

$route['default_controller'] = "welcome";
$route['404_override'] = 'error/_404';

$route['email'] = "welcome/email";
$route['portfolio/(:any)'] = "welcome/portfolio/$1";
$route['resume'] = "welcome/resume";

$route['blog/page/(:num)'] = "blog/index";
$route['category/(:any)'] = "blog/category/$1";
$route['search/(:any)'] = "blog/search/$1";
$route['post/(:any)'] = "blog/post/$1";

$route['panel'] = 'panel/dashboard';
$route['panel/login'] = "panel/user/login";
$route['panel/logout'] = "panel/user/logout";
$route['panel/(:any)/add'] = "panel/$1/edit";

$route['panel/portfolio/items/category/(:num)'] = "panel/portfolio/items/index/$1";
$route['panel/blog/articles/category/(:num)'] = "panel/blog/articles/index/$1";

$route['panel/index'] = 'panel/notfound';
$route['panel/portfolio'] = 'panel/notfound';
$route['panel/resume'] = 'panel/notfound';
$route['panel/blog'] = 'panel/notfound';

/* End of file routes.php */
/* Location: ./application/config/routes.php */