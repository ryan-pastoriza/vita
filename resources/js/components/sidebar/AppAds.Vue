<template>
    <div class="ads-pane">
        <h5>Vita Members Ads</h5>
        <ul>
            <li v-for="ad in ads"><a href="#"><img :src="asset(url, ad.file)" class="img img-responsive"></a></li>
        </ul>
    </div>
</template>

<script>
export default {
    props:['url', 'data'],

    data(){
        return {
            ads:[],
        }
    },

    methods: {

    },

    mounted(){
        this.ads = JSON.parse(this.data);
    }
}
</script>

