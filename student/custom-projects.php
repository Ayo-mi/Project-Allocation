<?php $isCustom=true;
require_once 'head.php';
$isChoosen=false;?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Custom Project list</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item">Custom Project</li>
                        <li class="breadcrumb-item active">list</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                    <?php if(!empty(trim($student['sup_id']))){ ?><button title="Custom Project"
                        class="btn btn-success btn-icon float-right" onclick="window.location.href='add-custom'"
                        type="button"><i class="zmdi zmdi-plus"></i></button><?php }?>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card project_list">
                        <div class="table-responsive">
                            <table class="table table-hover m-b-0 c_table m0b theme-color">
                                <thead>
                                    <tr>
                                        <th style="width:30%;">Topic</th>
                                        <th style="width:50%;">Description</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    try{
                                        $sql = "Select * from custom_projects where stud_id='{$student['matric_number']}';";
                                        $query = getConn()->prepare($sql);
                                        $query->execute();
                                        $query->setFetchMode(PDO::FETCH_ASSOC);
                                        
                                        foreach($query->fetchAll() as $val) {
                                            
                                            ?>
                                    <td>
                                        <a class="single-user-name"
                                            href="edit-custom?UID=<?php echo $val['custom_id'] ?>"><strong
                                                title="<?php echo $val['topic'] ?>"><?php echo strConti($val['topic']) ?></strong></a><br>                                        
                                    </td>
                                    <td><?php echo strConti($val['descr'], 90) ?></td>

                                    <td><span
                                            class="badge <?php echo styleClass($val['status']);?>"><?php echo ($val['status'] == 0 ? 'Not Approved' : 'Approved') ?></span>
                                    </td>
                                    <td><?php echo timeElapsed($val['date_created']) ?></td>
                                    </tr>
                                    <?php
                                        }                                        
                                    }
                                    catch(PDOException $e) {
                                    echo "Error: " . $e->getMessage();
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<link rel="stylesheet" href="assets/plugins/footable-bootstrap/css/footable.bootstrap.min.css">
<link rel="stylesheet" href="assets/plugins/footable-bootstrap/css/footable.standalone.min.css">
<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="assets/bundles/mainscripts.bundle.js"></script>

<script src="assets/bundles/footable.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/js/pages/tables/footable.js"></script><!-- Custom Js -->
</body>


</html>