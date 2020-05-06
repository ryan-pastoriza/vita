<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TorController extends Controller
{
    public function index(){
        $data = [];
        $data['partners'] = \App\Company::select('company_id','logo')->get();
        $data['ads'] = \App\Advertisement::select('ad_id','file')->get();
        return view('tor.tor')->with(['nav'=>'tor', 'data'=>$data]);
    }
}
