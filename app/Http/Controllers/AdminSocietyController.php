<?php

namespace App\Http\Controllers;

use App\Mail\SocietyRegister;
use App\Society;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AdminSocietyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $societies = Society::all();
        return view('admin.society.index', compact('societies'));
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
    public function store(Request $request)
    {
        Society::create($request->all());
        Session::flash('registerd_society', 'Your details has been received. Wait for Approval');
        $note = new SocietyRegister();
        Mail::to($request->smanager)->send($note);
        return redirect('society-register');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function show(Society $society)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $society = Society::findOrFail($id);

        return view('admin.society.edit', compact('society'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $society = Society::findOrFail($id);
        $society->update($request->all());
        Session::flash('edited_society', 'The '. $society->sname .' details has been updated');
        return redirect('/admin/society');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $society = Society::findOrFail($id);
        $society->delete();
        Session::flash('deleted_society', 'The '. $society->sname .' has been deleted');
        return redirect('/admin/society');
    }
}
