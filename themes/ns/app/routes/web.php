<?php
/**
* Web Routes.
*/
use WPEmerge\Facades\Route;

Route::get()->where(function() { 
	return is_blog(); 
})->handle('BlogController@index');

