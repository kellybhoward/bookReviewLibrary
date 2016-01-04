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

$route['default_controller'] = "users";
$route["/users/logout"] = "users/logout";
$route["/users/login"] = "users/login";
$route["/users/register"] = "users/register";
$route["/authors/add"] = "authors/add";
$route["/books/book_profile/(:any)"] = "books/book_profile/$1";
$route["/users/user_profile/(:any)"] = "users/user_profile/$1";
$route["/reviews/delete_review/(:any)/(:any)"] = "reviews/delete_review/$1/$2";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */