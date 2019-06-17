<?php

namespace App\Observers;

use App\BlogPost;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class BlogPostObserver
{
    /**
     * Отработка ПЕРЕД созданием записи
     *
     * @param BlogPost $blogPost
     */
    public function creating(BlogPost $blogPost)
    {
        $blogPost->user_id = auth()->id();

        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
        $this->setHtml($blogPost);
        $this->setUser($blogPost);
    }
    /**
     * Если дата публикации не установлена "и происходит установка фалага" "Опубликовано",
     * то устанавливаем дату публикации на текущую.
     *
     * @param BlogPost $blogPost
     */
    protected function setPublishedAt(BlogPost $blogPost)
    {
        if (empty($blogPost->published_at) && $blogPost->is_published) {
            $blogPost->published_at = Carbon::now();
        }
    }
    /**
     * Если после Slug пустое, то заполняем его конвертацией заголовка.
     *
     * @param BlogPost $blogPost
     */
    protected function setSlug(BlogPost $blogPost)
    {
        if (empty($blogPost->slug)) {
            $blogPost->slug = Str::slug($blogPost->title);
        }
        /*if ($blogPost->title != $blogPost->slug) {
            $blogPost->slug = $blogPost->title;
        }*/
    }
    /**
     * Установка значения полю content_html относительно поля content_raw.
     *
     * @param BlogPost $blogPost
     */
    protected function setHtml(BlogPost $blogPost) {
        if ($blogPost->isDirty('content_raw')) {
            //TODO: Тут должна быть генерация Markdown -> html
            $blogPost->content_html = $blogPost->content_raw;
        }
    }
    /**
     * Если не указан user_id то устанавливаем пользователя по умолчанию
     *
     * @param BlogPost $blogPost
     */
    protected function setUser(BlogPost $blogPost)
    {
        $blogPost->user_id = auth()->id ?? BlogPost::UNKNOWN_USER; //?? - в противном случае
    }
    /**
     * Отработка ПЕРЕД обновлением записи
     *
     * @param BlogPost $blogPost
     */
    public function updating(BlogPost $blogPost)
    {
        // Некоторые полезные методы использующиеся в обсервере
        /*$test[] = $blogPost->isDirty(); // Изменялась ли модель или нет?
        $test[] = $blogPost->isDirty('is_published'); //Проверить на изменение какого либо конкретного поля
        $test[] = $blogPost->isDirty('user_id');
        $test[] = $blogPost->getAttribute('is_published'); //Получить значение измененного атрибута которое сейчас полетит в базу
        $test[] = $blogPost->is_published;
        $test[] = $blogPost->getOriginal('is_published'); //Получить старое значение которое сейчас имеется в базе*/
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);

        if ($blogPost->isDirty('title')){
            $blogPost->slug = $blogPost->title;
        }
    }
    /**
     * Handle the blog post "created" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function created(BlogPost $blogPost)
    {
        //
    }
    /**
     * Handle the blog post "updated" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function updated(BlogPost $blogPost)
    {
        //
    }
    /**
     * Handle the blog post "deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
        //
    }
    /**
     * Handle the blog post "restored" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }
    /**
     * Handle the blog post "force deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }
}
