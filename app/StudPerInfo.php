<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class StudPerInfo extends Model
{
    protected $table = "stud_per_info";
    protected $primaryKey = "spi_id";

    public function studInfo($ssi_id){
        return DB::table('stud_sch_info')
            ->join('stud_per_info', 'stud_per_info.spi_id', 'stud_sch_info.spi_id')
            ->where('stud_sch_info.ssi_id', $ssi_id)->first();
    }
}
