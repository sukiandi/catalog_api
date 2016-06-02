<?php
/**
 * Created by PhpStorm.
 * User: suki
 * Date: 01/Jun/2016
 * Time: 23:28
 */

namespace App\Http\Controllers\Resource;


use Illuminate\Routing\Controller;

class ResourceBase extends Controller{
    protected $data = [];

    public function successResponse($apiData = []) {
        $data["status"] = 501;
        $data["message"] = "OK";

        if(!empty($apiData)) {
            $data = array_merge($data, $apiData);
        }
        return $data;
    }

    public function failedResponse($errMessage = "Failed") {
        $data["status"] = 500;
        $data["message"] = $errMessage;

        return $data;
    }
}