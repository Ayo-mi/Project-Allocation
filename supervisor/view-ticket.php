<?php $isTicket=true; require_once 'head.php';?>

<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Ticket Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="tickets">Ticket</a></li>
                        <li class="breadcrumb-item active">View Ticket</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <button class="btn btn-danger btn-icon float-right del-tic" id="del-tic" title="Delete ticket" type="button"><i class="zmdi zmdi-delete"></i></button>
                    <form id='rem-tic' method="post"><input type="hidden" name="un-id" value="<?php echo $_GET['ID'] ?>"></form>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    
                    <div class="card">
                        <div class="header">
                            <h2><strong>Ticket</strong> Info</h2>
                        </div>
                        <div class="body">
                            <small class="text-muted">Title: </small>
                            <p><?php echo getTicket($_GET['ID'], 'subj') ?></p>
                            <hr>
                            <small class="text-muted">Ticket ID: </small>
                            <p><?php echo $_GET['ID'] ?></p>
                            <hr>
                            <small class="text-muted">Date: </small>
                            <p><?php echo timeElapsed(getTicket($_GET['ID'], 'datecr')) ?></p>
                            <hr>
                            <?php if(getTicket($_GET['ID'], 'status')<2) {?>
                            <ul class="list-unstyled">
                                <li>
                                    <div>In Progress</div>
                                    <div class="progress m-b-20">
                                        <div class="progress-bar l-amber" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%"> <span class="sr-only">32% Complete</span> </div>
                                    </div>
                                </li>
                            </ul>
                            <hr>
                           <?php }?>
                            
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="body">
                            <h5>Ticket Details</h5>
                            <hr>
                            <span><?php echo getTicket($_GET['ID'], 'msg') ?></span>
                        </div>
                    </div>
                    <?php if(!empty(getTicket($_GET['ID'], 'reply'))){ ?>
                        <div class="card">
                        <div class="body">
                            <h5>Admin Reply</h5>
                            <hr>
                            <span><?php echo getTicket($_GET['ID'], 'reply') ?></span>
                        </div>
                    </div><?php }?>
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
<script src="supervisor.js"></script>
</body>


</html>