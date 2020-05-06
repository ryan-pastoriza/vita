<template>
    <div id="familyModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content box-edge">
            <div class="modal-head">
                <div class="border-bot" style="padding:16px 0;">
                    <h6 class="reset c-dark">Family Information</h6>
                </div>
            </div>   	
            <div class="modal-body" style="padding-top:0;overflow:hidden">
                <ul class="p-infolist" v-for="d in toUpdate">
                    <li class="border-bot" style="width:100%;margin-top:10px;">
                        <h6 class="f-11 c-dark mb-10 pull-left">{{d.relationship}}'s Information</h6>
                        <i class="fa fa-chevron-down pull-right c-green mt-5"></i>
                    </li>
                    <li>
                        <ul>
                            <li>
                                <h6 class="f-11 c-light mb-3">First Name</h6>
                                <input v-model="d.fname" type="text" style="width:200px;">
                            </li>
                            <li>
                                <h6 class="f-11 c-light mb-3">Middle Name</h6>
                                <input v-model="d.mname" type="text" style="width:200px;">
                            </li>
                            <li>
                                <h6 class="f-11 c-light mb-3">Last Name</h6>
                                <input v-model="d.lname" type="text" style="width:200px;">
                            </li>
                            <li>
                                <h6 class="f-11 c-light mb-3">Suffix</h6>
                                <input v-model="d.suffix" type="text" style="width:200px;">
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>
                                <h6 class="f-11 c-light mb-3">Mobile #</h6>
                                <textarea v-model="d.phone_number" name="" id="" cols="30" rows="10"></textarea>
                            </li>
                            <li>
                                <h6 class="f-11 c-light mb-3">Telephone #</h6>
                                <textarea v-model="d.telephone_number" name="" id="" cols="30" rows="10"></textarea>
                            </li>
                        </ul>
                    </li>
                    <li class="border-bot" style="width:100%">
                        <h6 class="f-11 c-dark mb-10">Address</h6>
                    </li>
                    <li>
                        <ul>
                            <li>
                                <h6 class="f-11 c-light mb-3">Province</h6>
                                 <select @change="fetchCities(d.address.province_id, d.parent_id)" name="" id="" v-model="d.address.province_id">
                                    <option v-for="p in d.address.provinces" :value="p.province_id">{{p.province_name}}</option>
                                </select>
                            </li>
                            <li>
                                <h6 class="f-11 c-light mb-3">City</h6>
                                <select @change="fetchBrgy(d.address.city_id, d.parent_id)" name="" id="" v-model="d.address.city_id">
                                    <option v-for="c in d.address.cities" :value="c.city_id">{{c.city_name}}</option>
                                </select>
                            </li>
                            <li>
                                <h6 class="f-11 c-light mb-3">Barangay</h6>
                                <select name="" id="" v-model="d.address.brgy_id">
                                    <option v-for="b in d.address.brgy" :value="b.brgy_id">{{b.brgy_name}}</option>
                                </select>
                            </li>
                            <li>
                                <h6 class="f-11 c-light mb-3">Blk no.</h6>
                                <input v-model="d.address.block_no" type="text" style="width:50px;">
                            </li>
                            <li>
                                <h6 class="f-11 c-light mb-3">Lot no.</h6>
                                <input v-model="d.address.lot_no" type="text" style="width:50px;">
                            </li>
                            <li>
                                <h6 class="f-11 c-light mb-3">Zip code</h6>
                                <input v-model="d.address.zipcode" type="text" style="width:50px;">
                            </li>
                            <li>
                                <h6 class="f-11 c-light mb-3">Street</h6>
                                <input v-model="d.address.street" type="text" style="width:150px;">
                            </li>
                            <li style="margin-right:0;">
                                <h6 class="f-11 c-light mb-3">Country</h6>
                                <select name="" id="" value="1">
                                    <option value="1">Philippines</option>
                                </select>
                            </li>
                            <li>
                                <h6 class="f-11 c-light mb-3">Occupation</h6>
                                <input v-model="d.occupation" type="text" style="width:200px;">
                            </li>
                            <li>
                                <h6 class="f-11 c-light mb-3">Designation</h6>
                                <input type="text" style="width:200px;">
                            </li>
                            <li>
                                <h6 class="f-11 c-light mb-3">Office Telephone #</h6>
                                <input v-model="d.office_telephone" type="text" style="width:200px;">
                            </li>
                            <li>
                                <h6 class="f-11 c-light mb-3">Office Address</h6>
                                <input v-model="d.office_address" type="text" style="width:200px;">
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
            toUpdate: [],
        }
    },

    methods: {
        fetchProvince:function(){
            $.get(this.asset(this.url, 'ajxprov'), function(data){
               this.province = data;
            }.bind(this));
        },

        fetchCities:function(province_id, p_id){
            $.get(this.asset(this.url, 'ajxcity'), {id:province_id}, function(data){
                for(var i in this.toUpdate){
                    if(this.toUpdate[i].parent_id == p_id){
                        this.toUpdate[i].address.cities = data;
                    }
                }
            }.bind(this));
        },

        fetchBrgy:function(city_id, p_id){
            $.get(this.asset(this.url, 'ajxbrgy'), {id:city_id}, function(data){
                for(var i in this.toUpdate){
                    if(this.toUpdate[i].parent_id == p_id){
                        this.toUpdate[i].address.brgy = data;
                        
                        for(var z in this.toUpdate[i].address.cities){
                            if(this.toUpdate[i].address.cities[z].city_id == city_id){
                                this.toUpdate[i].address.zipcode = this.toUpdate[i].address.cities[z].zipcode;
                            }
                        }
                    }
                }
            }.bind(this));
        },

        save:function(){
            axios.post(this.asset(this.url, 'ajxsavefamilyinfo'), data)
            .then(function (response) {
            //    this.$emit('profileUpdated',data);
            console.log(response.data);
            }.bind(this))
            .catch(function (error) {
                console.log(error.response);
            }.bind(this));
        }
        
    },

    watch: {
        data:function(){
            this.toUpdate = JSON.parse(JSON.stringify(this.data));
            for(var i in this.toUpdate){
                this.fetchCities(this.toUpdate[i].address.province_id, this.toUpdate[i].parent_id);
                this.fetchBrgy(this.toUpdate[i].address.city_id, this.toUpdate[i].parent_id);
            }
        }
    },

    mounted(){
        this.fetchProvince();
    }

}
</script>

