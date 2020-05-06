<template>
    <div class="col-md-9 s-pad">
    <div class="p-head bg-white">
        <div class="row">
            <div class="col-xs-3">
                <img src="images/don.jpg" class="img img-responsive" alt="">
            </div>
            <div class="col-xs-9 s-pad">
                <div class="p-top">
                    <h3 class="pull-left">{{fullName(alumnus.fname, alumnus.mname, alumnus.lname)}}</h3>
                    <img src="images/profile/edit.png" class="pull-right" alt="">
                </div>
                <div class="p-mid">
                    <h6 class="c-green pull-left">Graduate: </h6>
                    <div class="p-mid-right pull-left">
                        <h6>{{alumnus.prog_name}}</h6>
                    </div>
                    <h6 class="c-green" style="margin-left:370px;">Batch: <span>{{alumnus.sch_year}}</span></h6>
                    <p class="c-dark f-12">Fernandez Village, Butuan City Philippines</p>
                    <ul>
                        <li class="mb-10 oh">
                            <span class="pull-left" style="width:90px;">Skills</span><span class="pull-left c-dark" style="width:550px;">{{alumnusSkills()}}</span> <a href="#" class="c-green">more...</a></span>
                        </li>
                        <li class="mb-10 oh">
                            <span class="pull-left" style="width:90px;">Certificates</span><span class="pull-left c-dark" style="width:550px;">Certified Security Sentinel(CSS), Civil Service Eligible, Computer Programming NCIII, Computer Servicing NCII, <a href="#" class="c-green">more...</a></span>
                        </li>
                        <li class="">
                            <span class="pull-left" style="width:90px;">Works</span><span class="pull-left c-dark" style="width:550px;">Engtech Global Solutions Inc. <a href="#" class="c-green">more...</a></span>
                        </li>
                    </ul>
                </div>
                <div class="p-bot" style="margin-top:25px;">
                    <button class="btn btn-success btn-prime btn-sm pull-left">Improve your profile</button>
                    <div class="p-bot-right pull-right">
                        <p class="c-green t-right no-margin">142</p>
                        <span class="c-light f-10 no-margin no-padding">batch mates</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <app-jobs :url="url" :data="data"></app-jobs>

    <app-recommendedjobs :url="url" :data="data"></app-recommendedjobs>

</div>
</template>

<script>
export default {
    props: ['url', 'data'],
    data(){
        return {
            alumnus:{fname:'', mname:'', lname:''},
            skills:[],
        }
    },
    methods: {
        alumnusSkills:function(){
            let skills = '';
            for(var i in this.skills){
                skills += this.skills[i].skill + ", ";
            }
            return skills;
        }
    },
    mounted() {
        this.alumnus = JSON.parse(this.data).personal_info;
        this.skills = JSON.parse(this.data).skills;
    }
}
</script>

