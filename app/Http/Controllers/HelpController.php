<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HelpController extends Controller
{
    public function index(){
        $user = Auth::user();
        $data = [];
        $data['partners'] = \App\Company::select('company_id','logo')->get();
        $data['ads'] = \App\Advertisement::select('ad_id','file')->get();
        $data['help'] = \App\Help::all();
        return view('help.help')->with([
                                'nav'=>'help', 
                                'data'=>$data]);
    }
}
