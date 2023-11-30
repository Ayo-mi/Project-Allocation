<?php

function getConn(){
    $db_conn = new PDO('mysql:host=localhost;dbname=project_allocation','root','');
    $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db_conn;
}

function getStudent($id, $key, $i=0){
    if($i==0){
    try{
        $sql = "Select * from students where matric_number = :id LIMIT 1";
        $stmt = getConn()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $val = array();
        
        foreach($stmt->fetchAll() as $val) {}
        
        if (count($val)!=0) {
            switch (strtolower($key)) {
            case 'names':
                return $val['first_name'].' '.$val['last_name'];
                break;
            case 'fname':
                return $val['first_name'];
                break;
            case 'lname':
                return $val['last_name'];
                break;
            case 'id':              
                return $val['matric_number'];
                break;
            case 'img':              
                return $val['img'];
                break;
            case 'dept':              
                return $val['dept'];
                break;
            case 'email':
                return $val['email'];
                break;
            case 'sp':
                return $val['sup_id'];
                break;        
            case 'country':
                return $val['country'];
                break;
            case 'state':
                return $val['state'];
                break;
            case 'address':
                return $val['address'];
                break;
            case 'datecr':
                return $val['date_created'];
                break; 
            case 'dateup':
                return $val['date_updated'];
                break;
            case 'all':
                return $val;
                break;
            default:
                return '';
                break;
        }
        }else { return ''; }
        
        }
    catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }elseif ($i==1) {
        getSupervisor($id, 'id');
    }
}

function getSupervisor($id, $key){
    try{
        $sql = "Select * from supervisors where user_id = :id LIMIT 1";
        $stmt = getConn()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $val = array();
        
        foreach($stmt->fetchAll() as $val) {}
        
        if (count($val)!=0) {
            switch (strtolower($key)) {
            case 'names':
                return $val['first_name'].' '.$val['last_name'];
                break;
            case 'fname':
                return $val['first_name'];
                break;
            case 'lname':
                return $val['last_name'];
                break;
            case 'id':              
                return $val['user_id'];
                break;
            case 'img':              
                return $val['img'];
                break;
            case 'email':
                return $val['email'];
                break;        
            case 'country':
                return $val['country'];
                break;
            case 'state':
                return $val['state'];
                break;
            case 'address':
                return $val['address'];
                break;
            case 'datecr':
                return $val['date_created'];
                break; 
            case 'dateup':
                return $val['date_updated'];
                break;
            case 'all':
                return $val;
                break;
            default:
                return '';
                break;
        }
        }else { return ''; }
        
        }
    catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
}

function getProject($id, $key){
    try{
        $sql = "Select * from projects where proj_id = :id LIMIT 1";
        $stmt = getConn()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $val = array();
        
        foreach($stmt->fetchAll() as $val) {}
        
        if (count($val)!=0) {
            switch (strtolower($key)) {
            case 'topic':
                return $val['topic'];
                break;
            case 'descr':
                return $val['descr'];
                break;
            case 'dept':
                return $val['dept'];
                break;        
            case 'level':
                return $val['level'];
                break;
            case 'student':
                return $val['stud_id'];
                break;
            case 'datecr':
                return $val['date_created'];
                break; 
            case 'dateup':
                return $val['date_updated'];
                break;
            case 'all':
                return $val;
                break;
            default:
                return '';
                break;
        }
        }else { return ''; }
        
        }
    catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
}

function getCustomProject($id, $key){
    try{
        $sql = "Select * from custom_projects where custom_id = :id LIMIT 1";
        $stmt = getConn()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $val = array();
        
        foreach($stmt->fetchAll() as $val) {}
        
        if (count($val)!=0) {
            switch (strtolower($key)) {
            case 'topic':
                return $val['topic'];
                break;
            case 'descr':
                return $val['descr'];
                break;
            case 'grp':
                return $val['grp_id'];
                break;        
            case 'status':
                return $val['status'];
                break;
            case 'student':
                return $val['stud_id'];
                break;
            case 'datecr':
                return $val['date_created'];
                break; 
            case 'dateup':
                return $val['date_updated'];
                break;
            case 'all':
                return $val;
                break;
            default:
                return '';
                break;
        }
        }else { return ''; }
        
        }
    catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
}

