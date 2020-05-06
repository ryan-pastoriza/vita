<template>
    <div id="eligibilityModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content box-edge">
                        <div class="modal-head">
                            <div class="border-bot" style="padding:16px 0;">
                                <h6 class="reset c-dark">Eligibility Information</h6>
                                <!-- <div class="tab">
                                    <span class="c-light f-11" :class="isActiveClass('create', tab)" @click="tab='create'">Create</span>
                                    <span class="c-light f-11" :class="isActiveClass('edit', tab)" @click="tab='edit'">Edit</span>
                                </div> -->
                            </div>
                        </div>   	
                        <div class="modal-body" style="padding-top:0;overflow:hidden">
                            <ul class="p-infolist">
                                <li>
                                    <h6 class="f-11 c-light mb-3">Eligibility</h6>
                                    <input v-model="eligibility.type" type="text" style="width:745px;">
                                </li>
                                <li style="margin-right:0">
                                    <h6 class="f-11 c-light mb-3">Rank</h6>
                                    <input v-model="eligibility.rating" type="text" style="width:213px;">
                                </li>
                                <li class="border-bot p-bot-10" style="width:100%;">
                                    <h6 class="f-11 c-light mb-3">Certificates</h6>
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <div class="upload-box pull-left" @click="showFileInput">
                                                <i class="fa fa-plus"></i>
                                                <p>Upload Certificate</p>
                                                <input @change="onFileChange" v-show="false" id="fileInput" type="file">
                                            </div>
                                        </div>
                                        <div class="col-xs-11" style="padding-left:60px;">
                                            <div class="upload-box-image">
                                                <ul>
                                                    <li v-for="c in eligibility.certs"><img :src="c" alt=""></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <button @click="saveEligibility" class="btn btn-success btn-prime btn-sm pull-right" style="padding:5px 25px;margin:15px 0;">Save</button>
                        </div>
                    </div>
                </div>
            </div>
</template>

<script>
export default {
    props:['url', 'data', 'elig'],

    data(){
        return {
            eligibilities:[],
            eligibility:{certs:[], spi_id:this.data, type:'', rating:'', eligibility_id:null,},
            tab:'create',
        }
    },

    methods: {
        onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
        },

        createImage(file) {
            var image = new Image();
            var reader = new FileReader();
            var vm = this;

            reader.onload = (e) => {
                vm.eligibility.certs.push(e.target.result);
            };

            reader.readAsDataURL(file);

        },

        removeImage: function (e) {
            this.image = '';
        
        },


        showFileInput:function(){
            document.getElementById('fileInput').click();
        },

        saveEligibility:function(){
            document.querySelector('#eligibilityModal').click();
            axios.post(this.asset(this.url, 'ajxsaveeligibility'), {
                eligibility:this.eligibility,
            })
            .then(function (response) {
                location.reload();
                // console.log(response.data);
            }.bind(this));
        },

    },

    computed:{
        
    },

    watch:{
        'data':function(){
            this.eligibility.spi_id = this.data;
        }
    },

    mounted(){
        this.eligibility.spi_id = this.data;
    }
}
</script>

<style lang="scss" scoped>
    .modal-head {
        > div {
            display: flex;
            align-items: center;
            justify-content: space-between;

            span {
                margin-right: 12px;
                cursor: pointer;

                &:hover{
                    text-decoration: underline;
                }

                &.active {
                    background-color: #3BA4A4;
                    padding: 3px 7px;
                    border-radius: 25px;
                    color: #fff!important;

                    &:hover {
                        text-decoration: none;
                    }
                }
            }
        }
    }
</style>
