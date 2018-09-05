<?php

namespace App\Http\Controllers;

use App\Manager;
use App\Society;
use App\SocietyNotifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SocietyNotificationsController extends Controller
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
        $notifications = SocietyNotifications::all()->where('society_id', $society_id);
        return view('manager.notifications.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $uid =  Auth::user()->id;
        $society_id = Manager::where('user_id', $uid)->pluck('society_id')->first();

        $notification = new SocietyNotifications();
        $notification->society_id = $society_id;
        $notification->title = $request->get('title');
        $notification->description = $request->get('description');
        $notification->save();
        Session::flash('added_notification', 'The Notification has been created');

        return redirect('/manager/notifications');
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
