<?php $isProfile=true;
require_once 'head.php';?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Profile Edit</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item">Profile</li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div> 
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Profile</strong> Data</h2>
                        </div>
                        <div class="body">
                            <form  method="post" id="save-sec">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                    <label for="">User ID</label>
                                        <input type="text" name="usid" required class="form-control" value="<?php echo $_SESSION['pa-admin'] ?>" placeholder="Username">
                                        <input type="hidden" name="us-id" value="<?php echo $_SESSION['pa-admin'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" required class="form-control" value="<?php echo $admin['name'] ?>" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                    <label for="">Current Password</label>
                                        <input type="password" name="opsw" required class="form-control" placeholder="Current Password">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                    <label for="">New Password</label>
                                        <input type="password" name="npsw" required class="form-control" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-info" type="submit">Save Changes</button>
                                </div>                                
                            </div></form>                              
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
<script src="admin.js"></script>
</body>


</html>