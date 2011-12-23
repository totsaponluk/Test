<?php defined('SYSPATH') or die('No direct script access.');

$_path = Kohana::config('kocrud.path') ? Kohana::config('userguide.api_browser') : 'api';

// Route all to api
Route::set('kocrud', $_path.'(/<params>)', array(
		'params' => '.+',
	))
	->defaults(array(
		'controller' => 'kocrud',
		'action'     => 'api',
	));

