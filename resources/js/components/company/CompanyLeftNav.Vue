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
        <li>
            <i class="fa fa-fw fa-envelope f-20 c-lighter pull-left"></i>
            <a href="contacts.html">Contacts</a>
        </li>
        <li>
            <i class="fa fa-fw fa-pencil-square f-20 c-lighter pull-left"></i>
            <a href="mission_vision.html">Mission Vision Goals</a>
        </li>
        <li>
            <i class="fa fa-fw fa-question-circle f-20 c-lighter pull-left"></i>
            <a href="help.html">Help</a>
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