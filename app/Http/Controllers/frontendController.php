<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class frontendController extends Controller
{
    public function home()
    {
        $frontendPost = Post::all();
        $posts = Post::latest()->paginate(9);
        return view('website.home',compact(['posts','frontendPost']))->with((request()->input('page',1)-1)*9);
    }

    public function category()
    {
        return view('website.category');
    }

    public function post($slug)
    {
        
        $post = Post::where('slug',$slug)->first();
        if($post){
            return view('website.post',compact('post'));
        }else{
            return redirect('/');
        }     
        
    }

    public function contact()
    {
        return view('website.contact');
    }
}
