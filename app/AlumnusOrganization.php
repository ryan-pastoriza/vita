<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumnusOrganization extends Model
{
    protected $primaryKey = 'org_id';

    public static function alumnusOrganizations($ssi_id){
        $org = self::where('ssi_id', $ssi_id)->get();
        foreach($org as $key => $value){
            if(empty($value->date_left)){
                $value->date_left = "Today";
            }
            $org[$key]->years_span = yearInterval($value->date_joined, $value->date_left);
            $org[$key]->years = formatDate('Y', $value->date_joined) . " - " . formatDate('Y', $value->date_left);
        }

        return $org;
    }
}
