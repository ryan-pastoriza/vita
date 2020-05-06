<template>
     <div class="single-post">
        <div class="single-post-head">
            <img :src="asset(url, feed.company.logo)" class="pull-left">
            <div class="company-info pull-left">
                <h6>{{feed.company.company_name}}</h6>
                <span>{{feed.company.address}}</span>
            </div>
            <span class="pull-right post-time">{{feed.carbon}}</span>
        </div>

        <div class="single-post-body">
              
            <img :src="asset(url, 'images/posts/company-img1.png')" class="img-responsive mb-15" v-if="feed.img">

            <p>{{feed.post_content}}</p>

            <div class="nice-not">
                <a class="pull-right" href="#">- Not</a>
                <a class="pull-right" href="#">+ Nice</a>		
            </div>

        </div>

        <div class="single-post-footer">
            <a href="#" class="comments-label">Comments</a>
            <div class="comments-section">
                <div v-for="reply in feed.replies" class="single-post">
                    <div class="single-post-head">
                        <img :src="asset(url, 'images/blankuser.png')" class="pull-left img-circle">
                        <div class="company-info pull-left">
                            <h6>{{reply.fname + " " + reply.mname.charAt(0) + ". " + reply.lname}}</h6>
                            <span>{{reply.prog_name}}</span>
                        </div>
                        <span class="pull-right post-time">{{reply.reply_date}}</span>
                    </div>

                    <div class="single-post-body">
                        <div>
                            <p>{{reply.content}}</p>
                        </div>											
                        <div class="nice-not">
                            <a class="pull-right" href="#">- Not</a>
                            <a class="pull-right" href="#">+ Nice</a>		
                        </div>
                    </div>
                </div>
            </div>	
            <div class="post-box">
                <img :src="asset(url, 'images/blankuser.png')" class="pull-left">
                <input v-model="reply" @keyup="postIt($event)" type="text" class="pull-left">
                <button @click="saveReply()" class="pull-right">post</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['url', 'id'],
    data(){
        return {
            feed:{company:{logo:''}, replies:[]},
            reply:'',
        }
    },
    methods:{
        fetchFeed:function(){
            $.get(this.asset(this.url, 'dashboard/ajx/singlefeed'), {id:this.id}, function(data){
                this.feed = data;
            }.bind(this));
        },

        postIt:function(e){
            if(e.keyCode == 13 && this.reply.length > 0){
                this.saveReply();
            }
        },

        saveReply:function(){
            if(this.reply.length > 0){
                axios.post(this.asset(this.url, 'dashboard/ajx/postreply'), {
                    id:this.feed.post_id,
                    reply:this.reply,
                })
                .then(function (response) {
                    this.feed.replies = response.data;
                    this.reply = '';
                }.bind(this))
                .catch(function (error) {
                    console.log(error);
                }.bind(this));
            }
        },
        
    },
    mounted(){
        this.fetchFeed();
    }
}
</script>