<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $primaryKey = 'training_id';

    public static function alumnusTrainings($ssi_id){
        $trainings = self::where('ssi_id', $ssi_id)->get();
        foreach($trainings as $key => $value){
            $trainings[$key]->event_date = formatDate('F d, Y', $value->date_held);
        }
        return $trainings;
    }
}
