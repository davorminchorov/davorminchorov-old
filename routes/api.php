<?php

$this->router->group(['prefix' => 'auth'], function ($router) {
    $this->router->post('login', 'AuthenticationController@login')->name('login');
    $this->router->post('logout', 'AuthenticationController@logout')->middleware('auth')->name('logout');
    $this->router->post('refresh', 'AuthenticationController@refresh')->middleware('auth')->name('refresh');
    $this->router->post('me', 'AuthenticationController@me')->middleware('auth')->name('me');
});

$this->router->group(['prefix' => 'admin', 'middleware' => ['auth']], function ($router) {
    $this->router->get('posts', 'Admin\PostsController@index')->name('admin.posts.index');
    $this->router->post('posts', 'Admin\PostsController@store')->name('admin.posts.store');
    $this->router->delete('posts/{id}', 'Admin\PostsController@destroy')->name('admin.posts.destroy');
    $this->router->get('posts/{id}', 'Admin\PostsController@show')->name('admin.posts.show');
    $this->router->patch('posts/{id}', 'Admin\PostsController@update')->name('admin.posts.update');
});

$this->router->post('contact', 'ContactController@sendContactEmail')->name('contact');

$this->router->get('posts', 'PostsController@index')->name('posts.index');
$this->router->get('posts/{slug}', 'PostsController@show')->name('posts.show');
