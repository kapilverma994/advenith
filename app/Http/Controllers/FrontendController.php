<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
   public function welcome(){
       $posts=Post::all();
    return view('welcome',compact('posts'));
   }
}
