<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Alumnus;

class InboxController extends Controller
{
    public function index(){
        $data = [];
        $data['personal_info'] = Alumnus::personalInfo(Auth::user()->ssi_id);
        $data['batch'] = Alumnus::batchCount($data['personal_info']->sch_year);
        $data['partners'] = \App\Company::select('company_id','logo')->get();
        $data['ads'] = \App\Advertisement::select('ad_id','file')->get();
        $data['inbox'] = \App\MessageTemplate::inboxAlumnus(Auth::user()->ssi_id);
        foreach ($data['inbox'] as $key => $value) {
            $data['inbox'][$key]->checked = false;
            $data['inbox'][$key]->mail_date = formatDate('F d, Y h:i A', $value->created_at);
            $data['inbox'][$key]->replies = $this->fetchReplies($value);
        }
        return view('inbox.inbox')->with(['nav'=>'inbox', 'data'=>$data]);
    }

    public function deleteMessages(Request $request){
        $messages = $request->data;
        foreach ($messages as $key => $value) {
            $message = \App\MessageTemplate::find($value);
            $message->delete();
        }
        return 1;
    }

    public function fetchInbox(){
        $inbox = \App\MessageTemplate::inboxAlumnus(Auth::user()->ssi_id);
        foreach ($inbox as $key => $value) {
            $inbox[$key]->checked = false;
            $inbox[$key]->mail_date = formatDate('F d, Y h:i A', $value->created_at);
            $inbox[$key]->replies = $this->fetchReplies($value);
        }
        return $inbox;
    }

    public function fetchReplies($message){
        $result['replies'] = \App\MessageTemplate::fetchReplies($message->template_id);
        if($message){
            if($message->company_from){
                $result['company'] = \App\Company::find($message->company_from);
            }elseif($message->company_to){
                $result['company'] = \App\Company::find($message->company_to);
            }
        }
        foreach ($result['replies'] as $key => $value) {
            $result['replies'][$key]->reply_date = formatDate('F d, Y', $value->created_at);
            $result['replies'][$key]->reply_time = formatDate('h:i A', $value->created_at);
        }
        return $result;
    }

    public function saveReply(Request $request){
        $reply = new \App\MessageReply;
        $reply->reply = $request->reply;
        $reply->message_id = $request->message_id;
        $reply->student_from = $request->sender;
        $reply->company_to = $request->company_id;
        $reply->save();
        return $reply->reply_id;
    }

    public function readMessage(Request $request){
        $message = \App\MessageTemplate::find($request->id);
        $message->unread = 0;
        $message->save();
        return $message->template_id;
    }
}
