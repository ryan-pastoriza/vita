<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CompanyProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        $data = [];
        $data['partners'] = \App\Company::select('company_id','logo')->get();
        $data['ads'] = \App\Advertisement::select('ad_id','file')->get();
        $data['company_info'] = \App\Company::find(Auth::user()->company_id);
        $data['jobs_posted'] = \App\JobPost::where('company_id', Auth::user()->company_id)->get();

        return view('company.profile')
            ->with([
                'nav'   =>  'profile',
                'data'  =>  $data
            ]);
    }

}
