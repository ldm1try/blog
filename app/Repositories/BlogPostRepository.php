<?php
/**
 * Created by PhpStorm.
 * User: lesnyakdv
 * Date: 23.05.2019
 * Time: 10:53
 */

namespace App\Repositories;

use App\Models\Admin\Blog\BlogPost as Model;
use Illuminate\Pagination\LengthAwarePaginator;

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

    /*public function getForRestore($id)
    {
        return $this->startConditions()->withTrashed()->find($id);
    }*/
}