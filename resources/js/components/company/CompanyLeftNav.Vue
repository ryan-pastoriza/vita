<template>
    <ul style="padding-left: 45px;">
        <li :class="navActive(nav, 'business_information')">
            <i class="fa fa-fw fa-briefcase f-20 c-lighter pull-left"></i>
            <a :href="asset(url, 'profile/business_information')">Business Information</a>
        </li>
        <li :class="navActive(nav, 'address')">
            <i class="fa fa-fw fa-tag f-20 c-lighter pull-left"></i>
            <a :href="asset(url, 'profile/address')">Address</a>
        </li>
        <li :class="navActive(nav, 'contacts')">
            <i class="fa fa-fw fa-envelope f-20 c-lighter pull-left"></i>
            <a :href="asset(url, 'profile/contacts')">Contacts</a>
        </li>
        <li :class="navActive(nav, 'mission')">
            <i class="fa fa-fw fa-pencil-square f-20 c-lighter pull-left"></i>
            <a :href="asset(url, 'profile/mission')">Mission Vision Goals</a>
        </li>
        <li :class="navActive(nav, 'help')">
            <i class="fa fa-fw fa-pencil-square f-20 c-lighter pull-left"></i>
            <a :href="asset(url, 'profile/help')">Help</a>
        </li>
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