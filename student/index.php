<?php $isProfile=true;
require_once 'head.php'; 
?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Profile</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item">Student</li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a href="profile-edit" class="btn btn-info btn-icon float-right"><i class="zmdi zmdi-edit"></i></a>
                </div>
            </div>
        </div> 
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card mcard_3">
                        <div class="body">
                            <a href="profile.html"><img src="<?php if($student['img'] ==''){
                            echo '../no_image.png';
                        }else echo $student['img'] ?>" class="rounded-circle shadow " alt="profile-image"></a>
                            <h4 class="m-t-10"><?php if($student['first_name'] ==''){
                            echo $student['matric_number'];
                        }else echo getStudent($stid, 'names'); ?></h4>                            
                            <div class="row">
                                <div class="col-12">
                                    <!--<ul class="social-links list-unstyled">
                                        <li><a title="facebook" href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                        <li><a title="twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                        <li><a title="instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                                    </ul>-->
                                    <p class="text-muted"><?php echo $student['address'] ?></p>
                                </div>
                                <div class="col-4">                                    
                                    <small>Projects</small>
                                    <h5><?php echo studentProject($student['matric_number']) ?></h5>
                                </div>
                                <div class="col-4">                                    
                                    <small>Tickets</small>
                                    <h5><?php studentTicketStat($student['matric_number']) ?></h5>
                                </div>
                                <div class="col-4">                                    
                                    <small>Solved</small>
                                    <h5><?php studentTicketStat($student['matric_number'], 2) ?></h5>
                                </div>                            
                            </div>
                        </div>
                    </div>
                                   
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="body">
                        <small class="text-muted">Email address: </small>
                            <p><?php echo $student['email']?></p>
                            <hr>
                            <small class="text-muted">Department: </small>
                            <p><?php echo $student['dept'] ?></p>
                            <hr>
                            
                            <span><?php if($student['country']!='' || $student['state']!='')echo $student['country'].', '.$student['state'] ?></span>
                        </div>
                    </div>
                    <div class="card">

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="assets/plugins/light-gallery/js/lightgallery-all.min.js"></script> <!-- Light Gallery Plugin Js --> 
<script src="assets/bundles/fullcalendarscripts.bundle.js"></script><!--/ calender javascripts --> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="assets/js/pages/medias/image-gallery.js"></script>
<script src="assets/js/pages/calendar/calendar.js"></script>
</body>

</html>