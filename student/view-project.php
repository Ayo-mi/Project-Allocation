<?php $isProject=true; require_once 'head.php';?>

<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Project Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="projects">Project</a></li>
                        <li class="breadcrumb-item active">View Project</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <?php if(empty(getProject($_GET['UID'], 'student'))) {?><a title="Choose Project" style="color: white;" class="btn btn-info btn-icon float-right choose-project"><i class="zmdi zmdi-check"></i></a><?php }?>
                    <form id="chos-proj" method="post"><input type="hidden" value="<?php echo $_GET['UID'] ?>" name="id"></form>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    
                    <div class="card">
                        <div class="header">
                            <h2><strong>Project</strong> Info</h2>
                        </div>
                        <div class="body">
                            <small class="text-muted">Title: </small>
                            <p><?php echo getProject($_GET['UID'], 'topic') ?></p>
                            <hr>
                            <small class="text-muted">Project ID: </small>
                            <p><?php echo $_GET['UID'] ?></p>
                            <hr>
                            <small class="text-muted">Date: </small>
                            <p><?php echo timeElapsed(getProject($_GET['UID'], 'datecr')) ?></p>
                            <hr>
                            <small class="text-muted">Difficulty: </small>
                            <p><span class="badge <?php echo styleClass(getProject($_GET['UID'], 'level'));?>"><?php echo getProject($_GET['UID'], 'level') ?></span></p>
                            <hr>                            
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="body">
                            <h5>Project Details</h5>
                            <hr>
                            <span><?php echo getProject($_GET['UID'], 'descr') ?></span>
                        </div>
                    </div>             
                </div>
            </div>
        </div>
    </div>
</section>

<link rel="stylesheet" href="assets/plugins/summernote/dist/summernote.css"/>
<link rel="stylesheet" href="assets/plugins/bootstrap-select/css/bootstrap-select.css" />
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="assets/plugins/dropzone/dropzone.js"></script> <!-- Dropzone Plugin Js --> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="assets/plugins/summernote/dist/summernote.js"></script>
<script src="assets/js/pages/ui/notifications.js"></script> <!-- Custom Js -->
<script src="assets/plugins/bootstrap-notify/bootstrap-notify.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="student.js"></script>
</body>


</html>