<?php

namespace App\Repositories;

use App\Models\Admin\Blog\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Admin\Blog\BlogPost;


/**
 * Class BlogCategoryRepository
 *
 * @package App\Repositories
 */
class BlogCategoryRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить модель для редактирования в админке
     *
     * @param int id
     *
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Получить список категорий для вывода в выпадающем списке.
     *
     * @return Collection
     */
    public function getForComboBox()
    {
        //return $this->startConditions()->all();
        $columns = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) AS id_title',
        ]);

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }

    /**
     * Получение постов категории
     */
    public function getCategoryPosts($id)
    {
        $item = $this->getEdit($id);

        return BlogPost::where('category_id', '=', "$item->id")->get();
    }
}