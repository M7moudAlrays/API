<?php

namespace App\Http\Controllers\Api_Controllers;

use app\Http\Controllers\Api_Controllers\Api_respons_Trait;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Http\ResponseTrait;
use Illuminate\Support\Facades\Validator;

class api_postcontroller extends Controller
{

    use API_ResponseTrait ;

    public function index()
    {
        $posts=  PostResource::collection(Posts::all()) ; 
        return $this->apiresponsefunction($posts,'OK',200) ;
    
    }

    public function show($id)
    {
        $post= Posts::find($id) ; 
        
        if($post)
        {
            return $this->apiresponsefunction(new PostResource($post),'OK',200) ;
        }
        else 
        {
            return $this->apiresponsefunction($post,'No Data Found',404) ; 
        }
    }

    public function store(Request $request)
    {
        $RequestValidate =Validator::make($request->all(),
            [
                'title' => 'required',
                'body' => 'required'
            ] ,
            [
                'title.required' => 'You Should Enter Post Title' ,
                'body.required' => 'You Should Enter Post body'
            ]
        );

        if ($RequestValidate->fails())
        {
            return $this->apiresponsefunction('NULL',$RequestValidate->errors(),404) ;
        }

        $post = Posts::create($request->all());

        if ($post)
        {
            return $this->apiresponsefunction(new PostResource ($post),'New Post Added',200) ;
        }
        else
        {
            return $this->apiresponsefunction($post,'No Post Added',200) ;
        }
    }


public function update(Request $request)

    {
        $post= Posts::find($request->id);

        if(!$post)
        {
            return $this->apiresponsefunction('Null','This Post Not Founded',200) ;
        }

        $RequestValidate =Validator::make
        (
            $request->all(), 
            ['title' => 'required' , 'body' => 'required'] ,
            ['title.required' => 'enter title post'] 
        );

        if ($RequestValidate->fails())
        {
            return $this->apiresponsefunction('NULL',$RequestValidate->errors(),404) ;
        }

        $post->update($request->all()) ;
        return $this->apiresponsefunction(new PostResource ($post),'This Post updated Successfully',200) ;
        
    }

    public function destroy(Request $request)
    {
        $post= Posts::find($request->id);

        if(!$post)
        {
            return $this->apiresponsefunction('Null','This Post Not Founded',200) ;
        }

        $post->delete($request->id) ;
        {
            return $this->apiresponsefunction('NULL','Post number {'.$request->id.'} Deleted Successfully',200) ;
        }

    }
}