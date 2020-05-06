<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Reply extends Model
{
    protected $primaryKey = 'reply_id';

    public static function postReplies($id){
        return DB::table('replies')
                ->join('sis_main_db.stud_sch_info', 'sis_main_db.stud_sch_info.ssi_id', 'replies.ssi_id')
                ->join('sis_main_db.stud_per_info', 'sis_main_db.stud_per_info.spi_id', 'sis_main_db.stud_sch_info.spi_id')
                ->join('sis_main_db.stud_prog_taken', 'sis_main_db.stud_sch_info.ssi_id', 'sis_main_db.stud_prog_taken.ssi_id')
                ->join('sis_main_db.program_list', 'sis_main_db.program_list.pl_id', 'sis_main_db.stud_prog_taken.pl_id')
                ->select('sis_main_db.stud_per_info.fname','sis_main_db.stud_per_info.mname','sis_main_db.stud_per_info.lname',
                    'sis_main_db.program_list.prog_name', 'replies.*')
                ->where('replies.comment_id', $id)
                ->orderBy('replies.created_at', 'desc')
                ->get();
    }
}
