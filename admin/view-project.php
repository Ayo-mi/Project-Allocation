<?php $isCustom=true; require_once 'head.php';?>

<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Project Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="custom-projects">Custom Projects</a></li>
                        <li class="breadcrumb-item active">View Project</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                    
                </div>
            </div>
        </div>
<?php try{
        $sql = "Select * from custom_projects where custom_id='{$_GET['UID']}';";
        $query = getConn()->prepare($sql);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);
                                        
        foreach($query->fetchAll() as $val) {
            global $isAvai;
            $isAvai=true;
            ?>
 <div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12">

            <div class="card">
                <div class="header">
                    <h2><strong>Custom Project</strong> Info</h2>
                </div>
                <div class="body">
                    <small class="text-muted">Topic: </small>
                    <p><?php echo $val['topic'] ?></p>
                    <hr>
                    <small class="text-muted">Status: </small>
                    <p><span
                            class="badge <?php echo styleClass($val['status']);?>"><?php echo ($val['status'] == 0 ? 'Not Approved' : 'Approved') ?></span>
                    </p>
                    <hr>
                    <small class="text-muted">Date: </small>
                    <p><?php echo timeElapsed($val['date_created']) ?></p>
                    <hr>
                    
                </div>
            </div>

        </div>
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="body">
                    <h5>Project Details</h5>
                    <hr>
                    <span><?php echo $val['descr'] ?></span>
                </div>
            </div>
        </div>
    </div>
 </div>
 <?php
        }
    }catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        }?>
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