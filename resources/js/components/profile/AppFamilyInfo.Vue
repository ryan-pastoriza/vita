<template>
<div>
     <div class="personal-info">
        <div class="head">
            <h6 class="no-padding no-margin">Family</h6>
        </div>
        <div class="body">
            <div v-for="f in preLoaded">
                <ul>
                    <li>
                        <h6 class="c-light f-12">{{f.relationship}}</h6>
                        <h5 class="c-dark">{{f.fname + " " + f.mname.charAt() + ". " + f.lname}}</h5>
                    </li>
                    <li>
                        <h6 class="c-light f-12">Mobile #</h6>
                        <h5 class="c-dark">{{f.phone_number}}</h5>
                    </li>
                    <li>
                        <h6 class="c-light f-12">Telephone #</h6>
                        <h5 class="c-dark">{{f.telephone_number}}</h5>
                    </li>
                    <li>
                        <h6 class="c-light f-12">Address</h6>
                        <h5 class="c-dark">{{put(f.address.street) + ", " + put(f.address.brgy_name) + " " + put(f.address.city_name)}}</h5>
                    </li>
                    <li>
                        <h6 class="c-light f-12">Occupation</h6>
                        <h5 class="c-dark">{{f.occupation}}</h5>
                    </li>
                    <li>
                        <h6 class="c-light f-12">Designation</h6>
                        <h5 class="c-dark">{{f.occupation}}</h5>
                    </li>
                    <li>
                        <h6 class="c-light f-12">Company Address</h6>
                        <h5 class="c-dark">{{f.office_address}}</h5>
                    </li>
                    <li>
                        <h6 class="c-light f-12">Office Telephone #</h6>
                        <h5 class="c-dark">{{f.office_telephone}}</h5>
                    </li>
                </ul>
            </div>
            
            
        </div>
        <div class="footer">
            <div class="see-more">
                <span class="f-10 c-dark"></span>
            </div>
            <div class="update-info">
                <img src="images/profile/pencil.png" alt="" class="pull-left">
                <a class="f-10 c-green pull-left" data-toggle="modal" data-target="#familyModal">Update your family information</a>
            </div>
        </div>
    </div>

    <familyinfo-modal :data="preLoaded" :url="url"></familyinfo-modal>
</div>
</template>


<script>
export default {
    props:['data','url'],

    data(){
        return {
            preLoaded: {},        
        }
    },

    methods: {
        put:function(val){
            if(typeof val != "undefined"){
                return val;
            }
            if(val == null){
                return '';
            }
            return '';
        }
    },

    mounted(){
        this.preLoaded = JSON.parse(this.data).family;
    }
}
</script>

