<?php

$this->group(['prefix' => 'auth'], function () {
    $this->post('login', 'AuthenticationController@login')->name('login');
    $this->post('logout', 'AuthenticationController@logout')->middleware('auth')->name('logout');
    $this->post('refresh', 'AuthenticationController@refresh')->middleware('auth')->name('refresh');
    $this->post('me', 'AuthenticationController@me')->middleware('auth')->name('me');
});

$this->post('contact', 'ContactController@sendContactEmail')->name('contact');
