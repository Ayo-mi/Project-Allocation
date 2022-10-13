<?php $isTicket=true; require_once 'head.php';
$isStu='';
$isStu=getStudent(getTicket($_GET['ID'], 'student'), "id");
?>

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
                        <li class="breadcrumb-item active">Detail</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <?php if(getTicket($_GET['ID'], 'status')<2){?><a title="Mark as Resolved" style="color: white" class="solved btn btn-info btn-icon float-right"><i class="zmdi zmdi-check"></i></a><?php }?>
                    <form id='solv' method="post"><input type="hidden" name="un-id" value="<?php echo $_GET['ID'] ?>"></form>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card mcard_4">
                        <div class="body">
                            <ul class="header-dropdown list-unstyled">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-menu"></i> </a>
                                    
                                </li>
                            </ul>
                            <?php if($isStu!=''){?>
                            <div class="img">
                                <img src="<?php if(getStudent(getTicket($_GET['ID'], 'student'), 'img') ==''){
                            echo '../no_image.png';
                        }else echo getStudent(getTicket($_GET['ID'], 'student'), 'img') ?>" class="rounded-circle" alt="profile-image">
                            </div>
                            <div class="user">
                                <h5 class="mt-3 mb-1"><?php echo getStudent(getTicket($_GET['ID'], 'student'), 'names') ?></h5>
                                <small class="text-muted"><?php echo getStudent(getTicket($_GET['ID'], 'student'), 'email') ?></small>
                                <ul class="list-unstyled mt-3 d-flex">
                                    <li class="mr-3"><strong>Total:-</strong> <?php studentTicketStat(getStudent(getTicket($_GET['ID'], 'student'), 'id')) ?></li>
                                    <li class="mr-3"><strong>Open:-</strong> <?php studentTicketStat(getStudent(getTicket($_GET['ID'], 'student'), 'id'), 0) ?></li>
                                    <li><strong>Closed:-</strong> <?php studentTicketStat(getStudent(getTicket($_GET['ID'], 'student'), 'id'), 2) ?></li>
                                </ul>
                                <div class="progress-container progress-success">
                                    <span class="progress-badge">Statestics</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                            <span class="progress-value">90%</span>
                                        </div>
                                    </div>
                                </div>
                            </div><?php }else {
                                ?>
                                <div class="img">
                                <img src="<?php if(getSupervisor(getTicket($_GET['ID'], 'student'), 'img') ==''){
                            echo '../no_image.png';
                        }else echo getSupervisor(getTicket($_GET['ID'], 'student'), 'img') ?>" class="rounded-circle" alt="profile-image">
                            </div>
                            <div class="user">
                                <h5 class="mt-3 mb-1"><?php echo getSupervisor(getTicket($_GET['ID'], 'student'), 'names') ?></h5>
                                <small class="text-muted"><?php echo getSupervisor(getTicket($_GET['ID'], 'student'), 'email') ?></small>
                                <ul class="list-unstyled mt-3 d-flex">
                                    <li class="mr-3"><strong>Total:-</strong> <?php studentTicketStat(getSupervisor(getTicket($_GET['ID'], 'student'), 'id')) ?></li>
                                    <li class="mr-3"><strong>Open:-</strong> <?php studentTicketStat(getSupervisor(getTicket($_GET['ID'], 'student'), 'id'), 0) ?></li>
                                    <li><strong>Closed:-</strong> <?php studentTicketStat(getSupervisor(getTicket($_GET['ID'], 'student'), 'id'), 2) ?></li>
                                </ul>
                                <div class="progress-container progress-success">
                                    <span class="progress-badge">Statestics</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                            <span class="progress-value">90%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <?php }

                            ?>
                           
                        </div>
                    </div>
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
                            <ul class="list-unstyled">
                                <li>
                                    <div><?php statVal(getTicket($_GET['ID'], 'status')) ?></div>
                                    <?php if(statVal2(getTicket($_GET['ID'], 'status'))=='In Progress') {?><div class="progress m-b-20">
                                        <div class="progress-bar l-amber" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%"> <span class="sr-only">32% Complete</span> </div>
                                    </div><?php }?>
                                </li>
                            </ul>
                            <hr>
                            
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="body">
                            <h5>Ticket Details</h5>
                            <span><?php echo getTicket($_GET['ID'], 'msg') ?></span>
                        </div>
                    </div>
                    <form id="rep-tic" method="post">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Ticket</strong> Reply</h2>
                        </div>
                        <input type="hidden" value="<?php echo $_GET['ID']?>" name="id">
                        <div class="body mb-2">
                            <div class="summernote" id="rep-msg"><?php echo getTicket($_GET['ID'], 'reply') ?></div>
                            <?php if(empty(getTicket($_GET['ID'], 'reply'))) {?><button type="submit" class="btn btn-info waves-effect m-t-20">SEND</button><?php }?>
                        </div>
                    </div></form>
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