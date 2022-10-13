<?php $isProject=true;
require_once 'head.php';
$isChoosen=false;?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Student list</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item">Student</li>
                        <li class="breadcrumb-item active">list</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <?php 
                if(!$isChoosen){?>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card project_list">
                        <div class="table-responsive">
                            <table class="table table-hover m-b-0 c_table m0b theme-color">
                                <thead>
                                    <tr>
                                        <th>Matric Number</th>
                                        <th data-breakpoints="xs">Names</th>
                                        <th data-breakpoints="xs">Email</th>
                                        <th data-breakpoints="xs">Department</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    try{
                                        $sql = "Select * from students where sup_id='{$supervisor['user_id']}';";
                                        $query = getConn()->prepare($sql);
                                        $query->execute();
                                        $query->setFetchMode(PDO::FETCH_ASSOC);
                                        $n='NIL';
                                        foreach($query->fetchAll() as $val) {
                                            echo "
                                            <tr>
                                                <td>".isNullorEmpt($val['matric_number'])."</td>
                                                <td><a href='view-project?STUDID={$val['matric_number']}'>".isNullorEmpt($val['first_name'].' '.$val['last_name'])."</a></td>
                                                <td>".isNullorEmpt($val['email'])."</td>
                                                <td>".isNullorEmpt($val['dept'])."</td>
                                                </tr>
                                            ";
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
                </div><?php }?>
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