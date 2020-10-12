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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['spk_admin'] = 'authent/index';
$route['auth'] = 'authent/aksi_login';

$route['dashboard-admin'] = 'admin/dashboard/index';

// routes USER
$route['dashboard-admin/manage-users/(:any)'] = 'admin/users/index/$1';
$route['dashboard-admin/manage-users/tambah/(:any)'] = 'admin/users/tambah/$1';
$route['dashboard-admin/manage-users/detail-user/(:any)'] = 'admin/users/detail/$1';
$route['dashboard-admin/manage-users/edit/(:any)/(:any)'] = 'admin/users/edit/$1/$2';
$route['dashboard-admin/manage-users/hapus-user/(:any)/(:any)'] = 'admin/users/hapus/$1/$2';

// routes List BEASISWA
$route['dashboard-admin/manage-beasiswa'] = 'admin/beasiswa/index';
$route['dashboard-admin/manage-beasiswa/tambah'] = 'admin/beasiswa/tambah';
$route['dashboard-admin/manage-beasiswa/edit/(:any)'] = 'admin/beasiswa/edit/$1';
$route['dashboard-admin/manage-beasiswa/hapus/(:any)'] = 'admin/beasiswa/hapus/$1';

// routes Kriteria Beasiswa
$route['dashboard-admin/manage-kriteria'] = 'admin/kriteria/index';
$route['dashboard-admin/manage-kriteria/tambah'] = 'admin/kriteria/tambah';
$route['dashboard-admin/manage-kriteria/edit/(:any)'] = 'admin/kriteria/edit/$1';
$route['dashboard-admin/manage-kriteria/hapus/(:any)'] = 'admin/kriteria/hapus/$1';