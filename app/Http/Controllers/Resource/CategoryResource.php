<?php
/**
 * Created by PhpStorm.
 * User: suki
 * Date: 01/Jun/2016
 * Time: 23:02
 */

namespace App\Http\Controllers\Resource;
use App\Repository\CategoryRepository;
use Illuminate\Http\Request;

class CategoryResource extends ResourceBase{

    /**
     * Category Repository instance
     * @var CategoryRepository
     */
    protected $category;

    /**
     * @param CategoryRepository $category
     */
    public function __construct(CategoryRepository $category) {
        $this->category = $category;
    }

    /**
     * Category list
     * @return array
     */
    public function index() {
        try {
            $categories = $this->category->all();
            if(empty($categories)) {
                $apiCategories = [];
            }
            else {
                $apiCategories = [
                    "categories" => $categories->toArray()
                ];
            }
        } catch(\Exception $e) {
            return $this->failedResponse($e->getMessage());
        }
        return $this->successResponse($apiCategories);
    }

    /**
     * Store Category to database
     * @param Request $request
     * @return array
     */
    public function store(Request $request) {
        try {
            $this->category->store($request->all());
        } catch(\Exception $e) {
            return $this->failedResponse($e->getMessage());
        }
        return $this->successResponse();
    }

    /**
     * Update a category
     * @param Request $request
     * @param $categoryId
     * @return mixed
     */
    public function update($categoryId, Request $request) {
        try {
            $category = $this->getCategoryById($categoryId);
            $this->category->update($category, $request->all());
        } catch(\Exception $e) {
            return $this->failedResponse($e->getMessage());
        }
        return $this->successResponse();
    }

    /**
     * Delete a category from Database
     * @param $categoryId
     * @return mixed
     */
    public function delete($categoryId) {
        try {
            $category = $this->getCategoryById($categoryId);
            $this->category->delete($category);
        }catch (\Exception $e) {
            return $this->failedResponse($e->getMessage());
        }
        return $this->successResponse();
    }

    public function getCategoryById($id) {
        return $this->category->findById($id);
    }

}