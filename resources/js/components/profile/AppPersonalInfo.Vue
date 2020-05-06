<template>
<div>
    <div class="personal-info">
        <div class="head">
            <h6 class="no-padding no-margin">Personal Information</h6>
        </div>
        <div class="body">
            <ul>
                <li>
                    <h6 class="c-light f-12">Gender</h6>
                    <h5 class="c-dark">{{preLoaded.gender}}</h5>
                </li>
                <li>
                    <h6 class="c-light f-12">Birth Date</h6>
                    <h5 class="c-dark">{{preLoaded.bday}}</h5>
                </li>
                <li>
                    <h6 class="c-light f-12">Birth Place</h6>
                    <h5 class="c-dark">{{preLoaded.birthplace}}</h5>
                </li>
                <li>
                    <h6 class="c-light f-12">Age</h6>
                    <h5 class="c-dark">{{preLoaded.age}}</h5>
                </li>
                <li>
                    <h6 class="c-light f-12">Nationality</h6>
                    <h5 class="c-dark">{{preLoaded.nationality}}</h5>
                </li>
                <li>
                    <h6 class="c-light f-12">Marital Status</h6>
                    <h5 class="c-dark">{{preLoaded.civ_status}}</h5>
                </li>
                <li>
                    <h6 class="c-light f-12">Mobile #</h6>
                    <h5 class="c-dark">{{preLoaded.phone_number}}</h5>
                </li>
                <li>
                    <h6 class="c-light f-12">Telephone #</h6>
                    <h5 class="c-dark">225-9868</h5>
                </li>
                <li>
                    <h6 class="c-light f-12">Email</h6>
                    <h5 class="c-dark">{{preLoaded.email}}</h5>
                </li>
                <li>
                    <h6 class="c-light f-12">Religion</h6>
                    <h5 class="c-dark">{{preLoaded.religion}}</h5>
                </li>
                <li>
                    <h6 class="c-light f-12">Language</h6>
                    <h5 class="c-dark">English, Tagalog, Bisaya, Ilocano, Java, C#, C++, VB.net, PHP, Ruby, Python, Haskel, Assembly</h5>
                </li>
                <li>
                    <h6 class="c-light f-12">Present Address</h6>
                    <h5 class="c-dark">Blk 24, Lot 20 St. Libertad Butuan CIty Agusan del Norte</h5>
                </li>
                <li>
                    <h6 class="c-light f-12">Permanent Address</h6>
                    <h5 class="c-dark">Blk 24, Lot 20 St. Libertad Butuan CIty Agusan del Norte</h5>
                </li>
            </ul>
        </div>
        <div class="footer">
            <div class="see-more">
                <span class="f-10 c-dark"></span>
            </div>
            <div class="update-info">
                <img src="images/profile/pencil.png" alt="" class="pull-left">
                <a class="f-10 c-green pull-left" data-toggle="modal" data-target="#personalModal">Update your personal information</a>
            </div>
        </div>
    </div>




    <!-- :::::::::::::::::::::::::::::::::::::::::::: MODAL :::::::::::::::::::::::::::::::::::::::::::::::::::::: -->


   <personalinfo-modal :data="data" :url="url" @profileUpdated="updateProfile"></personalinfo-modal>
   </div>

</template>


<script>
export default {
    props:['data','url'],

    data(){
        return {
            preLoaded: {},
            maritalStatus:['Married', 'Single', 'Divorced', 'Widow', 'Widower'],
            cities:[],
            brgy:[],
            provinces:[],
            countries:[],
            presentAddress:{country:1, province:'', city:'', brgy:''},
        }
    },

    methods: {
        updateProfile:function(data){
            this.preLoaded = data;
            this.preLoaded.address.present = data.presentAddress;
            this.preLoaded.address.permanent = data.permanentAddress;
        }
    },

    mounted(){
        this.preLoaded = JSON.parse(this.data).personal_info;
        this.toUpdate = JSON.parse(this.data).personal_info;
        this.countries = JSON.parse(this.data).countries;
        this.provinces = JSON.parse(this.data).provinces;
        this.cities = JSON.parse(this.data).cities;
        this.brgy = JSON.parse(this.data).brgy;
    }
}
</script>

