﻿<?php $isProject=true;
require_once 'head.php';?>
<section class="content blog-page">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Project</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="projects">Project</a></li>
                        <li class="breadcrumb-item active">New Project</li>
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
                <form id="add-proj" method="post">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="form-group">
                                <label for="titl">Topic</label>
                                <input type="text" class="form-control" name="titl" required placeholder="Enter Project topic" />
                            </div>

                            <div class="form-group">
                            <label for="cat">Category</label>
                            <select class="form-control show-tick" name="cat" required>
                            <option value="">Select Category --</option>                             
                                <option>Computer Science</option>
                                <!--<option>Electrical Engineering</option>
                                <option>Industrial Safety</option>
                                <option>Petroleum Marketing</option>
                                <option>Statistics</option>-->
                            </select></div>

                            <div class="form-group">
                            <label for="level">Difficulty</label>
                            <select class="form-control show-tick" name="level" required>
                            <option value="">Select Difficulty --</option>                                
                                <option>Low</option>
                                <option>Medium</option>
                                <option>High</option>                                
                            </select>
                        </div>                        
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <textarea class="summernote" id="proj-desc" required>
                               
                            </textarea>
                            <button type="submit" class="btn btn-info waves-effect m-t-20">POST</button>
                        </div>
                    </div>
                </div> </form>           
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