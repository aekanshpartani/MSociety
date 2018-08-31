<?php

namespace App\Http\Controllers;

use App\Manager;
use App\Security;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ManagerSecurityController extends Controller
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
        $securities = Security::all()->where('society_id', $society_id);
        return view('manager.security.index', compact('securities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.security.create');
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
        $user->role_id = 2;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->is_active = $request->get('is_active');
        $user->save();

        $uid =  Auth::user()->id;
        $society_id = Manager::where('user_id', $uid)->pluck('society_id')->first();

        $security = new Security();
        $security->user_id = $user->id;
        $security->society_id = $society_id;
        $security->phone_no = $request->get('phone_no');
        $security->save();
        Session::flash('created_security', 'The Security has been created');


        return redirect('/manager/security');
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
        $user = User::where('role_id', 2)->findOrFail($id);
        $security = Security::where('user_id', $id)->first();
        return view('manager.security.edit', compact('user', 'security'));
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
        $user = User::findOrFail($id);
        $phone = $request->phone_no;
        $security = Security::where('user_id', $id)->update(['phone_no' => $phone]);

        if(trim($request->password) == ''){
            $input = $request->except('password');
        }
        else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        $user->update($input);
        Session::flash('edited_security', 'The Security details has been updated');
        return redirect('/manager/security');
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
