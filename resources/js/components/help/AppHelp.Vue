<template>
    <div class="s-pad" :class="width">
        <div class="help bg-white p-15" style="height:1848px;">
            <h4 v-if="!help" class="mt-0 c-bright-green border-bot pb-10 mb-24">Help</h4>
            <div v-if="help" class="heading border-bot" style="margin:0 0 20px 0;padding-bottom:16px;display:flex;align-items:center;justify-content:space-between;">
                <h4 class="mt-0 c-bright-green">Help</h4>
                <div class="update-info" style="position:relative;margin-top:0;">
                    <img :src="asset(url, 'images/profile/pencil.png')" style="margin-top:0" alt="" class="pull-left">
                    <a :href="asset(url, 'profile/help/update')" class="f-10 c-green pull-left" style="margin-top:3px;">Update your information</a>
                </div>
            </div>
            <div class="help-item" v-for="help in helps" :key="help.help_id">
                <div class="head p-10 oh" @click="help.visible=!help.visible">
                    <h5 class="pull-left mt-0 c-bright-green">{{help.title}}</h5>
                    <i class="fa fa-angle-down pull-right c-sdark"></i>
                </div>
                <div class="body" v-if="help.visible">
                    <p>
                        {{help.content}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['preloaded', 'url', 'width', 'help'],

    data() {
        return {
            helps:[],
            link: '',
        }
    },

    methods: {

    },

    mounted() {
        this.helps = JSON.parse(this.preloaded);
    }
}
</script>

<style lang="scss" scoped>
    div.head {
        cursor: pointer;
    }
</style>