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

$route['users'] = 'users/login';
$route['users/login'] = 'users/login';
$route['users/logout'] = 'users/logout';
$route['users/register'] = 'users/register';
$route['users/logoutInactivity'] = 'users/logoutInactivity';

// Show show specific products, and all.
$route['items'] = 'items';
$route['item/(:any)'] = 'items/view/$1';
$route['item'] = 'items';

$route['listings'] = 'items/manage';
$route['listings/create'] = 'items/create';
$route['listings/remove/(:any)'] = 'items/remove/$1';
$route['listings/edit/(:any)'] = 'items/edit/$1';
$route['listings/images/(:any)'] = 'items/images/$1';
$route['listings/imageUpload/(:any)'] = 'items/imageUpload/$1';
$route['listings/imageRemove/(:any)'] = 'items/imageRemove/$1';
$route['listings/mainImage/(:any)'] = 'items/mainImage/$1';

$route['orders'] = 'orders/index';
$route['order/place/(:any)'] = 'orders/place/$1';
$route['order/(:any)'] = 'orders/orderItem/$1';

$route['messages'] = 'messages/inbox';
$route['messages/inbox'] = 'messages/inbox';
$route['messages/send/(:any)'] = 'messages/send/$1';
$route['messages/send'] = 'messages/send';
$route['message/(:any)'] = 'messages/read/$1';

// Error class
$route['error/(:any)'] = 'error/$1';

// Display a particular user
//$route['user'] = 'user/me';
$route['user/(:any)'] = 'users/view/$1';
// $route['user'] = 'users';

//Show products under a particular category
$route['cat/(:any)'] = 'items/cat/$1';

$route['home'] = 'home/index';

// Admin panel, yet to be added
$route['admin'] = 'admin/index';
$route['admin/category/add'] = 'admin/addCategory';
$route['admin/category/remove'] = 'admin/removeCategory';
$route['admin/category/fixOrphans'] = 'admin/fixOrphans';

//Redirect pages as default
$route['default_controller'] = 'users/login';
$route['(:any)'] = 'pages/view/$1';

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
