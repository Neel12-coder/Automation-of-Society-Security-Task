<?php


use Intervention\Image\Facades\Image;
namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Members;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo() {
        $role = Auth::user()->role; 
        switch ($role) {
          case 'Member':
            return '/dashboard/member';
            break;
          case 'Admin':
            return '/dashboard/society-admin';
            break; 
          case 'Watchman':
            return '/entry-dashboard/entry';
            break; 
      
          default:
            return '/home'; 
          break;
        }
      }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $request = app('request');
        // echo ($request);
        // echo "<pre>";
        // print_r ($data);
        // echo "</pre>";
        $member = new Members;
        
        $member_count = Members::all()->count();
        $member_count_id = "M".str_pad(($member_count+1), 4, "0", STR_PAD_LEFT);
        $member->member_id = $member_count_id;
        $member->society_id = $data['society_id'];
        $member->flat_number = $data['flat_number'];
        $member->name = $data['name'];
        $member->email = $data['email'];
        $member->phone_number = $data['phone'];
        $member->login_password =  Hash::make($data['password']);
        $member->role = $data['role'];

        $profile_image = $request->file('profile_image');
        $filename = time() . '.' . $profile_image->getClientOriginalExtension();
        $profile_image->store('public/images/members');
        // Image::make($profile_image)->resize(300, 300)->save( public_path('/public/images/members/' . $filename) );

        $member->profile_photo = $filename;
    
        $member->save();

        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'member_id' => $member_count_id,
            'society_id' => $data['society_id'],
            'flat_number' => $data['flat_number'],
            'phone_number' => $data['phone'],
            'role' => $data['role'],
            'profile_photo' => $filename,
            
        ]);
    }
}
