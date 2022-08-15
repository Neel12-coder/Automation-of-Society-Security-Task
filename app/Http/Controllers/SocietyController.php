<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Society;

class SocietyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.society_register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $society = new Society;
        
        $society_count = Society::all()->count();
        $society_id = "S".str_pad(($society_count+1), 4, "0", STR_PAD_LEFT);
        $society->society_id = $society_id;
        $society->society_name = request('name');
        $society->society_address = request('address');
        $society->society_registeration_number = request('registeration_number');
        $society->society_registeration_date = request('registeration_date');
        $society->number_of_buildings = request('bldg_no');
        $society->number_of_flats = request('flat_nos');
    
        $society->save();

        $societies = Society::all();
        return view('forms.member_register')->with('societies', $societies);
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
