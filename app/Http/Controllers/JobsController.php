<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class JobsController extends Controller
{
    public function index(){
        $data['personal_info'] = \App\Alumnus::personalInfo(Auth::user()->ssi_id);
        $data['partners'] = \App\Company::select('company_id','logo')->get();
        $data['ads'] = \App\Advertisement::select('ad_id','file')->get();
        $data['jobs'] = \App\JobPost::allJobs();
        $data['skills'] = \App\AlumnusSkill::alumnusSkills(Auth::user()->ssi_id);
        // dd($data);
        foreach ($data['jobs'] as $key => $value) {
            $data['jobs'][$key]->date_posted = \Carbon\Carbon::createFromTimeStamp(strtotime($value->created_at))->diffForHumans();
        }
        return view('jobs.jobs')->with(['nav'=>'jobs', 'data'=>$data]);
    }
}
