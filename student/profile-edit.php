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
                            <h2><strong>Security</strong> Settings</h2>
                        </div>
                        <div class="body">
                            <form  method="post" id="save-sec">
                            <div class="row">
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="usid" required class="form-control" value="<?php echo $student['matric_number'] ?>" placeholder="Username">
                                        <input type="hidden" name="us-id" value="<?php echo $student['matric_number'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="password" name="opsw" required class="form-control" placeholder="Current Password">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="password" name="npsw" required class="form-control" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-info" type="submit">Save Changes</button>
                                </div>                                
                            </div></form>                              
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Account</strong> Settings</h2>
                        </div>
                        <div class="body">
                            <form method="post" id="save-acct">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                    <input type="hidden" name="us-id" value="<?php echo $student['matric_number'] ?>">
                                        <input type="text" name="fn" value="<?php echo $student['first_name'] ?>" required class="form-control" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="ln" value="<?php echo $student['last_name'] ?>" required class="form-control" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="file" name="pic" required class="form-control" accept=".jpg, .png, .jpeg" placeholder="choose profile picture">
                                    </div>
                                </div>                                    
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="state" value="<?php echo $student['state'] ?>" required class="form-control" placeholder="State">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="email" value="<?php echo $student['email'] ?>" required class="form-control" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="country" value="<?php echo $student['country'] ?>" required class="form-control" placeholder="Country">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                            <label for="cat">Department</label>
                            <select class="form-control show-tick" name="dept" required>
                            <option value="">Select Department --</option>
                            <?php getSelected($student['dept']);?>
                            </select></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea rows="4" name="addr" value="<?php echo $student['address'] ?>" required class="form-control no-resize" placeholder="Address Line 1"></textarea>
                                    </div>
                                </div>
                              
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                </div>
                            </div></form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<link rel="stylesheet" href="assets/plugins/bootstrap-select/css/bootstrap-select.css" />
<script src="student.js"></script>
</body>


</html>