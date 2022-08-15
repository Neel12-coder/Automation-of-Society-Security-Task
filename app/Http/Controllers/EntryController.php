<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\RegularVisitorLog;
use App\IrregularVisitorLog;
use Carbon\Carbon;
use App\VisitorRegular;

class EntryController extends Controller
{
    public function entry()
    {
        return view('entry_dashboard.entry');

    }

    public function index() {
        $regular_visitor_log = RegularVisitorLog::orderBy('created_at', 'desc')->first();
        $irregular_visitor_log = IrregularVisitorLog::orderBy('created_at', 'desc')->first();
        $interval_regular = Carbon::now()->diffInSeconds($regular_visitor_log->created_at);
        $interval_irregular = Carbon::now()->diffInSeconds($irregular_visitor_log->created_at);
        if($interval_regular < $interval_irregular && $interval_regular <= 10){
            $temperature = round($regular_visitor_log->temperature,1);
            $visitor = VisitorRegular::where('qr_id',$regular_visitor_log->qr_id)->get()[0];
            $visitor_name = $visitor->name;
            $visitor_image = url('/')."/".str_replace('public/images/visitor_regulars','storage/images/visitor_regulars',$visitor->identification_photo);
            $face_identified = 1;

        }elseif($interval_regular > $interval_irregular && $interval_irregular <= 10){
            $temperature = round($irregular_visitor_log->temperature,1);
            $visitor_name = "Unidentifed";
            $visitor_image = asset('assets/images/unknown_avatar.png');
            $face_identified = 0;
        }else {
            $temperature = 0;
            $visitor_name = "No one identified";
            $visitor_image = asset('assets/images/avatar.png');
            $face_identified = 2;

            // $temperature = round($regular_visitor_log->temperature,1);
            // $temperature = 20;
            // $visitor = VisitorRegular::where('qr_id',$regular_visitor_log->qr_id)->get()[0];
            // $visitor_name = $visitor->name;
            // $visitor_image = url('/')."/".str_replace('public/images/visitor_regulars','storage/images/visitor_regulars',$visitor->identification_photo);
            // $face_identified = 1;

            // $temperature = round($irregular_visitor_log->temperature,1);
            // $temperature = 20;
            // $visitor_name = "Unidentifed";
            // $visitor_image = asset('assets/images/unknown_avatar.png');
            // $face_identified = 0;
        }
        
        return response()->json(array('temperature'=> $temperature,"visitor_name" => $visitor_name,"visitor_image" => $visitor_image , "face_identified" => $face_identified), 200);
     }

     public function entryAllowedCreate(){
            return view('entry_dashboard.entry_allowed');
     }

     public function entryAllowed(Request $request){
        if (isset($_POST['allowed'])) {
            $regular_visitor_log = RegularVisitorLog::orderBy('created_at', 'desc')->first();
            $regular_visitor_log->entry_allowed = 1;
            $regular_visitor_log->save();
            return view('entry_dashboard.entry');
        }
        elseif (isset($_POST['not_allowed'])) {
            return view('entry_dashboard.entry');
        }

     }
}
