<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i=1;
        $categories = Category::latest()->paginate(15);
        return view('admin.category.index',compact('categories','i'))->with('i',(request()->input('page',1)-1)*15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'title' => 'required|unique:categories,name|max:255',
        ]);

        $Category = new Category;
        $Category->name = $request->title;
        $Category->slug = Str::slug($request->title);
        $Category->description = $request->description;
        $Category->save();

        Session::flash('success','Categories Added Successfully');

        return redirect()->back();

        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        
        return view('admin.category.edit',compact('category'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => "required|unique:categories,name,$category->name|max:255",
        ]);

        
        $category->name = $request->title;
        $category->slug = Str::slug($request->title);
        $category->description = $request->description;
        $category->save();

        Session::flash('success','Categories Updated Successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category){
            $category->delete();
            Session::flash('success','Category Deleted Successfully');
            return redirect()->back();
        }
    }
}
