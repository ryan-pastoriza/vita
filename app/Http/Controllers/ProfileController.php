<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumnus;
use Auth;
use DB;

class ProfileController extends Controller
{
    public function index(){
        $data = [];
        $data['personal_info'] = Alumnus::personalInfo(Auth::user()->ssi_id);
        $data['partners'] = \App\Company::select('company_id','logo')->get();
        $data['ads'] = \App\Advertisement::select('ad_id','file')->get();
        $data['family'] = Alumnus::family($data['personal_info']->spi_id);
        $data['eligibilities'] = \App\Eligibility::where('spi_id', Auth::user()->ssi_id)->get();
        $data['trainings'] = \App\Training::alumnusTrainings(Auth::user()->ssi_id);
        $data['organizations'] = \App\AlumnusOrganization::alumnusOrganizations(Auth::user()->ssi_id);
        $data['awards'] = \App\AlumnusAward::alumnusAwards(Auth::user()->ssi_id);
        $data['skills'] = \App\AlumnusSkill::alumnusSkills(Auth::user()->ssi_id);
        $data['countries'] = DB::table('country')->orderBy('country_name','ASC')->get();
        $data['provinces'] = DB::table('prov')->orderBy('province_name','ASC')->get();
        $data['cities'] = DB::table('city')->orderBy('city_name','ASC')->get();
        // $data['brgy'] = DB::table('brgy')->orderBy('brgy_name','ASC')->get();
        
        // dd($data);
        return view('profile.profile')->with(['nav'=>'profile', 'data' => $data]);
    }

    public function province(Request $request){
        return DB::table('prov')->orderBy('province_name','ASC')->get();
    }

    public function provcity(Request $request){
        return DB::table('city')->where('city.province_id', $request->id)->orderBy('city_name','ASC')->get();
    }

    public function citybrgy(Request $request){
        return DB::table('brgy')->where('brgy.city_id', $request->id)->orderBy('brgy_name','ASC')->get();
    }

    public function setage(Request $request){
        return age($request->birthdate);
    }

    public function recentAlumnus(){
        $alumnus = new \App\Alumnus;
        return $alumnus->batch('2018-2019');
    }

    public function getedu(Request $request){
        return \App\Alumnus::educationalAttainment($request->spi_id);
    }

    public function savePersonalInfo(Request $request){
        $studInfo = \App\StudPerInfo::find($request->spi_id);
        $studInfo->birthdate = $request->birthdate;
        $studInfo->birthplace = $request->birthplace;
        $studInfo->gender = $request->gender;
        $studInfo->civ_status = $request->civ_status;
        $studInfo->religion = $request->religion;
        $studInfo->save();

        $email = \App\Email::find($request->email_id);
        $email->email = $request->email;
        $email->save();

        $phone = \App\PhoneNumber::find($request->phone_id);
        $phone->phone_number = $request->phone_number;
        $phone->save();

        return 1;
    }

    public function saveFamilyInfo(Request $request){
       
        return $request->all();
        return 1;
    }

    public function geteligibilities(Request $request){
        $eligibilities = \App\Eligibility::where('spi_id', $request->id)->get();
        foreach ($eligibilities as $key => $value) {
            $eligibilities[$key]->certificates = \App\EligCertificate::where('eligibility_id', $value->eligibility_id)->get();
        }
        return $eligibilities;
    }

    public function saveeligibility(Request $request){      
        $eligibility = new \App\Eligibility;
        $eligibility->spi_id = $request->eligibility['spi_id'];
        $eligibility->type = $request->eligibility['type'];
        $eligibility->rating = $request->eligibility['rating'];
        $eligibility->save();

        if(sizeof($request->eligibility['certs']) > 0){
            foreach ($request->eligibility['certs'] as $key => $value) {
                $full_path = uploadCert($value, 'images/certificates/', $request->eligibility['type']);
                $cert = new \App\EligCertificate;
                $cert->eligibility_id = $eligibility->eligibility_id;
                $cert->file = $full_path;
                $cert->save();
            }
        }

        // if(sizeof($request->certs) > 0){
        //     $data = $request->certs[0];
        //    return uploadCert($data, 'images/certificates/', 'certificate');
        // }
    }

    public function getworkexperience(Request $request){
        return \App\WorkExperience::where('spi_id', $request->id)->get();
    }

    public function saveworkexperience(Request $request){
        if(isset($request->work_exp_id)){
            $workexp = \App\WorkExperience::find($request->work_exp_id);
        }else {
            $workexp = new \App\WorkExperience;
        }
        $workexp->spi_id = $request->spi_id;
        $workexp->year_duration = $request->year_duration;
        $workexp->company = $request->company;
        $workexp->company_address = $request->company_address;
        $workexp->position = $request->position;
        $workexp->save();
        return $workexp->work_exp_id;
    }

    public function getservices(Request $request){
        return \App\Service::where('spi_id', $request->id)->get();
    }

    public function saveservice(Request $request){
        if(isset($request->service_id)){
            $service = \App\Service::find($request->service_id);
        }else {
            $service = new \App\Service;
        }
        
        $service->spi_id = $request->spi_id;
        $service->year_duration = $request->year_duration;
        $service->event = $request->event;
        $service->service = $request->service;
        $service->details = $request->details;
        $service->save();
        return $service->service_id;
    }

}
