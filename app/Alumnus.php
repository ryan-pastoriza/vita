<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Alumnus extends Model
{

    public function batch($batch){
        $grad = DB::table('stud_sch_info')
                ->join('stud_per_info', 'stud_sch_info.spi_id', 'stud_per_info.spi_id')
                ->join('stud_prog_taken', 'stud_sch_info.ssi_id', 'stud_prog_taken.ssi_id')
                ->join('stud_stat_list', 'stud_prog_taken.stat_id', 'stud_stat_list.stat_id')
                ->leftJoin('citizenship', 'citizenship.cit_id', 'stud_per_info.cit_id')
                ->leftJoin('student_phone', 'student_phone.spi_id', 'stud_per_info.spi_id')
                ->leftJoin('phone_numbers', 'phone_numbers.phone_id', 'student_phone.phone_id')
                ->leftJoin('email_student', 'email_student.spi_id', 'stud_per_info.spi_id')
                ->leftJoin('emails', 'emails.email_id', 'email_student.email_id')
                ->join('program_list', 'program_list.pl_id', 'stud_prog_taken.pl_id')
                ->where('stud_stat_list.stat_name', 'graduate')
                ->where('stud_prog_taken.sch_year', $batch)
                ->get();

                foreach($grad as $index=>$value){
                    $grad[$index]->fullname = $value->fname . " " . $value->mname[0] . ". " . $value->lname;
                }
                  
        return $grad;
    }

    public static function batchCount($batch){
        $grad = DB::table('stud_sch_info')
                ->join('stud_per_info', 'stud_sch_info.spi_id', 'stud_per_info.spi_id')
                ->join('stud_prog_taken', 'stud_sch_info.ssi_id', 'stud_prog_taken.ssi_id')
                ->join('stud_stat_list', 'stud_prog_taken.stat_id', 'stud_stat_list.stat_id')
                ->leftJoin('citizenship', 'citizenship.cit_id', 'stud_per_info.cit_id')
                ->leftJoin('student_phone', 'student_phone.spi_id', 'stud_per_info.spi_id')
                ->leftJoin('phone_numbers', 'phone_numbers.phone_id', 'student_phone.phone_id')
                ->leftJoin('email_student', 'email_student.spi_id', 'stud_per_info.spi_id')
                ->leftJoin('emails', 'emails.email_id', 'email_student.email_id')
                ->join('program_list', 'program_list.pl_id', 'stud_prog_taken.pl_id')
                ->where('stud_stat_list.stat_name', 'graduate')
                ->where('stud_prog_taken.sch_year', $batch)
                ->count();

        return $grad;
    }
    
    public static function personalInfo($ssi_id){
        $info = DB::table('stud_sch_info')
                ->join('stud_per_info', 'stud_sch_info.spi_id', 'stud_per_info.spi_id')
                ->join('stud_prog_taken', 'stud_sch_info.ssi_id', 'stud_prog_taken.ssi_id')
                ->join('stud_stat_list', 'stud_prog_taken.stat_id', 'stud_stat_list.stat_id')
                ->leftJoin('citizenship', 'citizenship.cit_id', 'stud_per_info.cit_id')
                ->leftJoin('student_phone', 'student_phone.spi_id', 'stud_per_info.spi_id')
                ->leftJoin('phone_numbers', 'phone_numbers.phone_id', 'student_phone.phone_id')
                ->leftJoin('email_student', 'email_student.spi_id', 'stud_per_info.spi_id')
                ->leftJoin('emails', 'emails.email_id', 'email_student.email_id')
                ->join('program_list', 'program_list.pl_id', 'stud_prog_taken.pl_id')
                ->where('stud_stat_list.stat_name', 'graduate')
                ->where('stud_sch_info.ssi_id', $ssi_id)
                ->first();
        
        $info->bday = date('F d, Y', strtotime($info->birthdate));
        $info->address['present'] = self::address($ssi_id, 'presentAddress');
        $info->address['permanent'] = self::address($ssi_id, 'permanentAddress');
        $info->age = age($info->birthdate);
        // $info->firstname = self::getFirstname($ssi_id);

        return $info;
    }

    public static function address($id, $type){
        $address = DB::table('address')
                ->join('s_main_address', 's_main_address.add_id', 'address.add_id')
                ->join('city', 'city.city_id', 'address.city_id')
                ->join('brgy', 'brgy.brgy_id', 'address.brgy_id')
                ->join('prov', 'prov.province_id', 'address.province_id')
                ->join('country', 'country.country_id', 'address.country_id')
                ->join('regions', 'regions.reg_id', 'address.reg_id')
                ->join('stud_per_info', 's_main_address.spi_id', 'stud_per_info.spi_id')
                ->select('city.city_name','brgy.brgy_name','country.country_name',
                        'regions.country_id','address.street', 'city.city_id', 'brgy.brgy_id', 'prov.province_id',
                        'address.block_no', 'address.lot_no', 'city.zipcode')
                ->where('stud_per_info.spi_id', '367')
                ->where('s_main_address.address_type', $type)
                ->first();
                
        return $address;
    }

    public static function addressById($id){
        $address = DB::table('address')
                ->leftJoin('s_main_address', 's_main_address.add_id', 'address.add_id')
                ->leftJoin('city', 'city.city_id', 'address.city_id')
                ->leftJoin('brgy', 'brgy.brgy_id', 'address.brgy_id')
                ->leftJoin('prov', 'prov.province_id', 'address.province_id')
                ->leftJoin('country', 'country.country_id', 'address.country_id')
                ->leftJoin('regions', 'regions.reg_id', 'address.reg_id')
                ->leftJoin('stud_per_info', 's_main_address.spi_id', 'stud_per_info.spi_id')
                ->select('city.city_name','brgy.brgy_name','country.country_name',
                        'regions.country_id','address.street','city.city_id', 'brgy.brgy_id', 'prov.province_id',
                        'address.block_no', 'address.lot_no', 'city.zipcode')
                ->where('address.add_id', $id);

        return $address;
    }


    public static function family($spi_id){
        $parents = DB::table('parents')
                ->leftJoin('parents_student', 'parents.parent_id', 'parents_student.parent_id')
                ->leftJoin('relationship', 'parents_student.rel_id', 'relationship.rel_id')
                ->leftJoin('parent_phone', 'parents.parent_id', 'parent_phone.parent_id')
                ->leftJoin('phone_numbers', 'parent_phone.phone_id', 'phone_numbers.phone_id')
                ->leftJoin('parent_telephones', 'parents.parent_id', 'parent_telephones.parent_id')
                ->leftJoin('telephone_numbers', 'parent_telephones.telephone_id', 'telephone_numbers.telephone_id')
                ->leftJoin('parent_address', 'parents.parent_id', 'parent_address.parent_id')
                ->leftJoin('address', 'address.add_id', 'parent_address.add_id')
                ->where('parents_student.spi_id', $spi_id)
                ->get();

        foreach($parents as $key => $value){
            $parents[$key]->address = self::addressById($value->add_id)->first();
            $parents[$key]->address->provinces = DB::table('prov')->orderBy('province_name','ASC')->get();
            $parents[$key]->address->cities = [];
            $parents[$key]->address->brgy = [];

            $parents[$key]->address->office['provinces'] = DB::table('prov')->orderBy('province_name','ASC')->get();
            $parents[$key]->address->office['cities'] = [];
            $parents[$key]->address->office['brgy'] = [];
        }
        return $parents;
    }

    public static function educationalAttainment($stud) {
        // $data = ['elementary'=>[], 'junior_high'=>[], 'senior_high'=>[], 'college'=>[], 'masters'=>[], 'doctor'=>[]];
        $data['elementary'] = DB::table('elementary_student')
                ->leftJoin('school_lists', 'elementary_student.sl_id', 'school_lists.sl_id')
                ->leftJoin('elementary_address', 'elementary_address.elementary_id', 'elementary_student.elementary_id')
                ->where('elementary_student.spi_id', $stud)
                ->first();

        $data['junior_high'] = DB::table('hschool_student')
                ->leftJoin('school_lists', 'hschool_student.sl_id', 'school_lists.sl_id')
                ->leftJoin('hschool_address', 'hschool_address.hss_id', 'hschool_student.hss_id')
                ->where('hschool_student.type', 'junior high')
                ->where('hschool_student.spi_id', $stud)
                ->first();

        $data['senior_high'] = DB::table('hschool_student')
                ->leftJoin('school_lists', 'hschool_student.sl_id', 'school_lists.sl_id')
                ->leftJoin('hschool_address', 'hschool_address.hss_id', 'hschool_student.hss_id')
                ->where('hschool_student.type', 'senior high')
                ->where('hschool_student.spi_id', $stud)
                ->first();

        $data['college'] = DB::table('college_record')
                ->leftJoin('school_lists', 'college_record.sl_id', 'school_lists.sl_id')
                ->leftJoin('college_record_address', 'college_record_address.cr_id', 'college_record.cr_id')
                ->where('college_record.last_school', 'yes')
                ->where('college_record.spi_id', $stud)
                ->first();

        $data['masters'] = DB::table('master_record')
                ->leftJoin('master_record_address', 'master_record_address.mr_id', 'master_record.mr_id')
                ->where('master_record.spi_id', $stud)
                ->first();

        $data['doctor'] = DB::table('doctor_record')
                ->leftJoin('doctor_record_address', 'doctor_record_address.dr_id', 'doctor_record.dr_id')
                ->where('doctor_record.spi_id', $stud)
                ->first();

        $default = [
                'address'=>[
                        'select'=>[
                                'countries'=>DB::table('country')->orderBy('country_name','ASC')->get(), 'provinces'=>DB::table('prov')->orderBy('province_name','ASC')->get(), 'cities'=>[], 'brgy'=>[]
                        ],
                        'country_id'=>null, 'country_name'=>null, 'city_id'=>null, 'city_name'=>null, 'province_id'=>null, 'province_name'=>null, 'brgy_id'=>null, 'brgy_name'=>null, 'block_no'=>null, 'lot_no'=>null, 'reg_id'=>null, 'street'=>null
                ],
                'spi_id'=>null, 'sl_id'=>null, 'sch_year'=>null, 'sector'=>null, 'highest_level'=>null, 'academic_honor'=>null, 'last_school'=>null

        ];

        $default = json_encode($default);

        foreach($data as $key => $value){
                if($value != null){
                        $data[$key]->address = self::addressById($value->add_id)->limit(1)->get();
                        if(sizeof($data[$key]->address) == 0){
                                $data[$key]->address = json_decode($default)->address;
                        }else {
                                $data[$key]->address = $data[$key]->address[0];
                        }
                        $data[$key]->result = true;
                }else{
                        $data[$key] = json_decode($default);
                        $data[$key]->result = false;
                }
                
        }
        return $data;
    }

}
