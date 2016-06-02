<?php
/**
 * Created by PhpStorm.
 * User: suki
 * Date: 01/Jun/2016
 * Time: 22:41
 */

namespace App\Repository\Eloquent;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Luminaire\Gateway\Repository\Eloquent;

class EloquentCategoryRepository extends Eloquent implements CategoryRepository{

    public function __construct(Category $category)
    {
        $this->entity = $category;
    }

    /**
     * The Sort method on the retrieval of Entity from the Repository
     *
     * @param  string|null $sort
     * @return $this
     */
    public function sort($sort = null)
    {
        switch ($sort)
        {
            case 'name':
                $this->query->orderBy('name', 'asc')->orderBy('created_at', 'desc');
                break;
            default:
                $this->query->orderBy('created_at', 'desc');
        }

        return parent::sort($sort);    }

    /**
     * Store Data into Database
     *
     * @param  array|null $params
     * @return $this
     */
    public function store($params = null)
    {
        return parent::create($params);
    }

    /**
     *
     * The Update method on the update of Entity from the Repository
     *
     * @param mixed $value
     * @param array $attributes
     * @param string $key
     * @return mixed
     */
    public function update($value, $attributes, $key = 'id')
    {
        return parent::update($value, $attributes, $key);
    }

    /**
     *
     * Limit Data to be returned
     *
     * @param $number
     * @return mixed
     */
    public function take($number)
    {
        return $this->query->take($number);
    }

    /**
     * Find Entity By Id
     *
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->query->find($id);
    }

    /**
     * Extract to Array
     * @return mixed
     */
    public function toArray() {
        return $this->query->get()->toArray();
    }
}