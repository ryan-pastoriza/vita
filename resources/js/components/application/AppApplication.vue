<template>
    <div class="col-md-9 s-pad">
    <div class="p-head bg-white">
        <div class="row">
            <div class="col-xs-3">
                <img :src="asset(url, 'images/don.jpg')" class="img img-responsive" alt="">
            </div>
            <div class="col-xs-9 s-pad">
                <div class="p-top">
                    <h3 class="pull-left">Don J. Del Rosario</h3>
                    <img :src="asset(url, 'images/profile/edit.png')" class="pull-right" alt="">
                </div>
                <div class="p-mid">
                    <h6 class="c-green pull-left">Graduate: </h6>
                    <div class="p-mid-right pull-left">
                        <h6>Bachelor of Science in Computer Science</h6>
                    </div>
                    <h6 class="c-green" style="margin-left:370px;">Batch: <span>2014-2015</span></h6>
                    <p class="c-dark f-12">Fernandez Village, Butuan City Philippines</p>
                    <ul>
                        <li class="mb-10 oh">
                            <span class="pull-left" style="width:90px;">Skills</span><span class="pull-left c-dark" style="width:550px;">Ability to work under pressure, Accuracy, Adaptability, Advising people, Analysing data, Analyzing problem, Assembling Equipment, Attention to detail, Auditing financial data, Brainstorming, Budgeting, <a href="#" class="c-green">more...</a></span>
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
                    <!-- <button class="btn btn-success btn-prime btn-sm pull-left">Improve your profile</button> -->
                    <div class="p-bot-right pull-right">
                        <p class="c-green t-right no-margin">142</p>
                        <span class="c-light f-10 no-margin no-padding">batch mates</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="applications bg-white p-15 mb-5">
        <ul class="oh">
            <li class="mr-15">Applications</li>
            <li>
                <span class="mr-10 c-bright-green">1-15 of 15</span>
            </li>
            <li class="pull-right">
                <input v-model="searchQuery" type="text" placeholder="search"><button @click="searchMode=true" class="fa fa-search"></button>
            </li>
        </ul>
        <table class="table table-striped">
            <tbody>
                <tr v-if="search(app)" v-for="app in applications" :key="app.applicant_id">
                    <td style="width:30px;">
                        <input type="checkbox" class="no-margin">
                    </td>
                    <td style="max-width:250px;">
                        <h6 class="mt-0"><a href="#">{{app.company_name}}</a></h6>
                        <span class="pull-left f-10 c-bright-green mr-24">{{app.title}}</span>
                        <span class="pull-left f-10 c-dark">Posted: {{app.posted}}</span>
                    </td>
                    <td>
                        <h6 class="mt-0">{{app.applied}} <span class="ml-10"></span></h6>
                        <span class="pull-left f-10 c-bright-green">Date/Time Applied</span>
                    </td>
                    <td>
                        <!-- <h6 class="mt-0 f-16 c-bright-green">12</h6>
                        <span class="pull-left f-10 c-dark">Replies</span> -->
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class="border-bot mb-10"></div>
        <div class="see-more">
            <!-- <i class="fa fa-angle-down c-light"></i><span class="f-10 c-dark">SEE MORE</span><i class="fa fa-angle-up c-light"></i> -->
        </div>
    </div>
</div> 
</template>

<script>
export default {
    props:['url', 'preloaded'],

    data() {
        return {
            applications: [],
            searchMode: false,
            searchQuery: '',
        }
    },

    methods: {
         search:function(app){
            if(this.searchQuery.length > 3 && this.searchMode){
                if(app.title.toLowerCase().includes(this.searchQuery.trim())){
                    return true;
                }
                return false;
            }
            return true;
        },
    },

    watch: {
        searchQuery:function(val){
            this.searchMode = false;
        }
    },

    mounted() {
        this.applications = JSON.parse(this.preloaded).applications;
    }
}
</script>

