<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class BlogPost extends Model implements HasMedia
{
    use HasMediaTrait;
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

    /**
     * Laravel Medialibrary
     */
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('photo')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('photo-conversion_thumb')
                    ->optimize()
                    ->width(200)
                    ->height(100);

                $this
                    ->addMediaConversion('photo-conversion_optimize')
                    ->optimize();
            });
    }
}
// TODO: Можно ли удалить исходные файлы после преобразования изображений с помощью Spatie Media Library (v7) - например, клиент загружает файлы с огромным разрешением, но нам нужны только их ширину около 1000 пикселей и не нужно хранить огромные оригиналы.