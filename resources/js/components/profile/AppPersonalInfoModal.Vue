<template>
    <div id="personalModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content box-edge">
            <div class="modal-head">
                <div class="border-bot" style="padding:16px 0;">
                    <h6 class="reset c-dark">Personal Information</h6>
                </div>
            </div>   	
            <div class="modal-body" style="padding-top:0;overflow:hidden">
                <ul class="p-infolist">
                    <li>
                        <h6 class="f-11 c-light mb-5">Gender</h6>
                        <label v-for="g in gender" class="radio-inline c-green"><input v-model="toUpdate.gender" type="radio" :value="g" name="optradio">{{g}}</label>
                        <!-- <label class="radio-inline c-green"><input type="radio" name="optradio">Female</label> -->
                    </li>
                    <li>
                        <h6 class="f-11 c-light mb-3">Birthdate</h6>
                        <input v-model="toUpdate.birthdate" type="date" style="width:150px;">
                    </li>
                    <li>
                        <h6 class="f-11 c-light mb-3">Age</h6>
                        <input v-model="toUpdate.age" type="text" style="width:45px;" disabled>
                    </li>
                    <li>
                        <h6 class="f-11 c-light mb-3">Nationality</h6>
                        <input v-model="toUpdate.nationality" type="text" style="width:150px;">
                    </li>
                    <li>
                        <h6 class="f-11 c-light mb-3">Marital Status</h6>
                        <select v-model="toUpdate.civ_status" name="" id="">
                            <option v-for="ms in maritalStatus" :value="ms">{{ms}}</option>
                        </select>
                    </li>
                    <li style="margin-right:0;">
                        <h6 class="f-11 c-light mb-3">Religion</h6>
                        <input v-model="toUpdate.religion" type="text" style="width:296px;">
                    </li>
                    <li>
                        <h6 class="f-11 c-light mb-3">Mobile #</h6>
                        <textarea v-model="toUpdate.phone_number" name="" id="" cols="30" rows="10"></textarea>
                    </li>
                    <li>
                        <h6 class="f-11 c-light mb-3">Telephone #</h6>
                        <textarea v-model="toUpdate.phone_number" name="" id="" cols="30" rows="10"></textarea>
                    </li>
                    <li>
                        <h6 class="f-11 c-light mb-3">Email Address</h6>
                        <textarea v-model="toUpdate.email" name="" id="" cols="30" rows="10"></textarea>
                    </li>
                    <li style="margin-right:0;">
                        <h6 class="f-11 c-light mb-3">Language</h6>
                        <textarea name="" id="" cols="30" rows="10" style="width:237px"></textarea>
                    </li>
                    <li>
                        <h6 class="f-11 c-light mb-3">Birth Place</h6>
                        <input v-model="toUpdate.birthplace" type="text" style="width:200px;">
                    </li>
                    <!-- <li class="border-bot" style="width:100%">
                        <h6 class="f-11 c-dark mb-10">Birth Place</h6>
                        <input v-model="toUpdate.religion" type="text" style="width:296px;">
                    </li> -->
                    <li class="border-bot" style="width:100%">
                        <h6 class="f-11 c-dark mb-10">Present Address</h6>
                    </li>
                    <li>
                        <ul>
                            <li v-if="presentAddress.country_id==1" style="margin-right:0;">
                                <h6 class="f-11 c-light mb-3">Province</h6>
                                <select @change="resetPresentAddress()" name="" id="" v-model="presentAddress.province_id">
                                    <option v-for="p in presentSelect.provinces" :value="p.province_id">{{p.province_name}}</option>
                                </select>
                            </li>
                            <li style="margin-right:0;">
                                <h6 class="f-11 c-light mb-3">City</h6>
                                <select @change="presentAddress.zipcode = findZip(presentAddress.city_id, presentSelect.cities);" name="" id="" v-model="presentAddress.city_id">
                                    <option v-for="ct in presentSelect.cities" :value="ct.city_id">{{ct.city_name}}</option>
                                </select>
                            </li>
                            <li style="margin-right:0;">
                                <h6 class="f-11 c-light mb-3">Barangay</h6>
                                <select name="" id="" v-model="presentAddress.brgy_id">
                                    <option v-for="b in presentSelect.brgy" :value="b.brgy_id">{{b.brgy_name}}</option>
                                </select>
                            </li>
                            <li>
                                <h6 class="f-11 c-light mb-3">Blk no.</h6>
                                <input v-model="presentAddress.block_no" type="text" style="width:50px;">
                            </li>
                            <li>
                                <h6 class="f-11 c-light mb-3">Lot no.</h6>
                                <input v-model="presentAddress.lot_no" type="text" style="width:50px;">
                            </li>
                            <li>
                                <h6 class="f-11 c-light mb-3">Zip code</h6>
                                <input disabled v-model="presentAddress.zipcode" type="text" style="width:50px;">
                            </li>
                            <li>
                                <h6 class="f-11 c-light mb-3">Street</h6>
                                <input v-model="presentAddress.street" type="text" style="width:150px;">
                            </li>
                            <li style="margin-right:0;">
                                <h6 class="f-11 c-light mb-3">Country</h6>
                                <select name="" id="">
                                    <option v-for="c in presentSelect.countries" :value="c.country_id">{{c.country_name}}</option>
                                </select>
                            </li>
                        </ul>
                    </li>
                    <li class="border-bot" style="width:100%">
                        <h6 class="f-11 c-dark mb-10">Permanent Address</h6>
                    </li>
                    <li>
                        <ul>
                            <li v-if="permanentAddress.country_id==1" style="margin-right:0;">
                                <h6 class="f-11 c-light mb-3">Province</h6>
                                <select @change="resetPermanentAddress()" name="" id="" v-model="permanentAddress.province_id">
                                    <option v-for="p in permanentSelect.provinces" :value="p.province_id">{{p.province_name}}</option>
                                </select>
                            </li>
                            <li style="margin-right:0;">
                                <h6 class="f-11 c-light mb-3">City</h6>
                                <select @change="permanentAddress.zipcode = findZip(permanentAddress.city_id, permanentSelect.cities);" name="" id="" v-model="permanentAddress.city_id">
                                    <option v-for="ct in permanentSelect.cities" :value="ct.city_id">{{ct.city_name}}</option>
                                </select>
                            </li>
                            <li style="margin-right:0;">
                                <h6 class="f-11 c-light mb-3">Barangay</h6>
                                <select name="" id="" v-model="permanentAddress.brgy_id">
                                    <option v-for="b in permanentSelect.brgy" :value="b.brgy_id">{{b.brgy_name}}</option>
                                </select>
                            </li>
                            <li>
                                <h6 class="f-11 c-light mb-3">Blk no.</h6>
                                <input v-model="permanentAddress.block_no" type="text" style="width:50px;">
                            </li>
                            <li>
                                <h6 class="f-11 c-light mb-3">Lot no.</h6>
                                <input v-model="permanentAddress.lot_no" type="text" style="width:50px;">
                            </li>
                            <li>
                                <h6 class="f-11 c-light mb-3">Zip code</h6>
                                <input disabled v-model="permanentAddress.zipcode" type="text" style="width:50px;">
                            </li>
                            <li>
                                <h6 class="f-11 c-light mb-3">Street</h6>
                                <input v-model="permanentAddress.street" type="text" style="width:150px;">
                            </li>
                            <li style="margin-right:0;">
                                <h6 class="f-11 c-light mb-3">Country</h6>
                                <select name="" id="">
                                    <option v-for="c in permanentSelect.countries" :value="c.country_id">{{c.country_name}}</option>
                                </select>
                            </li>
                        </ul>
                    </li>
                </ul>
                <button @click="save()" class="btn btn-success btn-prime btn-sm pull-right" style="padding:5px 25px;margin:15px 0;">Save</button>
            </div>
        </div>
        </div>
    </div>

