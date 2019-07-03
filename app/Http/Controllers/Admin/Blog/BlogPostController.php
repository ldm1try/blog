<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog\BlogPost;
use App\Http\Requests\BlogPostCreateRequest;
use App\Http\Requests\BlogPostUpdateRequest;
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
        $this->middleware('auth');

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
        $items = BlogPost::paginate(10);

        return view('admin.blog.posts.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $item = new BlogPost();
        $categoryList = $this->blogCategoryRepository->getForComboBox();

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

        //Загрузка фото
        if ($photoFiles = $request->file('photo_upload')) {
            foreach ($photoFiles as $photoFile) {
                $item->addMedia($photoFile)->toMediaCollection('photo');
            }
        }

        if ($item) {
            return redirect()->route('admin.blog.posts.edit', [$item->id])
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

        $photoFiles = $item->getMedia('photo');

        $categoryList = $this->blogCategoryRepository->getForComboBox();

        return view('admin.blog.posts.edit',
            compact('item', 'categoryList', 'photoFiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {
        $item = $this->blogPostRepository->getEdit($id);

        //Загрузка фото
        if ($photoFiles = $request->file('photo_upload')) {
            foreach ($photoFiles as $photoFile) {
                $item->addMedia($photoFile)->toMediaCollection('photo');
            }
        }

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
        //Удаление фото
        $item = $this->blogPostRepository->getEdit($id);
        $photoFiles = $item->getMedia('photo');
            foreach ($photoFiles as $photoFile) {
                $photoFile->delete();
            }

        /*$result = BlogPost::destroy($id);*/ // soft delete
        $result = BlogPost::find($id)->forceDelete();

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
    /*public function restore($id)
    {
        $result = $this->blogPostRepository->getForRestore($id)->restore();

        if ($result) {
            return redirect()
                ->route('admin.blog.posts.index')
                ->with(['success' => "Запись id[$id] успешно восстановлена"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка восстановления записи']);
        }
    }*/
}
