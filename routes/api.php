<?php

$router->group(['prefix' => 'auth'], function ($router) {
    $router->post('login', 'AuthenticationController@login')->name('login');
    $router->post('logout', 'AuthenticationController@logout')->middleware('auth')->name('logout');
    $router->post('refresh', 'AuthenticationController@refresh')->middleware('auth')->name('refresh');
    $router->post('me', 'AuthenticationController@me')->middleware('auth')->name('me');
});

$router->post('contact', 'ContactController@sendContactEmail')->name('contact');
