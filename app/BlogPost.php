<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;

    const UNKNOWN_USER = 1;

    protected $fillable
        = [
            'title',
            'slug',
            'category_id',
            'excerpt',
            'content_raw',
            'is_published',
            'published_at',
        ];

    /**
     * Категория статьи
     *
     * @return BelongsTo
     */
    public function category()
    {
        // Статья принадлежит категории
        return $this->belongsTo(BlogCategory::class);
    }

    /**
     * Автор статьи
     *
     * @return BelongsTo
     */
    public function user()
    {
        // Статья принадлежит пользователю
        return $this->belongsTo(User::class);
    }

    public function upload()
    {
        return $this->HasMany(BlogUpload::class, 'post_id');
    }

    /**
     * Автор статьи
     *
     * @return HasMany
     */
    /*public function upload()
    {
        // Файл принадлежит посту
        return $this->HasMany(BlogUpload::class, 'post_id');
    }*/
}
