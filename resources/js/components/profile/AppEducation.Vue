<template>
    <div class="">
         <div class="personal-info">
                <div class="head">
                    <h6 class="no-padding no-margin">Education</h6>
                </div>
                <div class="body">
                    <div class="row bot-space-16" v-if="edu.elementary.result">
                        <div class="col-xs-5">
                            <h6 class="no-lh c-light">Elementary</h6>
                            <h5 class="no-lh">{{edu.elementary.school_name}}</h5>
                        </div>
                        <div class="col-xs-5">
                            <h6 class="no-lh c-light">Address</h6>
                            <h5 class="no-lh">{{" " + edu.elementary.address.street + edu.elementary.address.brgy_name + edu.elementary.address.city_name + edu.elementary.address.province_name + edu.elementary.address.country_name + ""}}</h5>
                        </div>
                        <div class="col-xs-2">
                            <h6 class="no-lh c-light">Honor</h6>
                            <h5 class="no-lh">{{edu.elementary.academic_honor}}</h5>
                        </div>
                    </div>
                    <div class="row bot-space-16" v-if="edu.junior_high.result">
                        <div class="col-xs-5">
                            <h6 class="no-lh c-light">Junior High School</h6>
                            <h5 class="no-lh">{{edu.junior_high.school_name}}</h5>
                        </div>
                        <div class="col-xs-5">
                            <h6 class="no-lh c-light">Address</h6>
                            <h5 class="no-lh">{{edu.junior_high.address.street + edu.junior_high.address.brgy_name + edu.junior_high.address.city_name + edu.junior_high.address.province_name + edu.junior_high.address.country_name + ""}}</h5>
                        </div>
                        <div class="col-xs-2">
                            <h6 class="no-lh c-light">Honor</h6>
                            <h5 class="no-lh">{{edu.junior_high.academic_honor}}</h5>
                        </div>
                    </div>
                    <div class="row bot-space-16" v-if="edu.senior_high.result">
                        <div class="col-xs-5">
                            <h6 class="no-lh c-light">Senior High School</h6>
                            <h5 class="no-lh">{{edu.senior_high.school_name}}</h5>
                        </div>
                        <div class="col-xs-5">
                            <h6 class="no-lh c-light">Address</h6>
                            <h5 class="no-lh">{{edu.senior_high.address.street + edu.senior_high.address.brgy_name + edu.senior_high.address.city_name + edu.senior_high.address.province_name + edu.senior_high.address.country_name + ""}}</h5>
                        </div>
                        <div class="col-xs-2">
                            <h6 class="no-lh c-light">Honor</h6>
                            <h5 class="no-lh">{{edu.senior_high.academic_honor}}</h5>
                        </div>
                    </div>
                    <div class="row bot-space-16" v-if="edu.college.result">
                        <div class="col-xs-5">
                            <h6 class="no-lh c-light">College</h6>
                            <h5 class="no-lh">{{edu.college.school_name}}</h5>
                            <h6 class="no-lh c-green">Bachelor of Science in Computer Science</h6>
                        </div>
                        <div class="col-xs-5">
                            <h6 class="no-lh c-light">Address</h6>
                            <h5 class="no-lh">{{edu.college.address.street + edu.college.address.brgy_name + edu.college.address.city_name + edu.college.address.province_name + edu.college.address.country_name + ""}}</h5>
                        </div>
                        <div class="col-xs-2">
                            <h6 class="no-lh c-light">Honor</h6>
                            <h5 class="no-lh">{{edu.college.academic_honor}}</h5>
                        </div>
                    </div>
                    <div class="row bot-space-16" v-if="edu.masters.result">
                        <div class="col-xs-5">
                            <h6 class="no-lh c-light">Masters</h6>
                            <h5 class="no-lh">AMA Computer Learning Center College of Butuan</h5>
                            <h6 class="no-lh c-green">Masters of Science in Computer Science</h6>
                        </div>
                        <div class="col-xs-5">
                            <h6 class="no-lh c-light">Address</h6>
                            <h5 class="no-lh">HDS Building, JC Aquino Ave. Butuan City Phils.</h5>
                        </div>
                        <div class="col-xs-2">
                            <h6 class="no-lh c-light">Honor</h6>
                            <h5 class="no-lh">None</h5>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="see-more">
                        <span class="f-10 c-dark"></span>
                    </div>
                    <div class="update-info">
                        <img src="images/profile/pencil.png" alt="" class="pull-left">
                        <a class="f-10 c-green pull-left" data-toggle="modal" data-target="#educationModal">Update your educational information</a>
                    </div>
                </div>
            </div>



            <!-- :::::::::::: MODAL ::::::::::::::::  -->

            <education-modal :url="url"></education-modal>
    </div>
    
</template>


<script>
export default {
    props:['url', 'data'],

     data(){
        return {
            edu:{elementary:{result:false},junior_high:{result:false},senior_high:{result:false},college:{result:false},masters:{result:false},doctor:{result:false}},
        }
    },

    methods: {
        fetchEdu:function(){
            $.get(this.asset(this.url, 'ajxgetedu'), {spi_id:JSON.parse(this.data).personal_info.spi_id}, function(data){
                this.edu = data;
            }.bind(this));
        }
    },

    mounted(){
        this.fetchEdu();
    }
}
</script>

