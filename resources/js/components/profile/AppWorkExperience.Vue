<template>
    <div>
         <div class="personal-info">
                <div class="head">
                    <h6 class="no-padding no-margin">Work Experience</h6>
                </div>
                <div class="body">
                    <span v-if="workexperience.length == 0" class="no-workexperience">You have no work experience record.</span>
                    <table class="table no-border info-table" v-if="workexperience.length > 0">
                        <thead>
                            <tr>
                                <th class="f-11 c-light nopad-bot">Company</th>
                                <th class="f-11 c-light nopad-bot">Designation</th>
                                <th class="f-11 c-light nopad-bot">Location</th>
                                <th class="f-11 c-light nopad-bot">Years Duration</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="wex in workexperience">
                                <td class="c-dark company" data-toggle="modal" data-target="#workexpModal" @click="currentWork=wex">{{wex.company}}</td>
                                <td class="c-dark">{{wex.position}}</td>
                                <td class="c-dark">{{wex.company_address}}</td>
                                <td class="c-dark">{{wex.year_duration}}</td>
                            </tr>
                            <!-- <tr>
                                <td class="c-dark">Macintosh Software Development Company</td>
                                <td class="c-dark">Systems Analyst</td>
                                <td class="c-dark">San Andreas, California USA</td>
                                <td class="c-dark">2013 - 2015</td>
                            </tr>
                            <tr>
                                <td class="c-dark">Accenture Venture Incorporated</td>
                                <td class="c-dark">Software Engineer</td>
                                <td class="c-dark">Makati City, Philippines</td>
                                <td class="c-dark">2016 - 2017</td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
                <div class="footer">
                    <div class="see-more">
                        <span class="f-10 c-dark"></span>
                    </div>
                    <div class="update-info">
                        <img src="images/profile/pencil.png" alt="" class="pull-left">
                        <a class="f-10 c-green pull-left" data-toggle="modal" data-target="#workexpModal">Update your working experience</a>
                    </div>
                </div>
            </div>

         <!-- :::::::::::: MODAL ::::::::::::::::  -->

        <workexperience-modal @workAdded="messageReceived" :url="url" :spi_id="JSON.parse(this.data).personal_info.spi_id" :wex="currentWork"></workexperience-modal>


    </div>
    
</template>


<script>
export default {
    props:['url', 'data'],

     data(){
        return {
            preLoaded:{personal_info:{spi_id:''}},
            workexperience:[],
            currentWork:{spi_id:'', year_duration:'', position:'', company:'', company_address:''},
            elig:null,
        }
    },

    methods: {
        fetchWorkExperience:function(){
            $.get(this.asset(this.url, 'ajxgetworkexperience'), {id:JSON.parse(this.data).personal_info.spi_id}, function(data){
               this.workexperience = data;
            }.bind(this));
        },

        messageReceived:function(value){
            this.fetchWorkExperience();
        },
    },

    watch: {
        'data':function(){
            this.fetchWorkExperience();
            this.preLoaded = JSON.parse(this.data);
        }
    },

    mounted(){
        this.fetchWorkExperience();
        this.preLoaded = JSON.parse(this.data);
    }
}
</script>


<style lang="scss" scoped>
    .no-workexperience {
        color: #bbb;
        text-align: center;
    }

    .company {
        color: #3BA4A4!important;
        cursor: pointer;
        
        &:hover {
            text-decoration: underline;
        }
    }
</style>


