<?php

namespace App\Repositories;

use App\Models\Admin\Blog\BlogPost as Model;

/**
 * Class BlogPostRepository
 *
 * @package App\Repositories
 */
class BlogPostRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить список постов
     *
     * @param int id
     *
     * @return Model
     */
    public function getList()
    {
        return $this->startConditions()->orderBy('id', 'DESC')->where('is_published', 1)->paginate(20);
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
     * Получить результаты поиска
     *
     * @param $input
     * @return mixed
     */
    public function getSearch($input)
    {
        return $this->startConditions()->search($input)->get();
    }

    /*public function getForRestore($id)
    {
        return $this->startConditions()->withTrashed()->find($id);
    }*/
}
