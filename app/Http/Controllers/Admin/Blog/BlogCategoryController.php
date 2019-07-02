<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog\BlogCategory;
use App\Models\Admin\Blog\BlogPost;
use Illuminate\Http\Request;
use App\Http\Requests\BlogCategoryUpdateRequest;
use Illuminate\Support\Str;
use App\Repositories\BlogCategoryRepository;
/**
 * Управление категориями блога
 *
 * @package App\Http\Controllers\Blog\Admin
 */
class BlogCategoryController extends Controller
{
    /**
     * @var BlogCategoryRepository
     */
    private $blogCategoryRepository;

    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();

        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$paginator = BlogCategory::paginate(5);
        $paginator = $this->blogCategoryRepository->getAllWithPaginate(10);
        return view('admin.blog.categories.index', compact('paginator'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogCategory();
        $categoryList
            = $this->blogCategoryRepository->getForComboBox();
        return view('admin.blog.categories.edit',
            compact('item', 'categoryList'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryUpdateRequest $request)
    {
        $data = $request->input();

        //Создаст объект и добавит в БД до "save"
        $item = (new BlogCategory())->create($data);

        if ($item) {
            return redirect()->route('admin.blog.categories.edit', [$item->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(__METHOD__);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  BlogCategoryRepository  $categoryRepository
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id, BlogCategoryRepository $categoryRepository)
    {
        //dd(__METHOD__);
        //$item = BlogCategory::FindOrFail($id);
        //$categoryList = BlogCategory::all();
        $item = $this->blogCategoryRepository->getEdit($id);
        if (empty($item)){
            abort(404);
        }

        $categoryList
            = $this->blogCategoryRepository->getForComboBox();

        return view('admin.blog.categories.edit',
            compact('item', 'categoryList', 'categories'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  BlogCategoryUpdateRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        //dd(__METHOD__);
        $item = $this->blogCategoryRepository->getEdit($id);
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }
        $data = $request->all();
        $result = $item->update($data);
        if ($result) {
            return redirect()
                ->route('admin.blog.categories.edit', $item->id)
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = BlogCategory::find($id);

        //Удаление фотографий постов
        $postsList = BlogPost::where('category_id', '=', "$item->id")->get();
            foreach ($postsList as $post) {
                $photoFiles = $post->getMedia('photo');
                foreach ($photoFiles as $photoFile) {
                    $photoFile->delete();
                }
            }

        //Удаление поcтов категории
        BlogPost::where('category_id', '=', "$item->id")->forceDelete();

        //Удаление категории
        $result = $item->delete();

        if ($result) {
            return redirect()
                ->route('admin.blog.categories.index')
                ->with(['success' => 'Успешно удалено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}