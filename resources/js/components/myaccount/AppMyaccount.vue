<template>
    <div class="col-md-9 s-pad">
        <div class="p-head bg-white">
            <div class="row">
                <div class="col-xs-3">
                    <img src="images/don.jpg" class="img img-responsive" alt="">
                </div>
                <div class="col-xs-9 s-pad">
                    <div class="p-top">
                        <h3 class="pull-left">{{fullName(personalInfo.fname, personalInfo.mname, personalInfo.lname)}}</h3>
                        <img src="images/profile/edit.png" class="pull-right" alt="">
                    </div>
                    <div class="p-mid">
                        <h6 class="c-green pull-left">Graduate: </h6>
                        <div class="p-mid-right pull-left">
                            <h6>{{personalInfo.prog_name}}</h6>
                            <span>Student Id No: <span class="c-green">{{personalInfo.stud_id}}</span></span><br>
                            <span>Batch <span>{{personalInfo.sch_year}}</span></span><br>
                            <span>Date Graduated: <span>March 30, 2015</span></span>
                        </div>
                    </div>
                    <div class="p-bot">
                        <button class="btn btn-success btn-prime btn-sm pull-left">Improve your profile</button>
                        <div class="p-bot-right pull-right">
                            <p class="c-green t-right no-margin">142</p>
                            <span class="c-light f-10 no-margin no-padding">batch mates</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="my-account bg-white p-15">
            <div class="head border-bot p-bot-10 oh">
                <h6 class="mt-0 pull-left f-dark">General Account Settings</h6>
                <a href=""><i class="fa fa-angle-down pull-right c-light f-14"></i></a>
            </div>
            <ul class="mb-24">
                <li class="ptb-10 oh">
                    <div class="pull-left">
                        <h6 class="mt-0 f-12 c-light mb-3">Username</h6>
                        <input v-if="edit.username" v-model="newUsername" type="text" class="form-controls" placeholder="Enter new username">
                        <h5 v-if="!edit.username" class="mt-0 f-16 c-dark">{{user.username}}</h5>
                        <span v-if="errors.username" class="error">{{errors.username}}</span>
                    </div>
                    <a href="" v-if="!edit.username" class="pull-right c-bright-green f-12" style="line-height:25px;" @click.prevent="edit.username=true">Edit</a>
                    <a href="" v-if="edit.username" class="pull-right c-bright-green f-12" style="line-height:25px;" @click.prevent="updateUsername()">Save</a>
                </li>
                <li class="ptb-10 oh">
                    <div class="pull-left">
                        <h6 class="mt-0 f-12 c-light">Password</h6>
                        <h5 v-if="!edit.password" class="mt-0 f-16 c-dark pull-left mr-10 pt-3">********************* </h5><a href=""><sup class="c-bright-green f-8"></sup></a>
                        <input v-if="edit.password" v-model="newPassword" type="password" class="form-controls" placeholder="Enter new password">
                        <input v-if="edit.password" v-model="newPasswordConfirm" type="password" class="form-controls" placeholder="Confirm password">
                        <span v-if="errors.password" class="error">{{errors.password}}</span>
                    </div>
                    <a href="" v-if="!edit.password" class="pull-right c-bright-green f-12" style="line-height:25px;" @click.prevent="edit.password=true">Edit</a>
                    <a href="" v-if="edit.password" class="pull-right c-bright-green f-12" style="line-height:25px;" @click.prevent="updatePassword()">Save</a>
                </li>
                <li class="oh">
                    <a href="" class="pull-right c-bright-green f-12" style="line-height:25px;">View Account History</a>
                </li>
            </ul>

            <div class="head border-bot p-bot-10 oh">
                <h6 class="mt-0 pull-left f-dark">Security</h6>
                <a href=""><i class="fa fa-angle-down pull-right c-light f-14"></i></a>
            </div>
            <ul>
                <li class="ptb-10 oh">
                    <div class="pull-left">
                        <h6 class="mt-0 f-12 c-light mb-3">Contact Verification Number</h6>
                        <input v-if="edit.contactNo" v-model="newContactNo" type="text" class="form-controls" placeholder="Enter new Contact Number">
                        <h5 v-if="!edit.contactNo" class="mt-0 f-16 c-dark">{{personalInfo.phone_number}}</h5>
                        <span v-if="errors.contact_no" class="error">{{errors.contact_no}}</span>
                    </div>
                     <a href="" v-if="!edit.contactNo" class="pull-right c-bright-green f-12" style="line-height:25px;" @click.prevent="edit.contactNo=true">Edit</a>
                    <a href="" v-if="edit.contactNo" class="pull-right c-bright-green f-12" style="line-height:25px;" @click.prevent="updateContactNo()">Save</a>
                </li>
                <li class="ptb-10 oh">
                    <div class="pull-left">
                        <h6 class="mt-0 f-12 c-light mb-3">Alternate Email Address</h6>
                        <input v-if="edit.email" v-model="newEmail" type="text" class="form-controls" placeholder="Enter new Email Address">
                        <h5 v-if="!edit.email" class="mt-0 f-16 c-dark">{{personalInfo.email}}</h5>
                        <span v-if="errors.email" class="error">{{errors.email}}</span>
                    </div>
                   <a href="" v-if="!edit.email" class="pull-right c-bright-green f-12" style="line-height:25px;" @click.prevent="edit.email=true">Edit</a>
                    <a href="" v-if="edit.email" class="pull-right c-bright-green f-12" style="line-height:25px;" @click.prevent="updateEmail()">Save</a>
                </li>
            </ul>
        </div>
    </div> 
