<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Owner;
use App\Security;
use App\Society;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SecurityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid = Auth::user()->id;
        $guard = Security::where('user_id', $uid)->pluck('society_id')->first();
////        //$guests = Owner::with('guest')->where('society_id',$guard)->get();
//////        $guests = $guests->toArray();
//////        return $guests;
//////        foreach ($guests as $guest){
//////            return $guest['guest'][0]['name'];
//////        }
////        //return $guests[0]['guest'][0];
////
////        $guests = Guest::get()->all();
////
////
////        return $guests->name;
////
////        return view('security.index', compact('guests'));
//
//        //$guests = Guest::whereHas('')
//        $guests = Guest::with('owner')->where('society_id',$guard)->pluck('name');
//        //return gettype($guard);
        $guests = Guest::all()->where('society_id', $guard);
//        return $guests;
        return view('security.index', compact('guests'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flats_list = Owner::whereHas('user', function($query) {

            $uid = Auth::user()->id;
            $guard = Security::where('user_id', $uid)->pluck('society_id');
            $query->where('society_id', $guard);
        })->pluck('flat_no','flat_no');
        return view('security.create', compact('flats_list'));
//        $demo = Owner::whereHas('user', function($query) {
//            $query->where('society_id', 1);
//        })->get();
//        return $demo;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $uid = Auth::user()->id;
        $owner_id = Owner::where('flat_no',$request->get('flat_no'))->pluck('id')->first();
        $society_id = Owner::where('flat_no',$request->get('flat_no'))->pluck('society_id')->first();
        if($owner_id > 0){
            $guest = new Guest();
            $guest->name = $request->get('name');
            $guest->owner_id = $owner_id;
            $guest->society_id = $society_id;
            $guest->phone_no = $request->get('phone_no');
            $guest->reason = $request->get('reason');
            $guest->save();
            Session::flash('created_guests', 'The Guest has been added,  waiting for Approval');
            return redirect('/security');
        }
        Session::flash('no_owner', 'The Owner does not exist try again');
        return redirect('/security');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function show(Security $security)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function edit(Security $security)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Security $security)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function destroy(Security $security)
    {
        //
    }
}
