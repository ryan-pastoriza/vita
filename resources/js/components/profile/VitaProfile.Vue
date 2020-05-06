<template>
    <div class="col-md-9 s-pad">
        <div>
            <div class="p-head bg-white">
                <div class="row">
                    <div class="col-xs-3">
                        <img src="images/don.jpg" class="img img-responsive" alt="">
                    </div>
                    <div class="col-xs-9 s-pad">
                        <div class="p-top">
                            <h3 class="pull-left">{{put(preLoaded.personal_info.fname) + " " + preLoaded.personal_info.mname.charAt(0) + ". " + preLoaded.personal_info.lname}}</h3>
                            <img src="images/profile/edit.png" class="pull-right" alt="">
                        </div>
                        <div class="p-mid">
                            <h6 class="c-green pull-left">Graduate: </h6>
                            <div class="p-mid-right pull-left">
                                <h6>{{preLoaded.personal_info.prog_name}}</h6>
                                <span>Student Id No: <span class="c-green">{{preLoaded.personal_info.stud_id}}</span></span><br>
                                <span>Batch <span>{{preLoaded.personal_info.sch_year}}</span></span><br>
                                <span>Date Graduated: <span>March 30, 2015</span></span>
                            </div>
                        </div>
                        <div class="p-bot">
                            <button class="btn btn-success btn-prime btn-sm pull-left">Improve your profile</button>
                            <div class="p-bot-right pull-right">
                                <p class="c-green t-right no-margin">142</p>
                                <span class="c-light f-10 no-margin no-padding">batch mates</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <app-personalinfo :url="url" :data="data"></app-personalinfo>

            <app-familyinfo :url="url" :data="data"></app-familyinfo>

            <app-education :url="url" :data="data"></app-education>
           
            <app-eligibility :url="url" :data="data"></app-eligibility>

            <app-workexperience :url="url" :data="data"></app-workexperience>

            <app-service :url="url" :data="data"></app-service>

            
                       


            <div class="personal-info">
                <div class="head">
                    <h6 class="no-padding no-margin">Trainings & Certificates</h6>
                </div>
                <div class="body">
                    <table class="table no-border info-table">
                        <thead>
                            <tr>
                                <th class="f-11 c-light nopad-bot">Training</th>
                                <th class="f-11 c-light nopad-bot">Date</th>
                                <th class="f-11 c-light nopad-bot">Location</th>
                                <th class="f-11 c-light nopad-bot">Certificates</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="c-dark">Computer Security Training</td>
                                <td class="c-dark">May 23, 2017</td>
                                <td class="c-dark">ACLC Butuan City Philippines</td>
                                <td class="c-dark"><a href="#" class="f-11 c-green">Preview</a></td>
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
                        <a class="f-10 c-green pull-left" data-toggle="modal" data-target="#trainingcertModal">Update your TC information</a>

                    </div>
                </div>
            </div>


            <div class="personal-info">
                <div class="head">
                    <h6 class="no-padding no-margin">Affiliations</h6>
                </div>
                <div class="body">
                    <table class="table no-border info-table">
                        <thead>
                            <tr>
                                <th class="f-11 c-light nopad-bot">Organization</th>
                                <th class="f-11 c-light nopad-bot">Position</th>
                                <th class="f-11 c-light nopad-bot">Years</th>
                                <th class="f-11 c-light nopad-bot">Years Span</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="c-dark">ROTARACT</td>
                                <td class="c-dark">Member</td>
                                <td class="c-dark">2015-2016</td>
                                <td class="c-dark"><a href="#" class="f-11 c-green">1</a></td>
                            </tr>
                            <tr>
                                <td class="c-dark">Senior Finance Executive</td>
                                <td class="c-dark">Secretary</td>
                                <td class="c-dark">2015-2016</td>
                                <td class="c-dark"><a href="#" class="f-11 c-green">1</a></td>
                            </tr>
                            <tr>
                                <td class="c-dark">Junior Economists & Guidance Counselors Society</td>
                                <td class="c-dark">Secretary</td>
                                <td class="c-dark">2015-2016</td>
                                <td class="c-dark"><a href="#" class="f-11 c-green">1</a></td>
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
                        <a class="f-10 c-green pull-left" data-toggle="modal" data-target="#affiliationsModal">Update your affiliations</a>

                    </div>
                </div>
            </div>


            <div class="personal-info">
                <div class="head">
                    <h6 class="no-padding no-margin">Awards / Recognition</h6>
                </div>
                <div class="body">
                    <table class="table no-border info-table">
                        <thead>
                            <tr>
                                <th class="f-11 c-light nopad-bot">Awards / Recognition</th>
                                <th class="f-11 c-light nopad-bot">Date Received</th>
                                <th class="f-11 c-light nopad-bot">Events</th>
                                <th class="f-11 c-light nopad-bot">Uploaded Certificates</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="c-dark">Deans List</td>
                                <td class="c-dark">1st Sem (2016-2017)</td>
                                <td class="c-dark">2017th Closing Exercises</td>
                                <td class="c-dark"><a href="#" class="f-11 c-green">Preview</a></td>
                            </tr>
                            <tr>
                                <td class="c-dark">Presidential Awardee</td>
                                <td class="c-dark">March 23, 2017</td>
                                <td class="c-dark">2017th Closing Exercises</td>
                                <td class="c-dark"><a href="#" class="f-11 c-green">Preview</a></td>
                            </tr>
                            <tr>
                                <td class="c-dark">Leadership Awardee</td>
                                <td class="c-dark">March 23, 2017</td>
                                <td class="c-dark">2017th Closing Exercises</td>
                                <td class="c-dark"><a href="#" class="f-11 c-green">Preview</a></td>
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
                        <a class="f-10 c-green pull-left" data-toggle="modal" data-target="#awardsModal">Update awards / recognition</a>

                    </div>
                </div>
            </div>


            <div class="personal-info">
                <div class="head">
                    <h6 class="no-padding no-margin">Skills</h6>
                </div>
                <div class="body">
                    <ul class="skills-list">
                        <li>Programming/Application Development</li>
                        <li>Project Management</li>
                        <li>Help Desk/Technical Support</li>
                        <li>Web Development</li>
                        <li>Database Administration</li>
                        <li>Security/Compliance Governance</li>
                        <li>Business Intelligence Analytics</li>
                        <li>Systems Analyst</li>
                    </ul>
                </div>
                <div class="footer">
                    <div class="see-more">
                        <span class="f-10 c-dark"></span>
                    </div>
                    <div class="update-info">
                        <img src="images/profile/pencil.png" alt="" class="pull-left">
                        <a class="f-10 c-green pull-left" data-toggle="modal" data-target="#skillsModal">Update your skills information</a>

                    </div>
                </div>
            </div>


            <div class="personal-info">
                <div class="head">
                    <h6 class="no-padding no-margin">Refference</h6>
                </div>
                <div class="body">
                    <table class="table no-border info-table">
                        <thead>
                            <tr>
                                <th class="f-11 c-light nopad-bot">Name</th>
                                <th class="f-11 c-light nopad-bot">Designation</th>
                                <th class="f-11 c-light nopad-bot">Company</th>
                                <th class="f-11 c-light nopad-bot">Mobile / Telephone #</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="c-dark">Abagnale, Frank</td>
                                <td class="c-dark">Senior Marketing Specialist</td>
                                <td class="c-dark">Accenture Ventures</td>
                                <td class="c-dark">341-9568 / 225-9865</td>
                            </tr>
                            <tr>
                                <td class="c-dark">Johnson, Adam</td>
                                <td class="c-dark">Senior Marketing Specialist</td>
                                <td class="c-dark">Accenture Ventures</td>
                                <td class="c-dark">341-9568 / 225-9865</td>
                            </tr>
                            <tr>
                                <td class="c-dark">Thompson, Kyle</td>
                                <td class="c-dark">Senior Marketing Specialist</td>
                                <td class="c-dark">Accenture Ventures</td>
                                <td class="c-dark">341-9568 / 225-9865</td>
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
                        <a class="f-10 c-green pull-left" data-toggle="modal" data-target="#refferenceModal">Update your refferences</a>

                    </div>
                </div>
            </div>


            <div class="personal-info">
                <div class="head">
                    <h6 class="no-padding no-margin">Social Media</h6>
                </div>
                <div class="body">
                    <ul>
                        <li style="width:100%">
                            <h6 class="c-light f-12">Facebook URL</h6>
                            <a href="" class="c-green">http://www.facebook.com/dondondon</a>
                        </li>
                        <li style="width:100%">
                            <h6 class="c-light f-12">Twitter URL</h6>
                            <a href="" class="c-green">http://www.twitter.com/dondondon</a>
                        </li>
                    </ul>
                </div>
                <div class="footer">
                    <div class="see-more">
                        <span class="f-10 c-dark"></span>
                    </div>
                    <div class="update-info">
                        <img src="images/profile/pencil.png" alt="" class="pull-left">
                        <a class="f-10 c-green pull-left" data-toggle="modal" data-target="#refferenceModal">Update your social media</a>

                    </div>
                </div>
            </div>


        </div>
        
        
        
            


            <!-- :::::::::::::::::::::::::::::::::::::::::::::::::::: FAMILY INFORMATION :::::::::::::::::::::::::::::::::::::::::::::::::: -->



            <!-- :::::::::::::::::::::::::::::::::::::::::::::::::::: ELIGIBILITY INFORMATION :::::::::::::::::::::::::::::::::::::::::::::::::: -->

            


            <!-- :::::::::::::::::::::::::::::::::::::::::::::::::::: EDUCATION INFORMATION :::::::::::::::::::::::::::::::::::::::::::::::::: -->





            <!-- :::::::::::::::::::::::::::::::::::::::::::::::: WORK EXPERIENCE INFORMATION :::::::::::::::::::::::::::::::::::::::::::::::: -->



            <!-- :::::::::::::::::::::::::::::::::::::::::::::::::: TRAININGS & CERTIFICATES :::::::::::::::::::::::::::::::::::::::::::::::::: -->

            <div id="trainingcertModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content box-edge">
                        <div class="modal-head">
                            <div class="border-bot" style="padding:16px 0;">
                                <h6 class="reset c-dark">Eligibility Information</h6>
                            </div>
                        </div>   	
                        <div class="modal-body" style="padding-top:0;overflow:hidden">
                            <ul class="p-infolist">
                                <li>
                                    <h6 class="f-11 c-light mb-3">Training</h6>
                                    <input type="text" style="width:300px;">
                                </li>
                                <li style="margin-right:0">
                                    <h6 class="f-11 c-light mb-3">Location</h6>
                                    <input type="text" style="width:453px;">
                                </li>
                                <li style="margin-right:0">
                                    <h6 class="f-11 c-light mb-3">Date</h6>
                                    <input type="text" style="width:200px;">
                                </li>
                                <li class="border-bot p-bot-10" style="width:100%;">
                                    <h6 class="f-11 c-light mb-3">Certificates</h6>
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <div class="upload-box pull-left">
                                                <i class="fa fa-plus"></i>
                                                <p>Upload Certificate</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-11" style="padding-left:60px;">
                                            <div class="upload-box-image">
                                                <ul>
                                                    <li><img src="images/profile/eligimage.png" alt=""></li>
                                                    <li><img src="images/profile/eligimage.png" alt=""></li>
                                                    <li><img src="images/profile/eligimage.png" alt=""></li>
                                                    <li><img src="images/profile/eligimage.png" alt=""></li>
                                                    <li><img src="images/profile/eligimage.png" alt=""></li>
                                                    <li><img src="images/profile/eligimage.png" alt=""></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" class="f-11 c-green mb-3">+ Add Work Experience</a>
                                </li>
                            </ul>
                            <button class="btn btn-success btn-prime btn-sm pull-right" style="padding:5px 25px;margin:15px 0;">Save</button>
                        </div>
                    </div>
                </div>
            </div>



            <!-- :::::::::::::::::::::::::::::::::::::::::::: AWARDS / RECOGNITION INFORMATION :::::::::::::::::::::::::::::::::::::::::::::: -->

            <div id="awardsModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content box-edge">
                        <div class="modal-head">
                            <div class="border-bot" style="padding:16px 0;">
                                <h6 class="reset c-dark">Awards / Recognition</h6>
                            </div>
                        </div>   	
                        <div class="modal-body" style="padding-top:0;overflow:hidden">
                            <ul class="p-infolist">
                                <li>
                                    <h6 class="f-11 c-light mb-3">Awards / Recognition</h6>
                                    <input type="text" style="width:360px;">
                                </li>
                                <li>
                                    <h6 class="f-11 c-light mb-3">Date Received</h6>
                                    <input type="text" style="width:213px;">
                                </li>
                                <li style="margin-right:0">
                                    <h6 class="f-11 c-light mb-3">Events</h6>
                                    <input type="text" style="width:360px;">
                                </li>
                                <li class="border-bot p-bot-10" style="width:100%;">
                                    <h6 class="f-11 c-light mb-3">Certificates</h6>
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <div class="upload-box pull-left">
                                                <i class="fa fa-plus"></i>
                                                <p>Upload Certificate</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-11" style="padding-left:60px;">
                                            <div class="upload-box-image">
                                                <ul>
                                                    <li><img src="images/profile/eligimage.png" alt=""></li>
                                                    <li><img src="images/profile/eligimage.png" alt=""></li>
                                                    <li><img src="images/profile/eligimage.png" alt=""></li>
                                                    <li><img src="images/profile/eligimage.png" alt=""></li>
                                                    <li><img src="images/profile/eligimage.png" alt=""></li>
                                                    <li><img src="images/profile/eligimage.png" alt=""></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" class="f-11 c-green mb-3">+ Add Reward / Recognition</a>
                                </li>
                            </ul>
                            <button class="btn btn-success btn-prime btn-sm pull-right" style="padding:5px 25px;margin:15px 0;">Save</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- :::::::::::::::::::::::::::::::::::::::::::: AFFILIATIONS INFORMATION :::::::::::::::::::::::::::::::::::::::::::::: -->

            <div id="affiliationsModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content box-edge">
                        <div class="modal-head">
                            <div class="border-bot" style="padding:16px 0;">
                                <h6 class="reset c-dark">Affiliations</h6>
                            </div>
                        </div>   	
                        <div class="modal-body" style="padding-top:0;overflow:hidden">
                            <ul class="p-infolist">
                                <li>
                                    <h6 class="f-11 c-light mb-3">Organization</h6>
                                    <input type="text" style="width:360px;">
                                </li>
                                <li style="margin-right:0;margin-bottom:16px;">
                                    <h6 class="f-11 c-light mb-3">Designation</h6>
                                    <input type="text" style="width:360px;">
                                </li>
                                <li>
                                    <h6 class="f-11 c-light mb-3">Years</h6>
                                    <input type="text" style="width:230px;">
                                </li>
                                <li>
                                    <a href="#" class="f-11 c-green mb-3">+ Add Affiliation</a>
                                </li>
                            </ul>
                            <button class="btn btn-success btn-prime btn-sm pull-right" style="padding:5px 25px;margin:15px 0;">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    props:['data','url'],

    data(){
        return {
            preLoaded: {personal_info:{fname:'', mname:'', lname:''}},
        }
    },

    methods: {
        put:function(val){
            if(typeof val != "undefined"){
                return val;
            }
            if(val == null){
                return '';
            }
            return '';
        }
    },

    mounted(){
        this.preLoaded = JSON.parse(this.data);
    }
}
</script>

