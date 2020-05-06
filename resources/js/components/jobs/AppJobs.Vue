<template>
    <div class="jobs bg-white p-15 mb-5">
        <div class="search-jobs c-light mb-15">
            <h5 class="mb-10 f-13">Job Search</h5>
            <div class="search-bar">
                <input v-model="searchQuery" type="text" class="d-input" style="padding:4px 5px;width:735px;" placeholder="Job Title or Keywords">
                <button @click="searchMode=true" class="btn btn-success btn-prime btn-sm">Search</button>
                <!-- <button class="btn btn-success btn-sm">Deep Search</button> -->
            </div>
        </div>

        <ul class="nav nav-tabs mb-15">
            <li class="active"><a data-toggle="tab" href="#home" class="f-12">All Jobs</a></li>
            <li><a data-toggle="tab" href="#menu1" class="f-12">Domestic Jobs</a></li>
            <li><a data-toggle="tab" href="#menu2" class="f-12">Jobs Abroad</a></li>
        </ul>

        <div class="tab-content border-bot">
            <div id="home" class="tab-pane fade in active">
            <ul class="jobs-list">
                <li class="ptb-10 mb-24" v-for="job in jobs" v-if="search(job)" :key="job.job_id">
                    <img :src="asset(url, job.logo)" class="pull-left mr-32" alt="">
                    <div class="job-details oh">
                        <div class="head mb-10">
                            <h3 class="lh-1 mt-0" data-toggle="modal" data-target="#companyModal">{{job.company_name}}</h3>
                            <h6 class="lh-1 mt-3 c-light">{{job.address}}</h6>
                            <h6 class="mt-5">Position : <span class="c-green f-14">{{job.title}}</span></h6>
                        </div>
                        <div class="body">
                            <p>{{job.description}}<a href="#" class="c-green">more...</a></p>
                        </div>
                        <div class="footer">
                            <h5 class="c-dark">Salary : <span class="c-green">PHP {{job.salary_range}} / month</span></h5>
                            <h6 class="c-light mt-5 f-11">{{job.date_posted}}</h6>
                        </div>
                    </div>
                </li>
            </ul>
            </div>

            <div id="menu1" class="tab-pane fade">
                <ul class="jobs-list">
                    <li v-if="job.job_loc=='domestic' && search(job)" class="ptb-10 mb-24" v-for="job in jobs">
                        <img :src="asset(url, job.logo)" class="pull-left mr-32" alt="">
                        <div class="job-details oh">
                            <div class="head mb-10">
                                <h3 class="lh-1 mt-0" data-toggle="modal" data-target="#companyModal">{{job.company_name}}</h3>
                                <h6 class="lh-1 mt-3 c-light">{{job.address}}</h6>
                                <h6 class="mt-5">Position : <span class="c-green f-14">{{job.title}}</span></h6>
                            </div>
                            <div class="body">
                                <p>{{job.description}}<a href="#" class="c-green">more...</a></p>
                            </div>
                            <div class="footer">
                                <h5 class="c-dark">Salary : <span class="c-green">PHP {{job.salary_range}} / month</span></h5>
                                <h6 class="c-light mt-5 f-11">{{job.date_posted}}</h6>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div id="menu2" class="tab-pane fade">
                <ul class="jobs-list">
                    <li v-if="job.job_loc=='abroad' && search(job)" class="ptb-10 mb-24" v-for="job in jobs">
                        <img :src="asset(url, job.logo)" class="pull-left mr-32" alt="">
                        <div class="job-details oh">
                            <div class="head mb-10">
                                <h3 class="lh-1 mt-0" data-toggle="modal" data-target="#companyModal">{{job.company_name}}</h3>
                                <h6 class="lh-1 mt-3 c-light">{{job.address}}</h6>
                                <h6 class="mt-5">Position : <span class="c-green f-14">{{job.title}}</span></h6>
                            </div>
                            <div class="body">
                                <p>{{job.description}}<a href="#" class="c-green">more...</a></p>
                            </div>
                            <div class="footer">
                                <h5 class="c-dark">Salary : <span class="c-green">PHP {{job.salary_range}} / month</span></h5>
                                <h6 class="c-light mt-5 f-11">{{job.date_posted}}</h6>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- <div class="see-more rel center-text pt-5">
            <a href="#" class="f-12 c-light">SEE MORE</a>
            <button class="btn btn-success btn-prime btn-sm rec-jobs">200 Recomended Jobs</button>
        </div>	 -->
    </div>
</template>

<script>
export default {
    props:['url', 'data'],
    data(){
        return {
            jobs: [],
            searchQuery:'',
            searchMode: false,
        }
    },

    methods: {
        search:function(job){
            if(this.searchQuery.length > 3 && this.searchMode){
                if(job.title.toLowerCase().includes(this.searchQuery.trim())){
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

    mounted(){
        this.jobs = JSON.parse(this.data).jobs;
    }
}
</script>

