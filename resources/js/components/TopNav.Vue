<template>
    <ul class="pull-left">
        <li><a :href="asset(url,'')" :class="navActive(nav,'dashboard')">Dashboard</a></li>
        <li><a :href="asset(url,'profile')" :class="navActive(nav,'profile')">Profile</a></li>
        <li><a :href="asset(url,'jobs')" :class="navActive(nav,'jobs')">Jobs</a></li>
        <li><a :href="asset(url,'inbox')" :class="navActive(nav,'inbox')">Inbox</a></li>
        <li><a :href="asset(url,'tor')" :class="navActive(nav,'tor')">Transcript of Records</a></li>
        <li><a :href="asset(url,'application')" :class="navActive(nav,'application')">Application</a></li>
        <li><a :href="asset(url,'myaccount')" :class="navActive(nav,'myaccount')">My Account</a></li>
        <li><a :href="asset(url,'aboutus')" :class="navActive(nav,'aboutus')">About Us</a></li>
        <li><a :href="asset(url,'help')" :class="navActive(nav,'help')">Help</a></li>
        <!-- <li><a :href="asset(url,'download')" :class="navActive(nav,'download')">Download</a></li> -->
    </ul>
</template>

<script>

export default {
    props:['url','nav']
}

</script>

