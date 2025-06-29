<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Post;
use File;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('post.index', compact('posts'));
    }

    public function create(){
        $categories = Category::latest()->get();
        return view('post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required',
            'post_image' => 'nullable|image|mimes:jpeg,png,PNG,jpg,JPG,gif|max:2048',
        ]);

        //image Insert 
        $image_name = '';
        if($request->has('post_image')){
            $image = $request->file('post_image');
            $image_name = uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/image/',$image_name);
            
        }

         Post::insert([
            'title' =>  $request->title,
            'short_description' =>  $request->short_description,
            'post_image' =>  $image_name,
            
        ]);

        return back()->with('success', 'Success! data insert Successfully');
    }




}
