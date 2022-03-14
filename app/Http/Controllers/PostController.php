<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i=1;
        $post = Post::latest()->paginate(7);
        return view('admin.post.index',compact('post','i'))->with('i',(request()->input('page',1)-1)*7);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('admin.post.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // image validation //
    $request->validate([
        'title' => 'required|unique:posts,title|max:255',
        'description' => 'required',
        'image' => 'required|image',
        ]);
    
        $imageName = '';
        if($request->image){
        $imageName= time().'.'.$request->file('image')->getClientOriginalExtension();
        $request->image->move(public_path('uploads'),$imageName);
        }

        
    
        // data store to database //
        $post = new Post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->image = $imageName;
        $post->description = $request->description;
        $post->category_id = $request->category;
        $post->user_id = Auth()->user()->id;
        $post->published_at = Carbon::now();
        $post->save();

        Session::flash('success','Post Create Successfully');

        return redirect()->back();

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
        
        $category=Category::all();
        return view('admin.post.edit',compact('post','category'));
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
            'title' => 'required|unique:posts,title|max:255',
            'description' => 'required',
            'image' => 'required|image',
            ]);
        
            $imageName = '';
            if($request->image){
            $imageName= time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            }
    
            
            // data update to database //
            $post->title = $request->title;
            $post->slug = Str::slug($request->title);
            $post->image = $imageName;
            $post->description = $request->description;
            $post->category_id = $request->category;
            $post->user_id = Auth()->user()->id;
            $post->published_at = Carbon::now();
            $post->save();
    
            Session::flash('success','Post Updated Successfully');
    
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        Session::flash('success','Post Deleted Successfully');

        return redirect()->back();
    }
}
