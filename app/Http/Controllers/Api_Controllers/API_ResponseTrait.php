<?php

namespace app\Http\Controllers\Api_Controllers ;


trait API_ResponseTrait
{
    public function apiresponsefunction($DATA,$MSG,$STATUS)
    {

        $array =
        [
            'data'=> $DATA ,
            'message'=> $MSG ,
            'status'=> $STATUS
        ] ;

        return response($array) ;
    }
}