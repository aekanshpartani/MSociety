<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\Society;
use App\User;
use App\Owner;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','id')->all();
        $society_list = Society::where('is_approved', 1)->pluck('sname', 'id');
        return view('admin.users.create', compact('roles', 'society_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $user = new User();
        if($file = $request->file('photo_id')){
            $name = time(). $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $user->photo_id = $photo->id;
        }
        $user->password = bcrypt($request->get('password'));
        $user->role_id = $request->get('role_id');
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->save();

        if($user->role_id == 3){
            $owner = new Owner();
            $owner->user_id = $user->id;
            $owner->society_id = $request->get('society_id');
            $owner->flat_no = strtoupper($request->get('flat_no'));
            $owner->phone_no = $request->get('phone_no');
            $owner->save();
            Session::flash('created_user', 'The Owner User has been created');
        }

        return redirect('/admin/users');


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
        $roles = Role::pluck('name', 'id');
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        $user = User::findOrFail($id);
        if(trim($request->password) == ''){
            $input = $request->except('password');
        }
        else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] =$photo->id;
        }
        $user->update($input);
        Session::flash('edited_user', 'The user details has been updated');
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        //unlink(public_path() . $user->photo->file);
        $user->delete();
        Session::flash('deleted_user', 'The user has been deleted');
        return redirect('/admin/users');
    }
}
