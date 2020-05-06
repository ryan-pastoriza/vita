<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AboutUsController extends Controller
{
    public function index(){
        $user = Auth::user();
        $data = [];
        $data['partners'] = \App\Company::select('company_id','logo')->get();
        $data['ads'] = \App\Advertisement::select('ad_id','file')->get();
        return view('aboutus.aboutus')->with(['nav'=>'aboutus', 'data'=>$data]);
    }
}
