<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminBashController extends Controller
{
    public $auth;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->auth = \Auth::guard('admin');
    }

    public function ajaxResponse($result, $data = "")
    {
        if ($result) {
            $return_data = $data;
        } else {
            $return_data = [];
            if (is_string($data)) {
                $return_data['message'] = $data;
            } elseif (is_array($data)) {
                $return_data['message'] = $data;
            }
        }
        // 在IE8下Content-Type=application/json会被提示直接下载, 为了兼容IE8, 将header改为text/html
        return response()->json([
            'result' => !!$result,
            'data' => $return_data
        ]);
    }



    public function validateResponse( $inputs, $class ){
        $rules = $class::rules();
        $message = $class::message();
//        dd($inputs,$rules,$message);
        $validator = \Validator::make($inputs,$rules,$message);
        if ($validator->fails()){
            return $validator->errors()->toArray();
        }
        return true;
    }
}




