<?php


namespace App\Http\Controllers\Blog;

use App\Repositories\BlogPostRepository;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Http\Request;

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
        $items = $this->blogPostRepository->getList();

        return view('blog.posts.index', compact('items'));
    }

    public function show($id)
    {
        $item = $this->blogPostRepository->getEdit($id);

        $photoFiles = $item->getMedia('photo');

        return view('blog.posts.detail', compact('item', 'photoFiles'));
    }

    public function search(Request $request)
    {
        $error = ['error' => 'По данному запросу результатов не найдено, попробуйте другой запрос.'];

        $input = $request->input('keywords');

        if ($input)
        {
            $items = $this->blogPostRepository->getSearch($input);

            if ($items->count()) {
                return $items;
            } else {
                return $error;
            }
        }
    }
}
