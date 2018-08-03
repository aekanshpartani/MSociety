<?php

namespace App\Http\Controllers;

use App\Http\Requests\OwnerCreateRequest;
use App\Owner;
use App\Society;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('owner.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OwnerCreateRequest $request)
    {
        $user = new User();
        $user->role_id = 3;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->save();
        $owner = new Owner();
        $owner->user_id = $user->id;
        $owner->society_id = $request->get('society_id');
        $owner->flat_no = strtoupper($request->get('flat_no'));
        $owner->phone_no = $request->get('phone_no');
        $owner->save();
        Session::flash('created_owner', 'Your details have been registered. Wait for manager approval!');
        return redirect('/sign-up');

//        $validated = $request->validated();
//        return $validated;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        $society_list = Society::where('is_approved', 1)->pluck('sname', 'id');
        return view('sign-up', compact('society_list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        //
    }
}
