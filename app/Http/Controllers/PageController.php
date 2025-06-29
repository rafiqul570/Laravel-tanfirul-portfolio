<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\appointmentController;
use App\Models\Category;
use App\Models\Post;

class PageController extends Controller
{
    public function HomePage(){                                    
        $categories = Category::all();
        $posts = Post::all();
        return view('homePage', compact('categories', 'posts'));
        }

    
    public function messageConfirmation(){

        return view('pages.message-confirmation');

    }

    //product display in category id
    public function categoryPage($id){
        $categories = Category::all();
        $category_id = Post::where('category_id', $id)->value('category_id');
        $posts = Post::where('category_id', $category_id)->latest()->get();
        
        return view('pages.categoryPage', compact('categories','posts'));

    }


    
}
