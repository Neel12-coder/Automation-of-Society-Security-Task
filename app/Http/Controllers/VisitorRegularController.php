<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\VisitorRegular;

class VisitorRegularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors_regular = VisitorRegular::all();
        return view('lists.visitor_list')->with('visitors_regular',$visitors_regular);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.visitor_register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $visitor_regular = new VisitorRegular;
        
        $visitors_regular_count = VisitorRegular::all()->count();
        $visitors_regular_count_id = "V".str_pad(($visitors_regular_count+1), 4, "0", STR_PAD_LEFT);
        $visitor_regular->visitor_regular_id = $visitors_regular_count_id;
        $qr_id = request('phone_number').request('email').request('vistorName');
        $visitor_regular->qr_id = $qr_id;
        $visitor_regular->registered_by = Auth::user()->member_id;
        $visitor_regular->reason_for_visit = request('purposeOfVisit');
        $visitor_regular->name = request('visitorName');
        $visitor_regular->email = request('email');
        $visitor_regular->phone_number = request('phone_number');
        $visitor_regular->identification_photo = request()->file('profile_image')->store('public/images/visitor_regulars');

        // Get the file from the request
        $file = request()->file('profile_image');

        // // Get the contents of the file
        // $contents = $file->openFile()->fread($file->getSize());
        $visitor_regular->blob_image = "This is blob image";
        $visitor_regular->added_to_collection = 0;
        $visitor_regular->save();

        $role = Auth::user()->role; 
        switch ($role) {
          case 'Member':
            return view('dashboard.member_dashboard');
            break;
          case 'Admin':
            return view('dashboard.society_admin_dashboard');
            break; 
          case 'Watchman':
            return view('entry_dashboard.entry');
            break;
          default:
            return view('index'); 
          break;
        };

        // return view('dashboard.member_dashboard');
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