</template>

<script>
export default {
    props:['url', 'preloaded'],

    data() {
        return {
            user: {},
            personalInfo:{fname:'', mname:'', lname:''},
            newUsername:'',
            newPassword:'',
            newContactNo:'',
            newPasswordConfirm:'',
            newEmail:'',
            errors:{username:null,password:null, contact_no:null, email:null},
            edit: {
                username: false,
                password: false,
                contactNo: false,
                email: false,
            }
        }
    },

    methods: {
        updateUsername:function(){
            this.errors.username = null;
              axios.post(this.asset(this.url, 'myaccount/ajx/updateusername'), {
                   username:this.newUsername
                })
                .then(function (response) {
                    console.log(response.data)
                    if(response.data == 1){
                        this.user.username = this.newUsername;
                    }
                    this.edit.username=false;
                }.bind(this))
                .catch(function (error) {
                    if(error.response.data.errors.username){
                        this.errors.username = error.response.data.errors.username[0];
                    }
                }.bind(this));

        },
         updatePassword:function(){
            this.errors.password = null;
              axios.post(this.asset(this.url, 'myaccount/ajx/updatepassword'), {
                   password: this.newPassword,
                   password_confirmation: this.newPasswordConfirm
                })
                .then(function (response) {
                    this.edit.password=false;
                }.bind(this))
                .catch(function (error) {
                    if(error.response.data.errors.password){
                        this.errors.password = error.response.data.errors.password[0];
                    }
                }.bind(this));

        },
        updateContactNo: function(){
            this.errors.contact_no = null;
             axios.post(this.asset(this.url, 'myaccount/ajx/updatecontactno'), {
                   contact_number: this.newContactNo,
                   phone_id: this.personalInfo.phone_id
                })
                .then(function (response) {
                    this.edit.contactNo = false;
                    if(response.data == 1){
                        this.personalInfo.phone_number = this.newContactNo;
                    }
                }.bind(this))
                .catch(function (error) {
                    if(error.response.data.errors.contact_number){
                        this.errors.contact_no = error.response.data.errors.contact_number[0];
                    }
                }.bind(this));
        },

        updateEmail: function(){
            this.errors.email = null;
             axios.post(this.asset(this.url, 'myaccount/ajx/updateemail'), {
                   email: this.newEmail,
                   email_id: this.personalInfo.email_id
                })
                .then(function (response) {
                    this.edit.email = false;
                    if(response.data == 1){
                        this.personalInfo.email = this.newEmail;
                    }
                }.bind(this))
                .catch(function (error) {
                    if(error.response.data.errors.email){
                        this.errors.email = error.response.data.errors.email[0];
                    }
                }.bind(this));
        },
      
    },

    mounted() {
        this.user = JSON.parse(this.preloaded).user;
        this.personalInfo = JSON.parse(this.preloaded).personal_info;
    }
}
</script>

<style lang="scss" scoped>
    .error {
        color: tomato;
    }
</style>


