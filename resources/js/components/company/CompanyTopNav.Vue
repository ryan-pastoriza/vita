<template>
    <ul class="pull-left">
        <!-- <li><a href="index.html" class="active">Dashboard</a></li> -->
        <li><a :href="asset(url, '')" :class="navActive(nav, 'dashboard')">Dashboard</a></li>
        <li><a :href="asset(url, 'profile/business_information')" :class="navActive(nav, 'profile')">Profile</a></li>
        <li><a href="#">Post Job</a></li>
        <li><a href="#">Applicants</a></li>
    </ul>
</template>

<script>
export default {
    props:['url', 'nav'],

    data(){
        return {

        }
    },
}
</script>