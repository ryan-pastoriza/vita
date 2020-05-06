<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumnusAward extends Model
{
    protected $primaryKey="ar_id";

    public static function alumnusAwards($ssi_id){
        $awards = self::where('ssi_Id', $ssi_id)->get();

        foreach($awards as $key => $value){
            $awards[$key]->f_date_received = formatDate('F d, Y', $value->date_received);
        }

        return $awards;

    }
}
