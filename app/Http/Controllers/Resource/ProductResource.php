<?php
/**
 * Created by PhpStorm.
 * User: suki
 * Date: 01/Jun/2016
 * Time: 23:02
 */

namespace App\Http\Controllers\Resource;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;

class ProductResource extends ResourceBase{

    /**
     * Product Repository instance
     * @var ProductRepository
     */
    protected $product;

    public function __construct(ProductRepository $product) {
        $this->product = $product;
    }

    /**
     * Product List
     * @return array
     */
    public function index() {
        try {
            $products = $this->product->all();
            if(empty($products)) {
                $apiProducts = [];
            } else {
                $apiProducts = [
                    "products" => $products->toArray()
                ];
            }
        } catch(\Exception $e) {
            return $this->failedResponse($e->getMessage());
        }
        return $this->successResponse($apiProducts);
    }

    /**
     * Store Product to database
     * @param Request $request
     * @return array
     */
    public function store(Request $request) {
        try {
            $this->product->store($request->all());
        } catch(\Exception $e) {
            return $this->failedResponse($e->getMessage());
        }
        return $this->successResponse();
    }

    /**
     * Update a product
     * @param Request $request
     * @param $productId
     * @return mixed
     */
    public function update($productId, Request $request) {
        try {
            $product = $this->getProductById($productId);
            $this->product->update($product, $request->all());
        } catch(\Exception $e) {
            return $this->failedResponse($e->getMessage());
        }
        return $this->successResponse();
    }

    /**
     * Delete a product from Database
     * @param $productId
     * @return mixed
     */
    public function delete($productId) {
        try {
            $product = $this->getProductById($productId);
            $this->product->delete($product);
        }catch (\Exception $e) {
            return $this->failedResponse($e->getMessage());
        }
        return $this->successResponse();
    }

    public function getProductById($id) {
        return $this->product->findById($id);
    }

}