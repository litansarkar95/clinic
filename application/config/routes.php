<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'authentication';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route["logout"] = "authentication/logout"; 

//Dashboard


//authentication
$route["login"]             = "authentication/index"; 
$route["registration"]      = "authentication/registration"; 


//Settings
$route['s/(:any)'] = 'shortlink/redirect/$1';
