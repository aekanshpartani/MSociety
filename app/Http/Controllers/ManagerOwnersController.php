<?php

namespace App\Http\Controllers;

use App\Manager;
use App\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ManagerOwnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid =  Auth::user()->id;
        $society_id = Manager::where('user_id', $uid)->pluck('society_id')->first();
        $owners = Owner::all()->where('society_id', $society_id);
        return view('manager.owners.index', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.owners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->password = bcrypt($request->get('password'));
        $user->role_id = 3;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->save();

        $uid =  Auth::user()->id;
        $society_id = Manager::where('user_id', $uid)->pluck('society_id')->first();

        $owner = new Owner();
        $owner->user_id = $user->id;
        $owner->society_id = $society_id;
        $owner->flat_no = strtoupper($request->get('flat_no'));
        $owner->phone_no = $request->get('phone_no');
        $owner->save();
        Session::flash('created_owner', 'The Owner has been created');


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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
