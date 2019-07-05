<?php


namespace App\Http\Controllers\Blog;

use App\Models\Admin\Blog\BlogPost;

class BlogPostController
{
    public function index()
    {
        return view('blog.posts.index');
    }

    public function getJson()
    {
        $postlist = BlogPost::orderBy('id', 'DESC')->get();

        return $postlist;
    }
}