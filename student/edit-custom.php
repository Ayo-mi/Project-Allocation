<?php $isCustom=true; 
if (!isset($_GET['UID'])) {
    header('location: ../404.php');
}
require_once 'head.php';

$stid = $_GET['UID'];
$cp = getCustomProject($stid, 'all');?>

<section class="content blog-page">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Custom Project</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="custom-projects">Custom Project</a></li>
                        <li class="breadcrumb-item active">Edit Project</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <button class="btn btn-danger btn-icon float-right del-proj" id="del-proj" title="Delete custom project" type="button"><i class="zmdi zmdi-delete"></i></button>
                    <form id='rem-cus' method="post"><input type="hidden" name="un-id" value="<?php echo $_GET['UID'] ?>"></form>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <form id="edit-cus-proj" method="post">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <label for="id">Title</label>
                            <div class="form-group">
                                <input type="text" required name="subj" value="<?php echo $cp['topic'] ?>" class="form-control" placeholder="Enter subject about your problem" />
                                <input type="hidden" id="id" name="id" value="<?php echo $cp['custom_id'] ?>">
                            </div>
                         
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <label for="desc">Description</label>
                            <div class="summernote" id="desc"><?php echo $cp['descr'] ?></div>
                            <button type="submit" class="btn btn-info waves-effect m-t-20">SAVE</button>
                        </div>
                    </div>
                </div> 
            </form>           
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