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

// routes Kriteria 
$route['dashboard-admin/manage-kriteria'] = 'admin/kriteria/index';
$route['dashboard-admin/manage-kriteria/tambah'] = 'admin/kriteria/tambah';
$route['dashboard-admin/manage-kriteria/edit/(:any)'] = 'admin/kriteria/edit/$1';
$route['dashboard-admin/manage-kriteria/hapus/(:any)'] = 'admin/kriteria/hapus/$1';
$route['dashboard-admin/manage-kriteria/hasil-kriteria'] = 'admin/kriteria_nilai/index';
$route['dashboard-admin/manage-kriteria/hasil-kriteria/tambah'] = 'admin/kriteria_nilai/tambah';
$route['dashboard-admin/manage-kriteria/hasil-kriteria/ambil'] = 'admin/kriteria_nilai/ambil';
$route['dashboard-admin/manage-kriteria/hasil-kriteria/hapus'] = 'admin/kriteria_nilai/hapus';
$route['dashboard-admin/manage-kriteria/hasil-kriteria/kriteria-prioritas/tambah'] = 'admin/kriteria_prioritas/tambah';

// routes sub kriteria
$route['dashboard-admin/manage-subkriteria/(:any)'] = 'admin/sub_kriteria/index/$1';
$route['dashboard-admin/manage-subkriteria/tambah/(:any)'] = 'admin/sub_kriteria/tambah/$1';
$route['dashboard-admin/manage-subkriteria/edit/(:any)/(:any)'] = 'admin/sub_kriteria/edit/$1/$2';
$route['dashboard-admin/manage-subkriteria/hapus/(:any)/(:any)'] = 'admin/sub_kriteria/hapus/$1/$2';

// routes Nilai Kategori 
$route['dashboard-admin/manage-nilai'] = 'admin/nilai_kategori/index';
$route['dashboard-admin/manage-nilai/tambah'] = 'admin/nilai_kategori/tambah';
$route['dashboard-admin/manage-nilai/edit/(:any)'] = 'admin/nilai_kategori/edit/$1';
$route['dashboard-admin/manage-nilai/hapus/(:any)'] = 'admin/nilai_kategori/hapus/$1';
$route['dashboard-admin/manage-nilai/hasil-nilai'] = 'admin/nilai_pasang/index';
$route['dashboard-admin/manage-nilai/hasil-nilai/tambah'] = 'admin/nilai_pasang/tambah';
$route['dashboard-admin/manage-nilai/hasil-nilai/ambil'] = 'admin/nilai_pasang/ambil';
$route['dashboard-admin/manage-nilai/hasil-nilai/hapus'] = 'admin/nilai_pasang/hapus';
$route['dashboard-admin/manage-nilai/hasil-nilai/nilai-prioritas/tambah'] = 'admin/nilai_prioritas/tambah';
