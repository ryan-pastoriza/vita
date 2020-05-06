<template>
    <div class="recommended-jobs bg-white p-15">
        <h6 class="c-dark f-12 mb-15">Recommended jobs for you</h6>
        <div style="display:flex">
            <ul class="mr-32 job-types" style="width:auto;height:100px">
                <li @click.prevent="jobType=job" :class="navActive(jobType.jpost_id, job.jpost_id)" v-for="job in jobs"><a href="">{{job.title}}</a></li>
            </ul>

            <ul class="jobs-list border-bot p-bot-10" style="flex:1">
                <li v-for="j in jobs" class="mb-32" style="display:flex;" v-if="jobType.jpost_id==j.jpost_id">
                    <img src="images/jobs/azure.jpg" style="height:120px;width:auto;" class="ml-32" alt=""> 
                    <div class="job-details oh" style="padding-left:16px;">
                        <div class="head mb-10">
                            <h3 class="lh-1 mt-0" data-toggle="modal" data-target="#companyModal">{{j.company_name}}</h3>
                            <h6 class="lh-1 mt-3 c-light">{{j.address}}</h6>
                            <h6 class="mt-5">Position : <span class="c-green f-14">{{j.title}}</span></h6>
                        </div>
                        <div class="body">
                            <p>{{j.description}}<a href="#" class="c-green">more...</a></p>
                        </div>
                        <div class="footer">
                            <h5 class="c-dark">Salary : <span class="c-green">PHP {{j.salary_range}} / month</span></h5>
                            <h6 class="c-light mt-5 f-11">{{j.date_posted}}</h6>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
      
<!-- 
        <div class="see-more rel center-text pt-5">
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
            jobs:[],
            jobType:'',
        }
    },

    methods: {
        
    },

    mounted(){
        this.jobs = JSON.parse(this.data).jobs;
    }
}
</script>

<style lang="scss" scoped>
a, a:hover, a:active, a:visited, a:focus {
    text-decoration:none;
}
    .job-types {
        li {
            padding:5px 10px;
            margin-bottom: 0;
            &.active {
                background-color: #00B2B2;
                a {
                    color: #fff;
                    &:visited{
                        text-decoration: none;
                    }
                    &:active {
                        text-decoration: none;
                    }
                }
            }
        }
        
    }
</style>
