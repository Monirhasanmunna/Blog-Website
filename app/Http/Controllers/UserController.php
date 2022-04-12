<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i=1;
        $user = User::latest()->paginate(15);
        return view('admin.user.index',compact('user','i'))->with('i',(request()->input('page',1)-1)*15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    //  return $request->all();

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'description'=>'max:1000',
            'image' => 'sometimes|nullable|image|mimes:jpg,png',
            'password'=>'required|min:8',

        ]);

        $imageName = '';
        if($request->image){
        $imageName= time().'.'.$request->file('image')->getClientOriginalExtension();
        $request->image->move(public_path('uploads'),$imageName);
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $imageName;
        $user->description = $request->description;
        $user->slug = Str::slug($request->name);
        $user->password = bcrypt($request->password);
        $user->save();
        Session::flash('success','User Create Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email'=>'required|email',
            'image'=>'sometimes|nullable|image|mimes:jpeg,web,png',
            'description'=>'required|max:1000',
            'password'=>'sometimes|nullable|min:8',

        ]);

        $imageName = '';
        if($request->image){
        $imageName= time().'.'.$request->file('image')->getClientOriginalExtension();
        $request->image->move(public_path('uploads'),$imageName);
        }

        
        $user = User::find($id);
        if($imageName){
            $user->image = $imageName;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->description = $request->description;
        $user->slug = Str::slug($request->name);
        $user->password = bcrypt($request->password);
        $user->save();
        Session::flash('success','User Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        Session::flash('success','User Deleted Successfully');
        return redirect()->back();

    }

    public function profile()
    {
        $user=Auth()->user(); 
        return view('admin.user.profile',compact('user'));
    }
}
