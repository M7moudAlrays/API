<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    
    public function index()
    {
        $posts=Posts::get();
        return view('posts.index',compact('posts')) ;
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Posts $posts)
    {
        //
    }

    
    public function edit(Posts $posts)
    {
        //
    }

    
    public function update(Request $request, Posts $posts)
    {
        //
    }

    
    public function destroy(Posts $posts)
    {
        //
    }
}
