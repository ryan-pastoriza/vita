<template>   
    <div class="recent-graduates mb-15 border-bot pb-15">
        <h5><span class="c-green">ACLC</span> RECENT GRADUATES</h5>
        <div v-if="alumnus.length > 5" class="grad-carousel">
            <span class="fa fa-chevron-left cnav-prev"></span>								
            <div class="owl-carousel g-carousel">
                <div v-for="al in alumnus" class="owl-content"> <img :src="asset('images/don.jpg')"> </div>
            </div>
            <div class="grad-info">
                <h5>{{currentAlumnus.fullname}}</h5>
                <h6><span class="c-green">Graduate: </span>{{currentAlumnus.prog_name}}</h6>
            </div>
            <span class="fa fa-chevron-right cnav-next"></span>
        </div>
        <div v-if="alumnus.length < 5">
            <div class="recent-grad-flex">
                <img @click="currentAlumnus=al" v-for="al in alumnus" :key="al.spi_id" :src="asset('images/blankuser.png')" :class="isActive(al)" alt="">
            </div>
            <div class="grad-info">
                <h5>{{currentAlumnus.fullname}}</h5>
                <h6><span class="c-green">Graduate: </span>{{currentAlumnus.prog_name}}</h6>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    props:['url'],

    data(){
        return {
            alumnus:[],
            currentAlumnus:{},
        }
    },

    methods: {
        isset:function(){
            $.get(this.asset('ajx/recentalumnus'), function(data){
                this.alumnus = data;
                if(data.length > 0){
                    this.currentAlumnus = data[0];
                }
            }.bind(this));
        },

        asset:function(url){
            return this.url + url;
        },

        isActive:function(al){
            if(al.ssi_id == this.currentAlumnus.ssi_id){
                return "owl-content active";
            }
            return "owl-content";
        },
    },

    mounted(){
        this.isset();
    }
}
</script>

<style lang="scss" scoped>
    .recent-grad-flex {
        display: flex!important;
    }
    .recent-grad-flex img {
        width: 40px!important;
        margin-right: 2px;
    }

    .owl-content {
        cursor: pointer;
    }

    .owl-content.active,
    .owl-content.active:hover {
        border: 1px solid #3BA4A4;
    }

</style>