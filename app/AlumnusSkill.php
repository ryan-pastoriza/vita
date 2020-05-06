<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class AlumnusSkill extends Model
{
    protected $primaryKey = 'ar_id';

    public static function alumnusSkills($ssi_id){
        return DB::table('alumnus_skills')->join('skills', 'skills.skill_id', 'alumnus_skills.skill_id')
                    ->where('alumnus_skills.ssi_id', $ssi_id)->get();
    }
}
