<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Http\Requests\GuestsCreateRequest;
use App\Owner;
use App\Society;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminGuestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guests = Guest::all();
        return view('admin.guests.index', compact('guests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $flats_list = DB::table('users')
//            ->join('owners', 'users.id', '=', 'owners.user_id')
//            ->select('owners.flat_no', 'owners.flat_no')->where('is_active', 1)
//            ->get();
        $flats_list = Owner::whereHas('user', function($query) {
            $query->where('is_active',1);
        })->pluck('flat_no','flat_no');
        //$flats_list = Owner::with('user')->where('society_id', 1)->pluck('flat_no', 'flat_no');
        //$flats_list = Owner::with('user')->get();
        //return $flats_list;
        return view('admin.guests.create', compact('flats_list'));
        //$flats_list = Owner::with('users')->pluck('flat_no', 'flat_no');

//        $data = DB::table('users')
//            ->join('owners', 'users.id', '=', 'owners.user_id')
//            ->select('users.*', 'owners.flat_no')->where('is_active', 1 && 'society_id', 1)
//            ->get();
//        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $owner_id = Owner::where('flat_no',$request->get('flat_no'))->pluck('id')->first();
        if($owner_id > 0){
            $guest = new Guest();
            $guest->name = $request->get('name');
            $guest->owner_id = $owner_id;
            $guest->phone_no = $request->get('phone_no');
            $guest->reason = $request->get('reason');
            $guest->save();
            Session::flash('created_guests', 'The Guest has been added,  waiting for Approval');
            return redirect('/admin/guests');
        }
        Session::flash('no_owner', 'The Owner does not exist try again');
        return redirect('/admin/guests');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        //
    }
}
