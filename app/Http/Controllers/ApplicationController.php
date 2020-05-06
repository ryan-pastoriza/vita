<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ApplicationController extends Controller
{
    public function index(){
        $data = [];
        $data['partners'] = \App\Company::select('company_id','logo')->get();
        $data['ads'] = \App\Advertisement::select('ad_id','file')->get();
        $data['applications'] = (new \App\JobApplicant)->applications(Auth::user()->ssi_id);
        return view('application.application')->with(['nav'=>'application', 'data'=>$data]);
    }
}
