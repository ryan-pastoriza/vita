<template>
    <div>
         <div class="personal-info">
                <div class="head">
                    <h6 class="no-padding no-margin">Eligibility</h6>
                </div>
                <div class="body">
                    <table class="table no-border info-table">
                        <thead>
                            <tr>
                                <th class="f-11 c-light nopad-bot">Eligibilities</th>
                                <th class="f-11 c-light nopad-bot">Rank</th>
                                <th class="f-11 c-light nopad-bot">Uploaded Certificates</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="el in eligibilities">
                            <td class="c-dark">{{el.type}}</td>
                            <td class="c-dark">{{el.rating}}</td>
                            <td class="f-11 c-green">Preview</td>
                        </tr>
                        </tbody>
                    </table>
                    
                </div>
                <div class="footer">
                    <div class="see-more">
                        <span class="f-10 c-dark"></span>
                    </div>
                    <div class="update-info">
                        <img src="images/profile/pencil.png" alt="" class="pull-left">
                        <a class="f-10 c-green pull-left" data-toggle="modal" data-target="#eligibilityModal">Update your eligibility information</a>
                    </div>
                </div>
            </div>

            <!-- :::::::::::: MODAL ::::::::::::::::  -->

            <eligibility-modal :url="url" :data="preLoaded.personal_info.spi_id" :elig="elig"></eligibility-modal>
    </div>
    
</template>


<script>
export default {
    props:['url', 'data'],

     data(){
        return {
            preLoaded:{personal_info:{spi_id:''}},
            eligibilities:[],
            elig:null,
        }
    },

    methods: {
        fetchEligibilities:function(){
            $.get(this.asset(this.url, 'ajxgeteligibilities'), {id:JSON.parse(this.data).personal_info.spi_id}, function(data){
                this.eligibilities = data;
                // console.log(data);
            }.bind(this));
        }
    },

    watch: {
        'data':function(){
            this.fetchEligibilities();
            this.preLoaded = JSON.parse(this.data);
        }
    },

    mounted(){
        this.fetchEligibilities();
        this.preLoaded = JSON.parse(this.data);
    }
}
</script>

