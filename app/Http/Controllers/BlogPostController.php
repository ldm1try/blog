<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Http\Requests\BlogPostCreateRequest;
use Illuminate\Http\Request;
use App\Repositories\BlogPostRepository;
use App\Repositories\BlogCategoryRepository;

class BlogPostController extends Controller
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
        parent::__construct();
        $this->blogPostRepository = app(BlogPostRepository::class);
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->blogPostRepository->getAllWithPaginate();

        return view('admin.blog.posts.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $item = new BlogPost();
        $categoryList
            = $this->blogCategoryRepository->getForComboBox();

        return view('admin.blog.posts.create',
            compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogPostCreateRequest $request)
    {
        $data = $request->input();
        $item = (new BlogPost())->create($data);

        if ($item) {
            return redirect()->route('admin.blog.posts.index', [$item->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->blogPostRepository->getEdit($id);
        if (empty($item)){
            abort(404);
        }

        $categoryList
            = $this->blogCategoryRepository->getForComboBox();

        return view('admin.blog.posts.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = $this->blogPostRepository->getEdit($id);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('admin.blog.posts.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $result = BlogPost::destroy($id);
        // полное удаление из бд
        //$result = BlogPost::find($id)->forceDelete();

        if ($result) {
            return redirect()
                ->route('admin.blog.posts.index', $id)
                ->with(['success' => "Запись id[$id] удалена"])
                ->with(['restore' => $id]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }

    /**
     * Восстановление удаленного поста
     */
    public function restore($id)
    {
        $result = $this->blogPostRepository->getForRestore($id)->restore();

        if ($result) {
            return redirect()
                ->route('admin.blog.posts.index')
                ->with(['success' => "Запись id[$id] успешно восстановлена"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка восстановления записи']);
        }
    }
}
