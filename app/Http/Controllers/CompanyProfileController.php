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
                'nav'       =>  'profile',
                'subnav'    =>  'business_information',
                'data'      =>  $data
            ]);
    }

    public function businessInformationUpdate(){
        $user = Auth::user();
        $data = [];
        $data['partners'] = \App\Company::select('company_id','logo')->get();
        $data['ads'] = \App\Advertisement::select('ad_id','file')->get();
        $data['company_info'] = \App\Company::find(Auth::user()->company_id);
        $data['jobs_posted'] = \App\JobPost::where('company_id', Auth::user()->company_id)->get();

        return view('company.profile_update')
            ->with([
                'nav'       =>  'profile',
                'subnav'    =>  'business_information',
                'data'      =>  $data
            ]);
    }

    public function store(Request $request){
        $company = \App\Company::find($request->company_id);
        $company->business_information = $request->business_info;
        $company->save();
        return redirect(route('company.profile'));
    }


    public function address(){
        $user = Auth::user();
        $data = [];
        $data['partners'] = \App\Company::select('company_id','logo')->get();
        $data['ads'] = \App\Advertisement::select('ad_id','file')->get();
        $data['company_info'] = \App\Company::find(Auth::user()->company_id);
        $data['jobs_posted'] = \App\JobPost::where('company_id', Auth::user()->company_id)->get();

        return view('company.address')
            ->with([
                'nav'       =>  'profile',
                'subnav'    =>  'address',
                'data'      =>  $data
            ]);
    }

    public function contacts(){
        $user = Auth::user();
        $data = [];
        $data['partners'] = \App\Company::select('company_id','logo')->get();
        $data['ads'] = \App\Advertisement::select('ad_id','file')->get();
        $data['company_info'] = \App\Company::find(Auth::user()->company_id);
        $data['jobs_posted'] = \App\JobPost::where('company_id', Auth::user()->company_id)->get();

        return view('company.contacts')
            ->with([
                'nav'       =>  'profile',
                'subnav'    =>  'contacts',
                'data'      =>  $data
            ]);
    }

}