function getTicket($id, $key){
    try{
        $sql = "Select * from tickets where tic_id = :id LIMIT 1";
        $stmt = getConn()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $val = array();
        
        foreach($stmt->fetchAll() as $val) {}
        
        if (count($val)!=0) {
            switch (strtolower($key)) {
            case 'subj':
                return $val['subject'];
                break;
            case 'msg':
                return $val['msg'];
                break;
            case 'reply':
                return $val['reply'];
                break;
            case 'status':
                return $val['status'];
                break;
            case 'student':
                return $val['stud_id'];
                break;
            case 'datecr':
                return $val['date_created'];
                break; 
            case 'dateup':
                return $val['date_updated'];
                break;
            case 'all':
                return $val;
                break;
            default:
                return '';
                break;
        }
        }else { return ''; }
        
        }
    catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
}

function getStudents(){
    try{
        $sql = "Select * from students;";
        $query = getConn()->prepare($sql);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $n='NIL';
        foreach($query->fetchAll() as $val) {
            echo "
            <tr>
                <td>".isNullorEmpt($val['matric_number'])."</td>
                <td><a href='student-details?STUDID={$val['matric_number']}'>".isNullorEmpt($val['first_name'].' '.$val['last_name'])."</a></td>
                <td>".isNullorEmpt($val['email'])."</td>
                <td>".isNullorEmpt($val['dept'])."</td>
                <td>".isNullorEmpt(getSupervisor($val['sup_id'], 'names'))."</td>
                </tr>
            ";
        }
        
    }
    catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
}

function getSupervisors(){
    try{
        $sql = "Select * from supervisors;";
        $query = getConn()->prepare($sql);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $n='NIL';
        foreach($query->fetchAll() as $val) {
            echo "
            <tr>
                <td>".isNullorEmpt($val['user_id'])."</td>
                <td><a href='supervisor-details?SUPID={$val['user_id']}'>".isNullorEmpt($val['first_name'].' '.$val['last_name'])."</td></a>
                <td>".isNullorEmpt($val['email'])."</td>
                <td>".isNullorEmpt($val['dept'])."</td>
                <td>".isNullorEmpt($val['state'])."</td>
                </tr>
            ";
        }
        
    }
    catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
}

function getSupervisors_list($str=''){
    try{
        $sql = "Select * from supervisors;";
        $query = getConn()->prepare($sql);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $n='NIL';
        foreach($query->fetchAll() as $val) {
            echo '
            <option '.($str == ("{$val['user_id']}") ? "selected" : "").' value="'.$val['user_id'].'">'.isNullorEmpt(getSupervisor($val['user_id'], 'names')).'</option>
            ';
        }
        
    }
    catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
}

function getSupervisorStudent($str=''){
    try{
        $sql = "Select matric_number from students where sup_id='{$str}';";
        $query = getConn()->prepare($sql);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $n='NIL';
        foreach($query->fetchAll() as $val) {
            echo '
            <option value="'.$val['matric_number'].'">'.isNullorEmpt(getSupervisor($val['matric_number'], 'names')).'</option>
            ';
        }
        
    }
    catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
}

function isNullorEmpt($str){
    if (!empty(trim($str))) {
        return $str;
    }else{
        return 'NIL';
    }
}

function styleClass($cat=''){
    switch (strtolower($cat)) {
        case 'low':
            return 'badge-info';
        case 'medium':
            return 'badge-warning';
            break;
        case 'high':
            return 'badge-danger';
            break;
        case '1':
            return 'badge-success';
            break;        
        case '0':
            return 'badge-light';
            break;
        default:
            return 'badge-primary';
            break;
    }
}

function strConti($str='', $lim=35){
      if(strlen($str) <=$lim)
      {
          return $str;
      }else 
      {
         return substr(trim($str),0,$lim).'...'; 
      }
}

