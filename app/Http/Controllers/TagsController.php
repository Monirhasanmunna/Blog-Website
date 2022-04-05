<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i=1;
        $tags = Tag::latest()->paginate(15);
        return view('admin.tags.index',compact('tags','i'))->with('i',(request()->input('page',1)-1)*15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
            'title' => 'required|unique:Tags,name|max:255',
        ]);

        $tag = new Tag;
        $tag->name = $request->title;
        $tag->slug = Str::slug($request->title);
        $tag->description = $request->description;
        $tag->save();

        Session::flash('success','Tags Added Successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tags)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'title' => 'required|unique:Tags,name|max:255',
        ]);

        $tag->name = $request->title;
        $tag->slug = Str::slug($request->title);
        $tag->description = $request->description;
        $tag->save();

        Session::flash('success','Tags Updated Successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        Session::flash('success','Tags Deleted Successfully');

        return redirect()->back();
    }
}
