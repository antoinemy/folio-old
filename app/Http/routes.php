<?php

ini_set('memory_limit', '-1');

// Home
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/sitemap.xml', ['as' => 'sitemap_xml', 'uses' => 'HomeController@sitemap_xml']);
Route::get('/sitemap', ['as' => 'sitemap', 'uses' => 'HomeController@sitemap']);
Route::get('/contact', ['as' => 'contact', 'uses' => 'HomeController@contact']);
Route::post('/contact/send', ['as' => 'post_contact', 'uses' => 'HomeController@post_contact']);
Route::get('/articles', ['as' => 'articles_listing', 'uses' => 'ArticleController@index']);
Route::get('/articles/{id}', ['as' => 'article', 'uses' => 'ArticleController@show']);
Route::get('/projects', ['as' => 'projects_listing', 'uses' => 'ProjectController@index']);
Route::get('/projects/{id}', ['as' => 'project', 'uses' => 'ProjectController@show']);

// Login
Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', ['as' => 'post_login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

Route::get('auth/register', ['as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', ['as' => 'post_register', 'uses' => 'Auth\AuthController@postRegister']);

// Admin
Route::group(['namespace' => 'Admin', 'middleware' => 'auth', 'prefix' => 'admin'], function () {    
    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
    
    Route::get('/about', ['as' => 'about', 'uses' => 'AboutController@index']);
    Route::post('/about/update', ['as' => 'about_update', 'uses' => 'AboutController@update']);
    
    Route::get('/articles', ['as' => 'articles', 'uses' => 'ArticleController@index']);
    Route::post('/articles/update/page', ['as' => 'article_update_page', 'uses' => 'ArticleController@update_page']);
    Route::get('/articles/create', ['as' => 'article_new', 'uses' => 'ArticleController@create']);
    Route::post('/articles/store', ['as' => 'article_store', 'uses' => 'ArticleController@store']);
    Route::get('/articles/edit/{id}', ['as' => 'article_edit', 'uses' => 'ArticleController@edit']);
    Route::post('/articles/update/{id}', ['as' => 'article_update', 'uses' => 'ArticleController@update']);
    Route::post('/articles/delete/{id}', ['as' => 'article_delete', 'uses' => 'ArticleController@delete']);
    
    Route::get('/projects', ['as' => 'projects', 'uses' => 'ProjectController@index']);
    Route::post('/projects/update/page', ['as' => 'project_update_page', 'uses' => 'ProjectController@update_page']);
    Route::get('/projects/create', ['as' => 'project_new', 'uses' => 'ProjectController@create']);
    Route::post('/projects/store', ['as' => 'project_store', 'uses' => 'ProjectController@store']);
    Route::get('/projects/edit/{id}', ['as' => 'project_edit', 'uses' => 'ProjectController@edit']);
    Route::post('/projects/update/{id}', ['as' => 'project_update', 'uses' => 'ProjectController@update']);
    Route::post('/projects/delete/{id}', ['as' => 'project_delete', 'uses' => 'ProjectController@delete']);
    
    Route::get('/categories', ['as' => 'categories', 'uses' => 'CategoryController@index']);
    Route::get('/categories/create', ['as' => 'category_new', 'uses' => 'CategoryController@create']);
    Route::post('/categories/store', ['as' => 'category_store', 'uses' => 'CategoryController@store']);
    Route::get('/categories/edit/{id}', ['as' => 'category_edit', 'uses' => 'CategoryController@edit']);
    Route::post('/categories/update/{id}', ['as' => 'category_update', 'uses' => 'CategoryController@update']);
    Route::post('/categories/delete/{id}', ['as' => 'category_delete', 'uses' => 'CategoryController@delete']);
    
    Route::get('/users/edit/{id}', ['as' => 'user_edit', 'uses' => 'UserController@edit']);
    Route::post('/users/update', ['as' => 'user_update', 'uses' => 'UserController@update']);
    
    Route::get('/contact', ['as' => 'contact_admin', 'uses' => 'ContactController@index']);
    Route::post('/contact/update', ['as' => 'contact_admin_update', 'uses' => 'ContactController@update']);
    
    Route::get('/sitemap', ['as' => 'sitemap_admin', 'uses' => 'SitemapController@index']);
    Route::post('/sitemap/update', ['as' => 'sitemap_admin_update', 'uses' => 'SitemapController@update']);
});

// Images

// $type -> fit, crop, resize
Route::get('/assets/images/about/{width}/{height}/{name?}', ['as' => 'about_image', function($width, $height, $name = 'cover', $type = 'fit') {
	$img = Image::cache(function($image) use ($name, $width, $height, $type) {
		$image->make(public_path('/assets/images/about/'.$name.'.jpg'))->$type($width, $height);
	}, 5, true);
	return $img->response('jpg');
}]);

Route::get('/assets/images/articles/{id}/{width}/{height}/{name?}', ['as' => 'article_image', function($id, $width, $height, $name = 'cover', $type = 'fit') {
	$img = Image::cache(function($image) use ($id, $name, $width, $height, $type) {
		$image->make(public_path('/assets/images/articles/'.$id.'/'.$name.'.jpg'))->$type($width, $height);
	}, 5, true);
	return $img->response('jpg');
}]);

Route::get('/assets/images/projects/{id}/{width}/{height}/{name?}', ['as' => 'project_image', function($id, $width, $height, $name = 'cover', $type = 'fit') {
	$img = Image::cache(function($image) use ($id, $name, $width, $height, $type) {
		$image->make(public_path('/assets/images/projects/'.$id.'/'.$name.'.jpg'))->$type($width, $height);
	}, 5, true);
	return $img->response('jpg');
}]);

Route::get('/assets/images/{name}/{width}/{height}', ['as' => 'cover_image', function($name, $width, $height, $type = 'resize') {
	$img = Image::cache(function($image) use ($name, $width, $height, $type) {
		$image->make(public_path('/assets/images/'.$name.'/cover.jpg'))->$type($width, $height);
	}, 5, true);
	return $img->response('jpg');
}]);
