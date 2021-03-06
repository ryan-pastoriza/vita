<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class JobPost extends Model
{
    protected $primaryKey = 'jpost_id';

    public static function allJobs(){
        return self::leftJoin('companies', 'companies.company_id', 'job_posts.company_id')
            ->get();
    }
}
