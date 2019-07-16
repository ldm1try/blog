<?php

namespace App\Models\Admin\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use App\User;

class BlogPost extends Model implements HasMedia
{
    use HasMediaTrait;
    use SoftDeletes;
    use Searchable;

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
                    ->addMediaConversion('photo-conversion_optimize');
            });
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        return array(
            'id' => $array['id'],
            'title' => $array['title']
        );
    }
}