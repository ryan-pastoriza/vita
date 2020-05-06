<template>
    <div class="col-xs-6 s-pad">
        <div class="job-posted bg-white">
            <div class="posts-pane">
                <div v-for="feed in feeds">
                    <feed-job :url=url :id=feed.post_id v-if="feed.post_type=='job'"></feed-job>
                    <feed-ad :url=url :id=feed.post_id v-if="feed.post_type=='ad'"></feed-ad>
                    <feed-message :url=url :id=feed.post_id v-if="feed.post_type=='message'"></feed-message>
                </div>
                

                <!-- <div class="single-post">
                    <div class="single-post-head">
                        <img :src="asset('images/posts/mittallogo.png')" class="pull-left">
                        <div class="company-info pull-left">
                            <h6>MITTAL Solutions</h6>
                            <span>Butuan City, Agusan del Norte, 8600</span>
                        </div>
                        <span class="pull-right post-time">2 hrs ago</span>
                    </div>

                    <div class="single-post-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                        <div class="nice-not">
                            <a class="pull-right" href="#">- Not</a>
                            <a class="pull-right" href="#">+ Nice</a>		
                        </div>
                    </div>

                    <div class="single-post-footer">
                        <a href="#" class="comments-label">Comments</a>
                        <div class="comments-section">
                            
                        </div>	
                        <div class="post-box">
                            <img :src="asset('images/don.jpg')" class="pull-left">
                            <input type="text" class="pull-left">
                            <button class="pull-right">post</button>
                        </div>
                    </div>
                </div>

                <div class="single-post">
                    <div class="single-post-head">
                        <img :src="asset('images/posts/mittallogo.png')" class="pull-left">
                        <div class="company-info pull-left">
                            <h6>MITTAL Solutions</h6>
                            <span>Butuan City, Agusan del Norte, 8600</span>
                        </div>
                        <span class="pull-right post-time">3 days ago</span>
                    </div>

                    <div class="single-post-body">
                        <img :src="asset('images/posts/company-img1.png')" class="img-responsive">
                        <div class="nice-not">
                            <a class="pull-right" href="#">- Not</a>
                            <a class="pull-right" href="#">+ Nice</a>		
                        </div>
                    </div>

                    <div class="single-post-footer">
                        <a href="#" class="comments-label">Comments</a>
                        <div class="comments-section">
                            
                        </div>	
                        <div class="post-box">
                            <img :src="asset('images/don.jpg')" class="pull-left">
                            <input type="text" class="pull-left">
                            <button class="pull-right">post</button>
                        </div>
                    </div>
                </div>


                <div class="single-post" data-toggle="modal" data-target="#myModal">
                    <div class="single-post-head">
                        <img :src="asset('images/posts/mittallogo.png')" class="pull-left">
                        <div class="company-info pull-left">
                            <h6>MITTAL Solutions</h6>
                            <span>Butuan City, Agusan del Norte, 8600</span>
                        </div>
                        <span class="pull-right post-time">3 days ago</span>
                    </div>

                    <div class="single-post-body">
                        <img :src="asset('images/posts/company-img2.png')" class="img-responsive">
                        <div class="btn-apply">
                            <button class="btn-apply pull-right">Apply</button>
                        </div>
                        
                        <div class="nice-not">
                            <a class="pull-right" href="#">- Not</a>
                            <a class="pull-right" href="#">+ Nice</a>		
                        </div>
                    </div>

                    <div class="single-post-footer">
                        <a href="#" class="comments-label">Comments</a>
                        <div class="comments-section">
                            
                        </div>	
                        <div class="post-box">
                            <img :src="asset('images/don.jpg')" class="pull-left">
                            <input type="text" class="pull-left">
                            <button class="pull-right">post</button>
                        </div>
                    </div>
                </div>


                <div class="single-post">
                    <div class="single-post-head">
                        <img :src="asset('images/posts/mittallogo.png')" class="pull-left">
                        <div class="company-info pull-left">
                            <h6>MITTAL Solutions</h6>
                            <span>Butuan City, Agusan del Norte, 8600</span>
                        </div>
                        <span class="pull-right post-time">3 days ago</span>
                    </div>

                    <div class="single-post-body">
                        <div>
                            <h5>
                                <span>Position	: </span><a href="#" class="c-green">Database Administrator</a>
                            </h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.</p>
                            <h5>
                                <span>Salary	: </span><a href="#" class="c-green">PHP 30k - 50k</a>
                            </h5>
                        </div>
                        
                        <div class="btn-apply">
                            <button class="btn-apply pull-right">Apply</button>
                        </div>
                        
                        <div class="nice-not">
                            <a class="pull-right" href="#">- Not</a>
                            <a class="pull-right" href="#">+ Nice</a>		
                        </div>
                    </div>

                    <div class="single-post-footer">
                        <a href="#" class="comments-label">Comments</a>
                        <div class="comments-section">
                            <div class="single-post">
                                <div class="single-post-head">
                                    <img :src="asset('images/dale.jpg')" class="pull-left">
                                    <div class="company-info pull-left">
                                        <h6>Dale P. Blanco</h6>
                                        <span>Bachelor of Science in Information Technology</span>
                                    </div>
                                    <span class="pull-right post-time">5 mins ago</span>
                                </div>

                                <div class="single-post-body">
                                    <div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat.</p>
                                    </div>											
                                    <div class="nice-not">
                                        <a class="pull-right" href="#">- Not</a>
                                        <a class="pull-right" href="#">+ Nice</a>		
                                    </div>
                                </div>

                                <div class="single-post-footer hide">
                                    <a href="#" class="comments-label">Comments</a>
                                    <div class="comments-section">
                                        
                                    </div>	
                                    <div class="post-box">
                                        <img :src="asset('images/don.jpg')" class="pull-left">
                                        <input type="text" class="pull-left">
                                        <button class="pull-right">post</button>
                                    </div>
                                </div>
                            </div>
                        </div>	
                        <div class="post-box">
                            <img :src="asset('images/don.jpg')" class="pull-left">
                            <input type="text" class="pull-left">
                            <button class="pull-right">post</button>
                        </div>
                    </div>
                </div> -->


            </div>
        </div>
    </div>
</template>


<script>
export default {
    props:['url'],

    data(){
        return {
            feeds:[],
        }
    },

    methods:{

        fetchFeed:function(){
            $.get(this.asset('dashboard/ajx/fetchfeed'),function(data){
                this.feeds = data;
            }.bind(this));
        },

        asset:function(url){
            return this.url + url;
        },
    },

    mounted(){
        this.fetchFeed();
    }
}
</script>