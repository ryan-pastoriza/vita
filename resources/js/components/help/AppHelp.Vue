<template>
    <div class="col-md-9 s-pad">
        <div class="help bg-white p-15" style="height:1848px;">
            <h3 class="mt-0 c-bright-green border-bot p-bot-10 mb-15">Help</h3>
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
    props:['preloaded', 'url'],

    data() {
        return {
            helps:[],
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