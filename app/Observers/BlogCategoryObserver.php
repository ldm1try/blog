<?php

namespace App\Observers;

use App\Models\Admin\Blog\BlogCategory;
use Illuminate\Support\Str;
use App\Repositories\BlogCategoryRepository;

class BlogCategoryObserver
{
    public function __construct()
    {
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * Handle the blog category "created" event.
     *
     * @param  \App\Models\Admin\Blog\BlogCategory  $blogCategory
     * @return void
     */
    public function created(BlogCategory $blogCategory) //методы которые происходят после события
    {
        //
    }
    /**
     * @param BlogCategory $blogCategory
     */
    public function creating(BlogCategory $blogCategory)
    {
        $this->setSlug($blogCategory);
    }
    /**
     * Если после slug пустое, то заполняем его конвертацией заголовка
     */
    protected function setSlug(BlogCategory $blogCategory)
    {
        if (empty($blogCategory->slug)) {
            $blogCategory->slug = Str::slug($blogCategory->title);
        }
    }
    /**
     * Handle the blog category "updated" event.
     *
     * @param  \App\Models\Admin\Blog\BlogCategory  $blogCategory
     * @return void
     */
    public function updated(BlogCategory $blogCategory)
    {
        //
    }
    /**
     * @param BlogCategory $blogCategory
     */
    public function updating(BlogCategory $blogCategory)
    {
        $this->setSlug($blogCategory);
    }
    /**
     * Handle the blog category "deleted" event.
     *
     * @param  \App\Models\Admin\Blog\BlogCategory  $blogCategory
     * @return void
     */
    public function deleted(BlogCategory $blogCategory)
    {
        //
    }

    public function deleting(BlogCategory $blogCategory)
    {
        // Удаление фотографий постов затем постов
        if ($items = $this->blogCategoryRepository->getCategoryPosts($blogCategory->id)) {
            foreach($items as $item) {
                $photoFiles = $item->getMedia('photo');
                foreach ($photoFiles as $photoFile) {
                    $photoFile->delete();
                }

                $item->forceDelete();
            }
        }
    }

    /**
     * Handle the blog category "restored" event.
     *
     * @param  \App\Models\Admin\Blog\BlogCategory  $blogCategory
     * @return void
     */
    public function restored(BlogCategory $blogCategory)
    {
        //
    }
    /**
     * Handle the blog category "force deleted" event.
     *
     * @param  \App\Models\Admin\Blog\BlogCategory  $blogCategory
     * @return void
     */
    public function forceDeleted(BlogCategory $blogCategory)
    {
        //
    }
}