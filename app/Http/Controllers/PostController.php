<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Auth;

use Illuminate\Support\Facades\File;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
    
        $data=Post::with('category')->where(['user_id'=>$user->id])->get();
    
        return view('post.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return view('post.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
           
            'title' => 'required|unique:posts,title',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',

        ]);

        $post = new Post;

           $image = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'post' . time() . '.'  .$image->getClientOriginalExtension();
            //$location = 'public/uloads/banner/' . $filename;
            $location = 'public/uploads/post/';
            $image->move($location, $filename);
            $image = $filename;
        }
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category;
        $post->subcategory_id = $request->subcategory;
        $post->user_id = Auth::user()->id;
        $post->image = $image;
    
        $post->save();
return redirect()->route('post.index')->with('sucess','Post uploaded successfully');
        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post=Post::FindorFail($post->id);
          $cats = Category::all();
      return view('post.edit',compact('post','cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'category' => 'required',
           
            'title' => 'required|unique:posts,title,'.$post->id,
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',

        ]);

        
        $post = Post::find($post->id);

           $image = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'post' . time() . '.'  .$image->getClientOriginalExtension();
           
            $location = 'public/uploads/post/';
            $image->move($location, $filename);
            $image = $filename;
        $post->image = $image;
        }
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category;
        $post->subcategory_id = $request->subcategory;
        $post->user_id = Auth::user()->id;
      
    
        $post->save();
return redirect()->route('post.index')->with('success','Post Updated successfully');




       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post=Post::FindorFail($post->id);
        $path="public/uploads/post/$post->image";
      unlink($path);
      $post->delete();
      return redirect()->back();
    }
}
