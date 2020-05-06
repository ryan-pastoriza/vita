<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class MessageTemplate extends Model
{
    protected $primaryKey = 'template_id';

    public static function inboxAlumnus($stud) {
        return self::leftJoin('companies', 'companies.company_id', 'company_from')
        ->where('alumnus_to', $stud)->get();
    }

    public static function fetchReplies($message_id){
        return DB::table('message_replies')
            ->where('message_replies.message_id', $message_id)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
