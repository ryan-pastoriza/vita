<template>
    <div class="col-md-9 s-pad">
        <div class="p-head bg-white">
            <div class="row">
                <div class="col-xs-3">
                    <img src="images/don.jpg" class="img img-responsive" alt="">
                </div>
                <div class="col-xs-9 s-pad">
                    <div class="p-top">
                        <h3 class="pull-left">{{alumnus.fname + " " + alumnus.mname.charAt(0) + ". " + alumnus.lname}}</h3>
                        <img src="images/profile/edit.png" class="pull-right" alt="">
                    </div>
                    <div class="p-mid">
                        <h6 class="c-green pull-left">Graduate: </h6>
                        <div class="p-mid-right pull-left">
                            <h6>{{alumnus.prog_name}}</h6>
                            <span>Student Id No: <span class="c-green">{{alumnus.stud_id}}</span></span><br>
                            <span>Batch <span>{{alumnus.sch_year}}</span></span><br>
                            <span>Date Graduated: <span>March 30, 2015</span></span>
                        </div>
                    </div>
                    <div class="p-bot">
                        <!-- <button class="btn btn-success btn-prime btn-sm pull-left">Improve your profile</button> -->
                        <div class="p-bot-right pull-right">
                            <p class="c-green t-right no-margin">{{batchCount}}</p>
                            <span class="c-light f-10 no-margin no-padding">batch mates</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="inbox bg-white p-15">
            <ul>
                <li class="mr-15">Inbox</li>
                <li class="mr-24">
                    <a @click.prevent="selectAll()" href="#" class="rpb mr-10">Select All</a><a @click.prevent="deleteMesseges()" href="#">Delete</a>
                </li>
                <li>
                    <span v-if="inbox.length > 15" class="rpb mr-10 c-bright-green">1-{{inbox.length}} of {{inbox.lenth}}</span>
                    <span v-if="inbox.length < 16" class="rpb mr-10 c-bright-green">1-{{inbox.length}} of {{inbox.length}}</span>
                    <a href="#" class="rpb mr-10 f-16 bold">{{newMessage()}} <span class="c-lighter f-12 normal">New Messages</span></a>
                </li>
                <li><a href="#" class="rpb mr-10 f-16 bold">{{readMessages()}} <span class="c-lighter f-12 normal">Read Messages</span></a></li>
                <li class="mr-15"><a href="#" class="mr-10 f-16 bold">{{newMessage()}} <span class="c-lighter f-12 normal">Unread Messages</span></a></li>
                <li>
                    <input v-model="searchQuery" type="text" placeholder="search"><button class="fa fa-search"></button>
                </li>
            </ul>
            
            <table class="table table-striped">
                <tbody>
                    <tr v-for="i in inbox" v-if="search(i)">
                        <td>
                            <input type="checkbox" v-model="i.checked" class="no-margin">
                        </td>
                        <td><a @click.prevent="readMessage(i)" data-toggle="modal" data-target="#mailDetails" href="#">{{i.company_name}}</a></td>
                        <td><a href="#" class="c-dark" data-toggle="modal" data-target="#inboxMessageModal">{{i.subject}}</a></td>
                        <td class="c-light">01:00 PM - Monday, May 2, 2017</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- ::::::::::::::: MODAL :::::::::::::::::::: -->

        <div id="mailDetails" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content box-edge">
                        <div class="modal-body" style="padding-top:0;overflow:hidden">
                           <div class="head">
                               <img :src="asset(url, currentMessage.logo)" alt="">
                               <div class="company">
                                   <h5>Company:</h5>
                                   <h4>{{currentMessage.company_name}}</h4>
                               </div>
                           </div>
                           <div class="body">
                               <div class="message-content">
                                   <div class="subject">
                                       <span>Subject:</span>
                                       <h3>{{currentMessage.subject}}</h3>
                                       <span>{{currentMessage.mail_date}}</span>
                                   </div>
                                   <p class="message">{{currentMessage.message}}</p>
                               </div>
                               <div class="replies">
                                   <div class="reply" v-for="reply in currentMessage.replies.replies">
                                       <div class="reply-head">
                                           <h4 class="sender" :class="senderStyle(reply)">{{replyHeader(reply)}}</h4>
                                           <span class="date-sent">{{reply.reply_date}}</span>
                                           <span class="time-sent">{{reply.reply_time}}</span>
                                       </div>
                                       <div class="message">
                                           <p>{{reply.reply}}</p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="footer">
                               <textarea v-model="reply" name="" id="" cols="30" rows="10"></textarea>
                               <button @click="sendReply()" class="btn btn-success btn-prime">Send Reply</button>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    
</template>


