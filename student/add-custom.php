<?php $isCustom=true; require_once 'head.php';?>
<section class="content blog-page">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Ticket</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="custom-projects">Custom Project</a></li>
                        <li class="breadcrumb-item active">New Custom Project</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <form id="add-cus-proj" method="post">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <label for="id">Project Title 1</label>
                            <div class="form-group">
                                <input type="text" required name="topic1" class="form-control" placeholder="Enter title of your project" />
                                <input type="hidden" id="id" name="id" value="<?php echo $_SESSION['pa-student'] ?>">
                            </div>
                         
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <label for="desc1">Description</label>
                            <div class="summernote" id="desc1"></div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <label for="id">Project Title 2</label>
                            <div class="form-group">
                                <input type="text" required name="topic2" class="form-control" placeholder="Enter title of your project" />
                            </div>
                         
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <label for="desc2">Description</label>
                            <div class="summernote" id="desc2"></div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <label for="id">Project Title 3</label>
                            <div class="form-group">
                                <input type="text" required name="topic3" class="form-control" placeholder="Enter title of your project" />
                            </div>
                         
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <label for="tic-desc">Description</label>
                            <div class="summernote" id="desc3"></div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">                            
                            <button type="submit" class="btn btn-info waves-effect m-t-20">SEND</button>
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