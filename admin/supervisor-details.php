<?php $isSuper=true;
require_once 'head.php';
if (isset($_GET['SUPID'])) {
    $stid = $_GET['SUPID'];
}
$supervisor = getSupervisor($stid, 'all');?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Profile Edit</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item">Profile</li>
                        <li class="breadcrumb-item active">View</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                            <button class="btn btn-success btn-icon float-right" id="dele-acct" data-id="<?php echo $stid; ?>" type="button"><i class="zmdi zmdi-delete"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">

                    <div class="card">
                        <div class="header">
                            <h2><strong>Account</strong> Details</h2>
                        </div>
                        <div class="body">
                            <form method="post" id="sup-save-acct">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="hidden" name="us-id" value="<?php echo $supervisor['user_id'] ?>">
                                            <label>First Name</label>
                                            <input type="text" name="fn" value="<?php echo $supervisor['first_name'] ?>"
                                                 class="form-control" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" name="ln" value="<?php echo $supervisor['last_name'] ?>"
                                                 class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label>State</label>
                                            <input type="text" name="state" value="<?php echo $supervisor['state'] ?>"
                                                 class="form-control" placeholder="State">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="text" name="email" value="<?php echo $supervisor['email'] ?>"
                                                 class="form-control" placeholder="E-mail">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input type="text" name="country"
                                                value="<?php echo $supervisor['country'] ?>"
                                                class="form-control" placeholder="Country">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cat">Department</label>
                                            <select class="form-control show-tick" name="dept">
                                                <option value="">Select Department --</option>
                                                <?php getSelected($supervisor['dept']);?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cat">Students</label>
                                            <select class="form-control show-tick" name="stu-list">
                                                <option value="">List of Student --</option>
                                                <?php getSupervisorStudent($supervisor['id']);?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Contact Address</label>
                                            <textarea rows="4" name="addr" value="<?php echo $supervisor['address'] ?>"
                                                 class="form-control no-resize"
                                                placeholder="Address Line 1"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button class="btn btn-primary" type="submit">Save Changes</button>
                                    </div>
                                </div>
                            </form>
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
<script src="assets/js/pages/ui/notifications.js"></script> <!-- Custom Js -->
<script src="assets/plugins/bootstrap-notify/bootstrap-notify.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="admin.js"></script>
</body>


</html>