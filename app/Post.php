<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Post extends Model
{
    protected $primaryKey = 'post_id';

    public static function postIdByCompany($id){
        return DB::table('posts')
            ->where('company_id', $id)
            ->orderBy('created_at', 'desc')
            ->select('post_id','post_type')
            ->get();
    }

    public static function allPost(){
        return DB::table('posts')
            ->orderBy('created_at', 'desc')
            ->select('post_id','post_type')
            ->get();
    }
}