function getSelected($str, $op=1){
    if($op==1){
      echo '
    <option '.($str == ("Computer Science") ? "selected" : "").'>Computer Science</option>
    ';}
    elseif ($op==2) {
        echo '
        <option '.($str == ("Low") ? "selected" : "").'>Low</option>
        <option '.($str == ("Medium") ? "selected" : "").'>Medium</option>
        <option '.($str == ("High") ? "selected" : "").'>High</option>
        ';
    }
   /* <option '.($str == ("Electrical Engineering") ? "selected" : "").'>Electrical Engineering</option>
    <option '.($str == ("Industrial Safety") ? "selected" : "").'>Industrial Safety</option>
    <option '.($str == ("Petroleum Marketing") ? "selected" : "").'>Petroleum Marketing</option>
    <option '.($str == ("Statistics") ? "selected" : "").'>Statistics</option>*/
}

function getStudentProj($id, $boo){

    try{
        $sql = "Select * from projects where stud_id='{$id}' LIMIT 1;";
        $query = getConn()->prepare($sql);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);
                                        
        foreach($query->fetchAll() as $val) {
        ?>
 <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card project_list">
        <div class="table-responsive">
            <table class="table table-hover m-b-0 c_table m0b theme-color">
                <thead>
                    <tr>
                        <th style="width:50px;">Assigned To</th>
                        <th></th>
                        <th>Topic</th>
                        <th class="hidden-md-down">status</th>
                        <th>Difficulty</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td>
                            <img class="rounded avatar" src="<?php if(getStudent($id, 'img') ==''){
                            echo '../no_image.png';
                        }else echo getStudent($id, 'img') ?>" alt="">
                        </td>
                        <td>
                            <a class="single-user-name" href="#"><?php echo getStudent($id, 'names')?></a><br>
                            <small><?php echo getStudent($val['stud_id'], 'email');?></small>
                        </td>
                        <td>
                            <a class="single-user-name" href="view-project?UID=<?php echo $val['proj_id'] ?>"><strong
                                    title="<?php echo $val['topic'] ?>"><?php echo strConti($val['topic']) ?></strong></a><br>
                            <!--<small><?php echo strConti($val['descr']) ?></small>-->
                        </td>
                        <td class="hidden-md-down">
                            <span
                                class="badge <?php echo styleClass($val['status']);?>"><?php echo ($val['status'] == 0 ? 'Not Approved' : 'Approved') ?></span>
                        </td>

                        <td><span
                                class="badge <?php echo styleClass($val['level']);?>"><?php echo $val['level'] ?></span>
                        </td>
                        <td><?php echo timeElapsed($val['date_created']) ?></td>
                    </tr>
                    <?php
                                            $boo=true;
                                            return $boo;
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
 <?php
}

function ticBadge($status){
      if ($status==0) {
          echo 'badge-info';
      }elseif ($status==1) {
        echo 'badge-warning';
      }elseif ($status==2) {
        echo 'badge-danger';
      }
}

function statVal($status){
    if ($status==0) {
        echo 'Opened';
    }elseif ($status==1) {
      echo 'In Progress';
    }elseif ($status==2) {
      echo 'Closed';
    }
}

function statVal2($status){
    if ($status==0) {
        return 'Opened';
    }elseif ($status==1) {
        return 'In Progress';
    }elseif ($status==2) {
        return 'Closed';
    }
}

function totalStudent(){
    try{
        $sql = "Select count(*) as num from students";
        $stmt = getConn()->prepare($sql);
        $stmt->execute();
        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $val = array();
        
        foreach($stmt->fetchAll() as $val) {}
        echo $val['num'];
    }
    catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
}

function totalProject($isReturn=false){
    try{
        $sql = "Select count(*) as num from projects";
        $stmt = getConn()->prepare($sql);
        $stmt->execute();
        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $val = array();
        
        foreach($stmt->fetchAll() as $val) {}
       if (!$isReturn) {
        echo $val['num'];
       } else {
        return $val['num'];
       }
    }
    catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
}

function totalProj($isAssign=true){
   
    if ($isAssign) {
        try{
        $sql = "Select count(*) as num from projects where stud_id<>'';";
        $stmt = getConn()->prepare($sql);
        $stmt->execute();
        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $val = array();
        
        foreach($stmt->fetchAll() as $val) {}
        global $n;
        $n=$val['num'];
        $avg = $val['num']/totalProject(true)*100;
        echo $avg;
    }
    catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }else {
        
            $dif = totalProject(true)-studWithProj();
            echo $dif;
    }
}

function studWithProj(){
    
            try{
            $sql = "Select count(*) as num from projects where stud_id<>'';";
            $stmt = getConn()->prepare($sql);
            $stmt->execute();
            $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $val = array();
            
            foreach($stmt->fetchAll() as $val) {}
            return $val['num'];
           
        }
        catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
}

function timeElapsed($date){
    date_default_timezone_set("Africa/Lagos");
    $months=array();
    for ($i=1; $i < 13; $i++) { 
        $month = date('F',mktime(0,0,0,$i));
        $months += [$month => $i];
    }
    $date_year = date('Y', strtotime($date));//year of the date
    $date_month = date('m', strtotime($date));//month of the date
    $date_day = date('j', strtotime($date));//day of the date
    $date_hour = date('H', strtotime($date));//hour of the date
    $date_minute = date('i', strtotime($date));//minute of the date
    $current_year = date('Y');//current year(2019 in this case)

    //seconds passed between the given and current date
    $seconds_passed = round((time()-strtotime($date)),0);

    //minutes  passed between the given and current date
    $minutes_passed = round((time()-strtotime($date))/ 60,0);

    //hours passed between the given and current date
    $hours_passed = round((time()-strtotime($date))/ 3600,0);

    //days passed between the given and current date
    $days_passed = round((time()-strtotime($date))/ 86400,0);

    if($seconds_passed<60 && $current_year==$date_year) return $seconds_passed." second".($seconds_passed == (1) ? " " : "s")." ago";
    //outputs 1 second / 2-59 seconds ago

    else if($seconds_passed>=60 && $minutes_passed<60 && $current_year==$date_year) return $minutes_passed." minute".($minutes_passed == (1) ? " " : "s")." ago";
    //outputs 1 minute/ 2-59 minutes ago

    else if($minutes_passed>=60 && $hours_passed<24 && $current_year==$date_year) return $hours_passed." hour".($hours_passed == (1) ? " " : "s")." ago";
    //outputs 1 hour / 2-23 hours ago

    else if($hours_passed>=24 && $days_passed<2 && $current_year==$date_year) return "Yesterday at ".$date_hour.":".$date_minute." ".($date_hour < (12) ? "AM" : "PM");
    //outputs [Yesterday at 11:30] for example

    else{
        if ($date_year > $current_year) {
            return '';
        }
        
            foreach($months as $month_name => $month_number){
                if($month_number==$date_month){
                    return $month_name." ".$date_day.", ".$date_year;
                    //echo $date_hour < (12) ? "AM" : "PM " ;
                    //outputs [Dec 11, 11:32] for example
                }
            }
    }
}

function ticketStatistic($key=-1){
    if ($key==0) {
        try{
        $sql = "Select count(*) as num from tickets where status={$key};";
        $stmt = getConn()->prepare($sql);
        $stmt->execute();
        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $val = array();
        
        foreach($stmt->fetchAll() as $val) {}
        $avg = $val['num'];
        echo $avg;
    }
    catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }elseif ($key==1) {
            try{
            $sql = "Select count(*) as num from tickets where status={$key};";
            $stmt = getConn()->prepare($sql);
            $stmt->execute();
            $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $val = array();
            
            foreach($stmt->fetchAll() as $val) {}
            
            $avg = $val['num'];
            echo $avg;
        }
        catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
    }elseif ($key==2) {
            try{
            $sql = "Select count(*) as num from tickets where status={$key};";
            $stmt = getConn()->prepare($sql);
            $stmt->execute();
            $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $val = array();
            
            foreach($stmt->fetchAll() as $val) {}
           
            $avg = $val['num'];
            echo $avg;
        }
        catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
    }else {
        try{
            $sql = "Select count(*) as num from tickets";
            $stmt = getConn()->prepare($sql);
            $stmt->execute();
            $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $val = array();
            
            foreach($stmt->fetchAll() as $val) {}
            $avg = $val['num'];
            echo $avg;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    }
}

function studentTicketStat($id, $key=-1){
    if ($key==0) {
        try{
        $sql = "Select count(*) as num from tickets where status={$key} and stud_id='{$id}';";
        $stmt = getConn()->prepare($sql);
        $stmt->execute();
        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $val = array();
        
        foreach($stmt->fetchAll() as $val) {}
        $avg = $val['num'];
        echo $avg;
    }
    catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }elseif ($key==1) {
            try{
            $sql = "Select count(*) as num from tickets where status={$key} and stud_id='{$id}';";
            $stmt = getConn()->prepare($sql);
            $stmt->execute();
            $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $val = array();
            
            foreach($stmt->fetchAll() as $val) {}
            
            $avg = $val['num'];
            echo $avg;
        }
        catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
    }elseif ($key==2) {
            try{
            $sql = "Select count(*) as num from tickets where status={$key} and stud_id='{$id}';";
            $stmt = getConn()->prepare($sql);
            $stmt->execute();
            $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $val = array();
            
            foreach($stmt->fetchAll() as $val) {}
           
            $avg = $val['num'];
            echo $avg;
        }
        catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
    }else {
        try{
            $sql = "Select count(*) as num from tickets where stud_id='{$id}'";
            $stmt = getConn()->prepare($sql);
            $stmt->execute();
            $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $val = array();
            
            foreach($stmt->fetchAll() as $val) {}
            $avg = $val['num'];
            echo $avg;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    }
}

function studentProject($id){
    try{
        $sql = "Select count(*) as num from projects where stud_id='{$id}';";
        $stmt = getConn()->prepare($sql);
        $stmt->execute();
        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $val = array();
        
        foreach($stmt->fetchAll() as $val) {}
        return $val['num'];
    }
    catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
}

function getSpStu($id){
    try{
        $sql = "Select count(*) as num from students where sup_id='{$id}'";
        $stmt = getConn()->prepare($sql);
        $stmt->execute();
        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $val = array();
        
        foreach($stmt->fetchAll() as $val) {}
        $avg = $val['num'];
        echo $avg;
    }
    catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
}

function getStudentProjects($id){
    $isAvai=false;
    try{
        $sql = "Select * from custom_projects where stud_id='{$id}';";
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
                    <?php
                    if($val['status']==0){?>
                    <small class="text-muted">Action: </small>
                    <p><a title="Choose this project" data-id="<?php echo $val['custom_id'] ?>" style="color: white;"
                            class="btn btn-info btn-icon sup-choose-cus-project"><i class="zmdi zmdi-check"></i></a>
                    </p>
                    <hr><?php }?>
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
        }
        try{
            $sql = "Select * from projects where stud_id='{$id}' LIMIT 1;";
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
                    <h2><strong>Project</strong> Info</h2>
                </div>
                <div class="body">
                    <small class="text-muted">Title: </small>
                    <p><?php echo $val['topic'] ?></p>
                    <hr>
                    <small class="text-muted">Project ID: </small>
                    <p><?php echo $val['proj_id'] ?></p>
                    <hr>
                    <small class="text-muted">Status: </small>
                    <p><span
                            class="badge <?php echo styleClass($val['status']);?>"><?php echo ($val['status'] == 0 ? 'Not Approved' : 'Approved') ?></span>
                    </p>
                    <hr>
                    <small class="text-muted">Date: </small>
                    <p><?php echo timeElapsed($val['date_created']) ?></p>
                    <hr>
                    <small class="text-muted">Difficulty: </small>
                    <p><span class="badge <?php echo styleClass($val['level']);?>"><?php echo $val['level'] ?></span>
                    </p>
                    <hr>
                    <?php
                    if($val['status']==0){?>
                    <small class="text-muted">Action: </small>
                    <p><a title="Choose this project" style="color: white;"
                            class="btn btn-info btn-icon sup-choose-project" data-id="<?php echo $val['proj_id'] ?>"><i
                                class="zmdi zmdi-check"></i></a>
                    </p>
                    <hr><?php }?>
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
        }
        catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        }
        if (!$isAvai) {
            echo '<h3>No Project Found</h3>';
        }
}

?>