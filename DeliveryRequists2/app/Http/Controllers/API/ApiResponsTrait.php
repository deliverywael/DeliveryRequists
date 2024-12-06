<?php

namespace App\Http\Controllers\API;

trait ApiResponsTrait
{

    public function apiResponse ($data= null , $message = null ,$status = null ){
        $array =[
            'data'=>$data,
            'message'=>$message,
            'status'=>$status
        ];
        //return response($data,$status,$array); هذا صحيح ايضاَ
        return response($array,$status);
    }
}