</template>


<script>
export default {
    props:['data','url'],

    data(){
        return {
            preLoaded:{},
            toUpdate: {},
            maritalStatus:['Married', 'Single', 'Divorced', 'Widow', 'Widower'],
            presentSelect:{countries:[], provinces:[], cities:[], brgy:[]},
            permanentSelect:{countries:[], provinces:[], cities:[], brgy:[]},

            presentAddress:{  country_id:1, 
                                province_id:'', 
                                city_id:'', 
                                brgy_id:'',
                                country_name:'',
                                province_name:'',
                                city_name:'',
                                brgy_name:'',
                                street:'',
                                block_no:'',
                                lot_no:'',
                                zipcode:'' },

            permanentAddress:{  country_id:1, 
                                province_id:'', 
                                city_id:'', 
                                brgy_id:'',
                                country_name:'',
                                province_name:'',
                                city_name:'',
                                brgy_name:'',
                                street:'',
                                block_no:'',
                                lot_no:'',
                                zipcode:'' },

            gender:['male', 'female'],
        }
    },

    methods: {
        fetchPresentCity:function(){
            $.get(this.asset(this.url, 'ajxcity'), {id:this.presentAddress.province_id}, function(data){
                this.presentSelect.cities = data;
            }.bind(this));
        },

        fetchPresentBrgy:function(){
            $.get(this.asset(this.url, 'ajxbrgy'), {id:this.presentAddress.city_id}, function(data){
                this.presentSelect.brgy = data;
            }.bind(this));
        },

        fetchPermanentCity:function(){
            $.get(this.asset(this.url, 'ajxcity'), {id:this.permanentAddress.province_id}, function(data){
                this.permanentSelect.cities = data;
            }.bind(this));
        },

        fetchPermanentBrgy:function(){
            $.get(this.asset(this.url, 'ajxbrgy'), {id:this.permanentAddress.city_id}, function(data){
                this.permanentSelect.brgy = data;
            }.bind(this));
        },

        findZip:function(needle, haystack){
            for(var i in haystack){
                if(needle == haystack[i].city_id){
                    return haystack[i].zipcode;
                }
            }
        },

        resetPresentAddress:function(){
            this.presentAddress.zipcode = '';
            this.presentAddress.city_id = '';
            this.presentAddress.brgy_id = '';
            this.presentSelect.brgy = [];
        },

         resetPermanentAddress:function(){
            this.permanentAddress.zipcode = '';
            this.permanentAddress.city_id = '';
            this.permanentAddress.brgy_id = '';
            this.permanentSelect.brgy = [];
        },

        setAge:function(){
            $.get(this.asset(this.url, 'ajxsetage'), {birthdate:this.toUpdate.birthdate}, function(data){
                this.toUpdate.age = data;
            }.bind(this));
        },
        
        save:function(){
            let data = this.toUpdate;
            data.presentAddress = this.presentAddress;
            data.permanentAddress = this.permanentAddress;

            axios.post(this.asset(this.url, 'ajxsavepersonalinfo'), data)
            .then(function (response) {
               this.$emit('profileUpdated',data);
            }.bind(this))
            .catch(function (error) {
                console.log(error.response);
            }.bind(this));

            document.getElementById('personalModal').click();
        }
    },

    watch: {
        'presentAddress.province_id':function(val){
            this.fetchPresentCity();
        },
        'presentAddress.city_id':function(val){
            this.fetchPresentBrgy();
        },

        'permanentAddress.province_id':function(val){
            this.fetchPermanentCity();
        },
        'permanentAddress.city_id':function(val){
            this.fetchPermanentBrgy();
        },

        'toUpdate.birthdate':function(val){
            this.setAge();
        },
    },


    mounted(){
        this.preLoaded = JSON.parse(this.data).personal_info;
        this.toUpdate = JSON.parse(this.data).personal_info;
        this.presentSelect.countries = JSON.parse(this.data).countries;
        this.presentSelect.provinces = JSON.parse(this.data).provinces;
        let pselect = JSON.stringify(this.presentSelect);
        this.permanentSelect = JSON.parse(pselect);
        if(this.toUpdate.address.present != null){
            this.presentAddress = this.toUpdate.address.present;
        }
        if(this.toUpdate.address.permanent != null){
            this.permanentAddress = this.toUpdate.address.permanent;
        }
        this.brgy = JSON.parse(this.data).brgy;
    }
}
</script>
