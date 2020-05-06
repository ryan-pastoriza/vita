<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MyAccountController extends Controller
{
    public function index(){
        $data = [];
        $data['partners'] = \App\Company::select('company_id','logo')->get();
        $data['ads'] = \App\Advertisement::select('ad_id','file')->get();
        $data['user'] = \App\Account::find(Auth::user()->account_id);
        $data['personal_info'] = \App\Alumnus::personalInfo(Auth::user()->ssi_id);
        return view('myaccount.myaccount')->with(['nav'=>'myaccount', 'data' => $data]);
    }

    public function fetchAds(){
        $data = [];
        $data['ads'] = DB::table('advertisement');
        
    }

    public function updateUsername(Request $request){
        $request->validate([
            'username' => 'required|unique:accounts',
        ]);
        $user = \App\Account::find(Auth::user()->account_id);
        $user->username = $request->username;
        $user->save();
        return 1;
    }

    public function updatePassword(Request $request){
        $validator = $request->validate([
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
        $user = \App\Account::find(Auth::user()->account_id);
        $user->password = bcrypt($request->password);
        $user->save();
        return 1;
    }

    public function updateContactNo(Request $request){
        $validator = $request->validate([
            'contact_number' => 'required|min:11',
        ]);
        $phone = \App\PhoneNumber::find($request->phone_id);
        $phone->phone_number = $request->contact_number;
        $phone->save();
        return 1;
    }

    public function updateEmail(Request $request){
        $validator = $request->validate([
            'email' => 'required|email',
        ]);
        $email = \App\Email::find($request->email_id);
        $email->email = $request->email;
        $email->save();
        return 1;
    }
}

