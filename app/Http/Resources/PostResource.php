<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    
    public function toArray($request)
    {
        return 
        [
            'Post Id '=> $this->id ,
            'Post Tiltle'=> $this->title ,
            'Post body'=> $this->body
        ] ;
    }
}
