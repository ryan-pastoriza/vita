<template>
    <div>
         <div id="serviceModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content box-edge">
                        <div class="modal-head">
                            <div class="border-bot" style="padding:16px 0;">
                                <h6 class="reset c-dark">Service</h6>
                            </div>
                        </div>   	
                        <div class="modal-body" style="padding-top:0;overflow:hidden">
                            <ul class="p-infolist">
                                <li class="p-bot-10">
                                    <ul>
                                        <li>
                                            <h6 class="f-11 c-light mb-3">Event</h6>
                                            <input v-model="currentService.event" type="text" style="width:645px;">
                                        </li>
                                        <li>
                                            <h6 class="f-11 c-light mb-3">Service</h6>
                                            <input v-model="currentService.service" type="text" style="width:150px;">
                                        </li>
                                        <li style="margin-right:0;">
                                            <h6 class="f-11 c-light mb-3">Year Duration</h6>
                                            <input v-model="currentService.year_duration" type="text" style="width:150px;">
                                        </li>
                                        <li style="width:100%;">
                                            <h6 class="f-11 c-light mb-3">Details</h6>
                                            <input v-model="currentService.details" type="text" style="width:100%;">
                                        </li>
                                        <li><span v-if="required" class="required">All fields are required.</span></li>
                                    </ul>
                                </li>
                                <!-- <li>
                                    <a href="#" class="f-11 c-green mb-3">+ Add Work Experience</a>
                                </li> -->
                            </ul>
                            <div class="buttons">
                                <button @click="saveService" class="btn btn-success btn-prime btn-sm">Save</button>
                                <button class="btn btn-warning btn-sm" @click="resetService">Clear</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>           

    </div>
</template>



<script>
export default {
    props:['url', 'service', 'spi_id'],

    data(){
        return {
            currentService:{spi_id:'', event:'', service:'', details:'', year_duration:''},
            required:false,
        }
    },

    methods: {
        
        saveService:function(){
            this.currentService.spi_id = this.spi_id;
            if(this.checkIfEmpty(this.filterService())){
                this.required = false;
                document.querySelector('#serviceModal').click();
                
                axios.post(this.asset(this.url, 'ajxsaveservice'), this.currentService)
                .then(function (response) {
                    this.$emit('serviceAdded', response.data);
                    this.resetService();
                }.bind(this));
            }else{
                this.required = true;
            }
            
        },

        filterService(){
            let data = [this.currentService.spi_id, this.currentService.year_duration, this.currentService.event, this.currentService.service,
                this.currentService.details];
                return data;
        },

        resetService:function(){
            this.currentService = this.cloneIt({spi_id:'', event:'', service:'', details:'', year_duration:''});
            this.required = false;
        },


    },

    computed:{
        
    },

    watch:{
        'service':function(){
            this.currentService = this.cloneIt(this.service);
        }
    },

    mounted(){
        this.currentService = this.cloneIt(this.service);
    }
}
</script>

<style lang="scss" scoped>
    .buttons {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-start;

        button {

            margin-left: 10px;
        }
    }

    .required {
        color: #e74c3c;
    }
</style>

