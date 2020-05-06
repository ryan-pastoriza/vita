<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $primaryKey = 'company_id';

    public static function companyInfoHeader($id){
        $company = self::find($id);
        $company->post_count = DB::table('job_posts')
                                ->where('company_id', $id)
                                ->get()->count();
        return $company;
    }
}
