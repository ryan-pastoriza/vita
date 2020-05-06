<template>
    <div class="col-xs-3 s-pad bg-white no-padding">
        <div class="profile-area">
            <div class="profile-head">
                <img :src="asset(url, 'images/don.jpg')">
                <h5>{{data.personal_info.fname + " " + data.personal_info.mname.charAt(0) + ". " + data.personal_info.lname}}</h5>
                <h6>{{data.personal_info.prog_name}}</h6>
            </div>
        </div>
        <div class="profile-nav">
            <ul>
                <li>
                    <i class="fa fa-fw fa-user f-20 c-lighter pull-left"></i>
                    <a :href="asset(url, 'profile')" :class="navActive(nav, 'profile')">Profile</a>
                </li>
                <li>
                    <i class="fa fa-fw fa-briefcase f-20 c-lighter pull-left"></i>
                    <a :href="asset(url, 'jobs')">Jobs</a>
                </li>
                <li>
                    <i class="fa fa-fw fa-envelope f-20 c-lighter pull-left"></i>
                    <a :href="asset(url, 'inbox')">Inbox</a>
                </li>
                <li>
                    <i class="fa fa-fw fa-space-shuttle f-20 c-lighter pull-left"></i>
                    <a :href="asset(url, 'application')">Applications</a>
                </li>
                <li>
                    <i class="fa fa-fw fa-lock f-20 c-lighter pull-left"></i>
                    <a :href="asset(url, 'myaccount')">Accounts</a>
                </li>
                <li>
                    <i class="fa fa-fw fa-pencil-square f-20 c-lighter pull-left"></i>
                    <a href="#">Post</a>
                </li>
                <li>
                    <i class="fa fa-fw fa-mortar-board f-20 c-lighter pull-left"></i>
                    <a href="batch.html">Batch</a>
                </li>
                <li>
                    <i class="fa fa-fw fa-file-text f-20 c-lighter pull-left"></i>
                    <a href="tor.html">TOR</a>
                </li>
            </ul>
            <div class="profile-social">
                <img src="images/facebook-ico.png">
                <img src="images/twitter-ico.png">
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props:['url','nav','preload'],
    data(){
        return {
            data:{personal_info:{fname:'',mname:'',lname:''}},
        }
    },
    mounted(){
        this.data = JSON.parse(this.preload);
    }
}

</script>