<script>
export default {
    props:['url', 'data'],
    data(){
        return {
            inbox:[],
            currentMessage:{logo:'', company_name:'', subject:'', replies:{replies:[]}},
            alumnus:{mname:''},
            batchCount:'',
            searchQuery:'',
            reply:'',
        }
    },
    methods: {
        newMessage:function(){
            let unread = 0;
            for(let i in this.inbox){
                if(this.inbox[i].unread){
                    unread++;
                }
            }
            return unread;
        },
         readMessages:function(){
            let read = 0;
            for(let i in this.inbox){
                if(!this.inbox[i].unread){
                    read++;
                }
            }
            return read;
        },
        readMessage:function(message){
            this.currentMessage = message;
            if(this.currentMessage.unread){
                axios.post(this.asset(this.url, 'ajxsetreadmessage'), {id:this.currentMessage.template_id})
                .then(function (response) {
                    response.data? this.currentMessage.unread = 0 : '';
                }.bind(this));
            }
           
        },
        deleteMesseges:function(){
            let toDelete = [];
            this.inbox.map(function(val){
                val.checked? toDelete.push(val.template_id) : '';
            });
            if(toDelete.length > 0){
                $.get(this.asset(this.url, 'inbox/delete'),{data:toDelete}, function(data){
                    this.fetchInbox();
                }.bind(this));
            }
        },
        selectAll:function(){
            this.inbox.map(function(val){
                val.checked = !val.checked;
            });
        },
        fetchInbox:function(){
            $.get(this.asset(this.url, 'inbox/all'), function(data){
                this.inbox = data;
            }.bind(this));              
        },
        search:function(inbox){
            if(this.searchQuery.length > 3){
                if(inbox.subject.toLowerCase().includes(this.searchQuery.trim()) || inbox.company_name.toLowerCase().includes(this.searchQuery.trim())){
                    return true;
                }else{
                    return false;
                }
            }
            return true
        },
        replyHeader:function(reply){
            if(reply.student_from){
                return "My Reply";
            }else {
                return this.currentMessage.company_name;
            }
        },
        senderStyle:function(reply){
             if(reply.student_from){
                return "";
            }else {
                return 'mint-green';
            }
        },
        sendReply:function(){
            let toSend = {reply:this.reply, sender:this.alumnus.ssi_id, message_id:this.currentMessage.template_id, company_id:this.currentMessage.company_id};
            if(this.reply.trim().length > 0){
                $.get(this.asset(this.url, 'inbox/savereply'), toSend, function(data){
                    this.fetchInbox();
                    this.reply = "";
                    document.getElementById('mailDetails').click();
                }.bind(this));    
            }
        }
    },
    mounted(){
        this.inbox = JSON.parse(this.data).inbox;
        this.alumnus = JSON.parse(this.data).personal_info;
        this.batchCount = JSON.parse(this.data).batch;
    }
}
</script>

<style lang="scss" scoped>
    .modal-body {
        padding: 24px;
        .head {
            height: 65px;
            border-bottom: 1px solid rgba($color: #000000, $alpha: .1);
            display: flex;
            align-items: center;
            img {
                height: 60px;
                width: auto;
                margin-right: 16px;
            }
            .company {
                border-left: 1px solid rgba($color: #000000, $alpha: .1);
                padding-left: 16px;
                h4, h5 {
                    margin: 0!important;
                    font-size: 16px;
                    color: rgba($color: #000000, $alpha: .6);
                }
                h4 {
                    font-weight: normal;
                }
                h5 {
                    margin-bottom: 3px!important;
                    font-size: 13px;
                }
            }
        }
        .message-content {
            padding: 25px 0;
            .subject {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
                color: #555;
                h3 {
                    margin: 0!important;
                    font-size: 14px;
                    font-weight: bold;
                    margin-right: 10px;
                }
                span {
                    &:first-child {
                        margin-right: 5px;
                    }
                    &:last-child {
                        margin-left: 15px;
                        color: #aaa;
                    }
                }
            }
            .message {
                color: #444;
                padding: 16px;
                background-color: #eee;
            }
        }
        .replies {
            padding-left: 65px;
            .reply {
                margin-bottom: 35px;
                .reply-head {
                    display: flex;
                    align-items: center;
                    margin-bottom: 9px;
                    h4 {
                        margin: 0!important;
                        font-size: 14px;
                        color: #555;
                        font-weight: bold;
                        margin-right: 14px!important;
                        line-height: 0;
                        &.message-sender {
                            color: #008C8C;
                        }
                    }
                    span {
                        font-size: 12px;
                        color: #aaa;
                        margin-right: 10px;
                        line-height: 12px;
                    }
                }
                .message {
                    color: #777;
                }
            }
        }
    }

    .mint-green {
        color: #008C8C!important;
    }

    .footer {
        textarea {
            width: 100%;
            resize: none;
        }
        button {
            float: right;
        }
    }
</style>

