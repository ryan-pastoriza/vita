<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class JobApplicant extends Model
{
    public function applications($alumnus) {
        $applications = DB::table('job_applicants')
            ->join('job_posts', 'job_posts.jpost_id', 'job_applicants.post_id')
            ->join('companies', 'companies.company_id', 'job_posts.company_id')
            ->select('job_applicants.*', 'job_posts.*', 'companies.*', 'job_posts.created_at as posted_at', 'job_applicants.created_at as applied_at')
            ->get();

        foreach ($applications as $key => $value) {
            $applications[$key]->posted = formatDate("F d, Y", $value->posted_at);
            $applications[$key]->applied = formatDate("F d, Y h:m A", $value->applied_at);
        }
        return $applications;
    }
}
