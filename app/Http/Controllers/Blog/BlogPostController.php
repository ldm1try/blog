<?php


namespace App\Http\Controllers\Blog;

use App\Models\Admin\Blog\BlogPost;
use App\Repositories\BlogPostRepository;
use App\Repositories\BlogCategoryRepository;

class BlogPostController
{
    /**
     * @var  BlogPostRepository
     */
    private $blogPostRepository;
    /**
     * @var  BlogCategoryRepository
     */
    private $blogCategoryRepository;
    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->blogPostRepository = app(BlogPostRepository::class);
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    public function index()
    {
        $items = BlogPost::orderBy('id', 'DESC')->where('is_published', 1)->paginate(20);

        return view('blog.posts.index', compact('items', 'photoFile'));
    }

    public function show($id)
    {
        $item = $this->blogPostRepository->getEdit($id);

        $photoFiles = $item->getMedia('photo');

        return view('blog.posts.detail', compact('item', 'photoFiles'));
    }
}