<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

//> АДМИНКА БЛОГА
    // /admin
    Route::get('/admin', 'Admin\AdminController@index')->name('admin');

        // /admin/users
        Route::resource('/admin/users', 'UserController')->names('admin.users')->except(['show']);

        // /admin/blog
        $adminBlogData = [
            'namespace' =>'Admin\Blog',
            'prefix' => 'admin/blog'
        ];
        Route::group($adminBlogData, function(){
            //BlogCategory
            Route::resource('categories', 'BlogCategoryController')
                ->except(['show'])
                ->names('admin.blog.categories');

            //BlogPost
            Route::resource('posts', 'BlogPostController')
                ->except(['show'])
                ->names('admin.blog.posts');

                //BlogPost restore()
                //Route::get('posts/{post}', 'BlogPostController@restore')->name('blog.admin.posts.restore');
        });
//<
