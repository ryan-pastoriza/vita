<template>
    <div class="partners-pane">
        <h5>Partners</h5>
        <ul>
            <li v-for="p in partners"><a href="#"><img :src="asset(url, p.logo)" class="img img-responsive"></a></li>
        </ul>
    </div>
</template>

<script>
export default {
    props:['url', 'data'],

    data(){
        return {
            partners:[],
        }
    },

    methods: {

    },

    mounted(){
        this.partners = JSON.parse(this.data);
    }
}
</script>

