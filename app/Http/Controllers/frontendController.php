<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class frontendController extends Controller
{
    public function home()
    {
        $frontendPost = Post::orderBy('created_at','Desc')->take(5)->get();
        $firstPost = $frontendPost->splice(0,2);
        $middlePost = $frontendPost->splice(0,1);
        $thiredPost = $frontendPost->splice(0,2);

        $footerPost = Post::inRandomOrder()->get();
        $footerFirstPost = $footerPost->splice(0,1);
        $footerMiddlePost = $footerPost->splice(0,2);
        $footerLastPost = $footerPost->splice(0,1);

        $posts = Post::latest()->paginate(9);
        return view('website.home',compact(['posts','frontendPost','firstPost','middlePost','thiredPost','footerFirstPost','footerMiddlePost','footerLastPost']))->with((request()->input('page',1)-1)*9);
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
