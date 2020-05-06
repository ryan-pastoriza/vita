<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $data = [];
        $data['personal_info'] = \App\Alumnus::personalInfo($user->ssi_id);
        $data['partners'] = \App\Company::select('company_id','logo')->get();
        $data['ads'] = \App\Advertisement::select('ad_id','file')->get();
        return view('dashboard.dashboard')->with(['nav'=>'dashboard', 'data'=>$data]);
    }

    public function ajxcompanyinfo(Request $request){
        $company = Session::get('company');
        return \App\Company::companyInfoHeader($company);
    }

    public function ajxfetchfeed(Request $request){
        return \App\Post::allPost();
    }


    public function ajxsinglefeed(Request $request){
        $feed = \App\Post::find($request->id);
        if($feed){
            $feed->company = \App\Company::find($feed->company_id);
            $feed->carbon = $feed->created_at->diffForHumans();
            $feed->replies = $this->fetchReplies($request->id);
        }
        return $feed;
    }

    public function fetchReplies($id){
        $replies = \App\Reply::postReplies($id);
        foreach($replies as $key=>$value){
            $replies[$key]->reply_date = Carbon::parse($value->created_at)->diffForHumans();
        }
        return $replies;
    }

    public function ajxPostReply(Request $request){
        $reply = new \App\Reply;
        $reply->content = $request->reply;
        $reply->comment_id = $request->id;
        $reply->ssi_id = Auth::user()->ssi_id;
        $reply->save();
        return $this->fetchReplies($request->id);
    }
}
