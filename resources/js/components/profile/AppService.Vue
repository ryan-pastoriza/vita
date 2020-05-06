<template>
    <div>
         <div class="personal-info">
                <div class="head">
                    <h6 class="no-padding no-margin">Service</h6>
                </div>
                <div class="body">
                    <span v-if="services.length == 0" class="no-services">You have no service record.</span>
                    <table class="table no-border info-table" v-if="services.length > 0">
                        <thead>
                            <tr>
                                <th class="f-11 c-light nopad-bot">Event</th>
                                <th class="f-11 c-light nopad-bot">Service</th>
                                <th class="f-11 c-light nopad-bot">Details</th>
                                <th class="f-11 c-light nopad-bot">Duration</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="s in services">
                                <td class="c-dark service" data-toggle="modal" data-target="#serviceModal" @click="currentService=s">{{s.event}}</td>
                                <td class="c-dark">{{s.service}}</td>
                                <td class="c-dark f-11 max-150">{{s.details}}<a href="#" class="c-green">more</a></td>
                                <td class="c-dark">{{s.year_duration}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="footer">
                    <div class="see-more">
                        <span class="f-10 c-dark"></span>
                    </div>
                    <div class="update-info">
                        <img src="images/profile/pencil.png" alt="" class="pull-left">
                        <a class="f-10 c-green pull-left" data-toggle="modal" data-target="#serviceModal">Update your service information</a>
                    </div>
                </div>
            </div>


         <!-- :::::::::::: MODAL ::::::::::::::::  -->

        <service-modal @serviceAdded="messageReceived" :url="url" :service="currentService" :spi_id="JSON.parse(this.data).personal_info.spi_id"></service-modal>


    </div>
    
</template>


<script>
export default {
    props:['url', 'data'],

     data(){
        return {
            preLoaded:{personal_info:{spi_id:''}},
            services:[],
            currentService:{spi_id:'', event:'', service:'', details:'', year_duration:''},
        }
    },

    methods: {
        fetchServices:function(){
            $.get(this.asset(this.url, 'ajxgetservices'), {id:JSON.parse(this.data).personal_info.spi_id}, function(data){
               this.services = data;
            }.bind(this));
        },

        messageReceived:function(value){
            this.fetchServices();
        },
    },

    watch: {
        'data':function(){
            this.fetchServices();
            this.preLoaded = JSON.parse(this.data);
        }
    },

    mounted(){
        this.fetchServices();
        this.preLoaded = JSON.parse(this.data);
    }
}
</script>


<style lang="scss" scoped>
   .no-services {
        color: #bbb;
        text-align: center;
    }

    .service {
        color: #3BA4A4!important;
        cursor: pointer;
        
        &:hover {
            text-decoration: underline;
        }
    }
</style>


