<?php
/**
* Web Routes.
*/
use WPEmerge\Facades\Route;

Route::get()->where(function() { 
	return is_blog() || is_category(); 
})->handle('BlogController@index');

