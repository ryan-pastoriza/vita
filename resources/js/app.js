/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import './helpers/helper.js'
import './model/model.js'
import './mixins/Mixin.js'
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('top-nav', require('./components/TopNav.vue').default);
Vue.component('left-nav', require('./components/LeftNav.vue').default);
Vue.component('vita-profile', require('./components/profile/VitaProfile.vue').default);
Vue.component('app-personalinfo', require('./components/profile/AppPersonalInfo.vue').default);
Vue.component('personalinfo-modal', require('./components/profile/AppPersonalInfoModal.vue').default);

Vue.component('app-familyinfo', require('./components/profile/AppFamilyInfo.vue').default);
Vue.component('familyinfo-modal', require('./components/profile/AppFamilyModal.vue').default);
Vue.component('app-education', require('./components/profile/AppEducation.vue').default);
Vue.component('education-modal', require('./components/profile/AppEducationModal.vue').default);
Vue.component('app-eligibility', require('./components/profile/AppEligibility.vue').default);
Vue.component('eligibility-modal', require('./components/profile/AppEligibilityModal.vue').default);
Vue.component('app-workexperience', require('./components/profile/AppWorkExperience.vue').default);
Vue.component('workexperience-modal', require('./components/profile/AppWorkExperienceModal.vue').default);
Vue.component('app-service', require('./components/profile/AppService.vue').default);
Vue.component('service-modal', require('./components/profile/AppServiceModal.vue').default);

Vue.component('vita-jobs', require('./components/jobs/VitaJobs.vue').default);
Vue.component('app-jobs', require('./components/jobs/AppJobs.vue').default);
Vue.component('app-recommendedjobs', require('./components/jobs/AppRecommendedJobs.vue').default);

Vue.component('app-inbox', require('./components/inbox/AppInbox.vue').default);


Vue.component('newsfeed', require('./components/newsfeed/NewsFeed.vue').default);
Vue.component('feed-ad', require('./components/newsfeed/FeedAd.vue').default);
Vue.component('feed-job', require('./components/newsfeed/FeedJob.vue').default);
Vue.component('feed-message', require('./components/newsfeed/FeedMessage.vue').default);

Vue.component('app-application', require('./components/application/AppApplication.vue').default);
Vue.component('app-myaccount', require('./components/myaccount/AppMyaccount.vue').default);

Vue.component('app-recentalumnus', require('./components/sidebar/AppRecentAlumnus.vue').default);
Vue.component('app-partners', require('./components/sidebar/AppPartners.vue').default);
Vue.component('app-ads', require('./components/sidebar/AppAds.vue').default);

Vue.component('app-help', require('./components/help/AppHelp.vue').default);

Vue.component('company-topnav', require('./components/company/CompanyTopNav.vue').default);
Vue.component('company-leftnav', require('./components/company/CompanyLeftNav.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
