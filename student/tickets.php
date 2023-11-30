<?php $isTicket=true; require_once 'head.php';?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Ticket list</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item">Ticket</li>
                        <li class="breadcrumb-item active">Ticket list</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <button class="btn btn-success btn-icon float-right" onclick="window.location.href='add-ticket'" type="button"><i class="zmdi zmdi-plus"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card state_w1">
                        <div class="body d-flex justify-content-between">
                            <div>
                                <h5><?php studentTicketStat($student['matric_number']) ?></h5>
                                <span>Total Tickets</span>
                            </div>
                            <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#FFC107">5,2,3,7,6,4,8,1</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card state_w1">
                        <div class="body d-flex justify-content-between">
                            <div>                                
                                <h5><?php studentTicketStat($student['matric_number'], 0) ?></h5>
                                <span>Pending</span>
                            </div>
                            <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#46b6fe">8,2,6,5,1,4,4,3</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card state_w1">
                        <div class="body d-flex justify-content-between">
                            <div>
                                <h5><?php studentTicketStat($student['matric_number'], 1) ?></h5>
                                <span>Responded</span>
                            </div>
                            <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#ee2558">4,4,3,9,2,1,5,7</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card state_w1">
                        <div class="body d-flex justify-content-between">
                            <div>                            
                                <h5><?php studentTicketStat($student['matric_number'], 2) ?></h5>
                                <span>Resolve</span>
                            </div>
                            <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#04BE5B">7,5,3,8,4,6,2,9</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card project_list">
                        <div class="table-responsive">
                            <table class="table m-b-0 table-hover c_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Date</th>                                        
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    try{
                                        $sql = "Select * from tickets where stud_id='{$_SESSION['pa-student']}';";
                                        $query = getConn()->prepare($sql);
                                        $query->execute();
                                        $query->setFetchMode(PDO::FETCH_ASSOC);
                                        
                                        foreach($query->fetchAll() as $val) {
                                    ?>
                                    <tr>
                                        <td><strong><?php echo $val['tic_id'] ?></strong></td>
                                        <td><a href="view-ticket?ID=<?php echo $val['tic_id'] ?>" title="<?php echo $val['subject'] ?>"><?php echo $val['subject'] ?></a></td>                                       
                                        <td><?php echo timeElapsed($val['date_created']) ?></td>
                                        <td><span class="badge <?php ticBadge($val['status']) ?>"><?php statVal($val['status']) ?></span></td>
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

<script src="assets/bundles/footable.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/js/pages/tables/footable.js"></script><!-- Custom Js --> 
<script src="assets/bundles/sparkline.bundle.js"></script>
<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/js/pages/charts/sparkline.js"></script>
<script src="student.js"></script>
</body>


</html>