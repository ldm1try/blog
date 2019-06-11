<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogCategory
 *
 * @package App
 *
 * @property-read BlogCategory $parentCategory
 * @property-read string $parentTitle
 */
class BlogCategory extends Model
{
    use SoftDeletes;

    /**
     * id корня
     */
    const ROOT = 1;
    protected $fillable
        = [
            'title',
            'slug',
            'parent_id',
            'description',
        ];
    /**
     * Получить родительскую категорию
     *
     * @return belongsTo
     */
    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }
    /**
     * Пример аксессуара (Accessor)
     *
     * @return string
     */
    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title
            ?? ($this->isRoot()
                ? 'Корень'
                : '???');
        return $title;
    }
    /**
     * Является ли текущий объект корневым
     */
    public function isRoot()
    {
        return $this->id === BlogCategory::ROOT;
    }
}
