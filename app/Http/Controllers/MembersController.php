<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Members;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Members::all();
        return view('lists.member_list')->with('members',$members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $societies = Society::all();
        // return view('forms.member_register')->with('societies', $societies);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $member = new Members;
        
        // $member_count = Members::all()->count();
        // $member_count_id = "M".str_pad(($member_count+1), 4, "0", STR_PAD_LEFT);
        // $member->member_id = $member_count_id;
        // $member->society_id = request('society_id');
        // $member->flat_number = request('flat_number');
        // $member->name = request('username');
        // $member->email = request('email');
        // $member->phone_number = request('phone');
        // $member->login_password = request('password');
        // $member->role = "Member";
        // $member->profile_photo = request()->file('profile_image')->store('public/images/members');
        // $member->save();

        // return view('forms.login');
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
