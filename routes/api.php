<?php

use App\Api\V1\Controllers\Admin\PostsController as AdminPostsController;
use App\Api\V1\Controllers\AuthenticationController;
use App\Api\V1\Controllers\ContactController;
use App\Api\V1\Controllers\PostsController;

$this->router->group(['prefix' => 'auth'], function () {
    $this->router->post('login', [AuthenticationController::class,'login'])->name('login');
    $this->router->post('logout', [AuthenticationController::class,'logout'])->middleware('auth')->name('logout');
    $this->router->post('refresh', [AuthenticationController::class,'refresh'])->middleware('auth')->name('refresh');
    $this->router->post('me', [AuthenticationController::class,'me'])->middleware('auth')->name('me');
});

$this->router->group(['prefix' => 'admin', 'middleware' => ['auth']], function ($router) {
    $this->router->get('posts', [AdminPostsController::class, 'index'])->name('admin.posts.index');
    $this->router->post('posts', [AdminPostsController::class, 'store'])->name('admin.posts.store');
    $this->router->delete('posts/{id}', [AdminPostsController::class, 'destroy'])->name('admin.posts.destroy');
    $this->router->get('posts/{id}', [AdminPostsController::class, 'show'])->name('admin.posts.show');
    $this->router->patch('posts/{id}', [AdminPostsController::class, 'update'])->name('admin.posts.update');
});

$this->router->post('contact', [ContactController::class, 'sendContactEmail'])->name('contact');

$this->router->get('posts', [PostsController::class, 'index'])->name('posts.index');
$this->router->get('posts/{slug}', [PostsController::class, 'show'])->name('posts.show');
