<?php
/**
 * Created by PhpStorm.
 * User: suki
 * Date: 01/Jun/2016
 * Time: 22:27
 */

namespace App\Repository;


use Luminaire\Gateway\Contract\Repository;

interface CategoryRepository extends Repository{

    /**
     * The Sort method on the retrieval of Entity from the Repository
     *
     * @param  string|null  $sort
     * @return $this
     */
    public function sort($sort = null);

    /**
     * Store Data into Database
     *
     * @param  array|null  $params
     * @return $this
     */
    public function store($params = null);

    /**
     *
     * The Update method on the update of Entity from the Repository
     *
     * @param mixed $value
     * @param array $attributes
     * @param string $key
     * @return mixed
     */
    public function update($value, $attributes, $key = 'id');

    /**
     *
     * Limit Data to be returned
     *
     * @param $number
     * @return mixed
     */
    public function take($number);

    /**
     * Find Entity By Id
     *
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * Extract to Array
     * @return mixed
     */
    public function toArray();
}