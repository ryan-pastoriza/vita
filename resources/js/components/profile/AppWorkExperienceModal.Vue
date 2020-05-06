<template>
    <div>
         <div id="workexpModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content box-edge">
                        <div class="modal-head">
                            <div class="border-bot" style="padding:16px 0;">
                                <h6 class="reset c-dark">Work Experience</h6>
                            </div>
                        </div>   	
                        <div class="modal-body" style="padding-top:0;overflow:hidden">
                            <ul class="p-infolist">
                                <li class="p-bot-10">
                                    <ul>
                                        <li>
                                            <h6 class="f-11 c-light mb-3">Company</h6>
                                            <input v-model="workExperience.company" type="text" style="width:645px;">
                                        </li>
                                        <li>
                                            <h6 class="f-11 c-light mb-3">Designation</h6>
                                            <input v-model="workExperience.position" type="text" style="width:150px;">
                                        </li>
                                        <li style="margin-right:0;">
                                            <h6 class="f-11 c-light mb-3">Year Duration</h6>
                                            <input v-model="workExperience.year_duration" type="text" style="width:150px;">
                                        </li>
                                        <li style="width:100%;">
                                            <h6 class="f-11 c-light mb-3">Address</h6>
                                            <input v-model="workExperience.company_address" type="text" style="width:100%;">
                                        </li>
                                        <li><span v-if="required" class="required">All fields are required.</span></li>
                                    </ul>
                                </li>
                                <!-- <li>
                                    <a href="#" class="f-11 c-green mb-3">+ Add Work Experience</a>
                                </li> -->
                            </ul>
                            <div class="buttons">
                                <button @click="saveWorkExperience" class="btn btn-success btn-prime btn-sm">Save</button>
                                <button class="btn btn-warning btn-sm" @click="resetWorkExperience">Clear</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>           

    </div>
</template>



<script>
export default {
    props:['url', 'wex', 'spi_id'],

    data(){
        return {
            workExperiences:[],
            workExperience:{spi_id:'', year_duration:'', position:'', company:'', company_address:''},
            required:false,
        }
    },

    methods: {
        
        saveWorkExperience:function(){
            this.workExperience.spi_id = this.spi_id;
            if(this.checkIfEmpty(this.filterWorkExperience())){
                this.required = false;
                document.querySelector('#workexpModal').click();
                
                axios.post(this.asset(this.url, 'ajxsaveworkexperience'), this.workExperience)
                .then(function (response) {
                    this.$emit('workAdded', response.data);
                    this.resetWorkExperience();
                }.bind(this));
            }else{
                this.required = true;
            }
            
        },

        filterWorkExperience(){
            let data = [this.workExperience.spi_id, this.workExperience.year_duration, this.workExperience.position, this.workExperience.company,
                this.workExperience.company_address];
                return data;
        },

        resetWorkExperience:function(){
            this.workExperience = this.cloneIt({spi_id:'', year_duration:'', position:'', company:'', company_address:''});
            this.required = false;
        },


    },

    computed:{
        
    },

    watch:{
        'wex':function(){
            this.workExperience = this.cloneIt(this.wex);
        }
    },

    mounted(){
        this.workExperience = this.cloneIt(this.wex);
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

