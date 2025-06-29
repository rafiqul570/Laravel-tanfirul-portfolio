<?php

namespace App\Http\Controllers;

use App\Http\Controllers\appointmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class HomeController extends Controller
{

    //Role Management
    public function index(){
        $role = Auth::user()->role;
        if($role == '1'){
            return view('admin.dashboard');
        }else{

            $posts = Post::all();
            return view('homePage', compact('posts'));
        }


    }



    
}
