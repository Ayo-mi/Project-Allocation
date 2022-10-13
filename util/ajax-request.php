<?php
session_start();
require_once 'data-process.php';
if ($_POST['rType'] == 'login') {

    $user = $_POST['user'];
    $psw = $_POST['psw'];

    try{
        $sql = "Select * from login_details where userId = :user LIMIT 1";
        $query = getConn()->prepare($sql);
        $query->bindParam(':user', $user);
        //$query->bindParam(':psw', $psw);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);

        foreach($query->fetchAll() as $post_val) {
           if (password_verify($psw, $post_val['password'])) {
               if ($post_val['acct_type'] == 1) {
                   $_SESSION['pa-admin'] = $user;
                   echo '1';
               }elseif ($post_val['acct_type'] == 2) {
                   $_SESSION['pa-student'] = $user;
                   echo '2';
               }elseif ($post_val['acct_type'] == 3) {
                $_SESSION['pa-supervisor'] = $user;
                echo '3';
            }                           
           }else {
               
           }
            
        }
        
    }
    catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
}

elseif ($_POST['rType'] == 'admin-logout') {
    // remove all session variables
    unset($_SESSION['pa-admin']);

    /* destroy the session
    session_destroy();*/
    echo 'done';
}

elseif ($_POST['rType'] == 'student-logout') {
    // remove all session variables
    unset($_SESSION['pa-student']);

    /* destroy the session
    session_destroy();*/
    echo 'done';
}

elseif ($_POST['rType'] == 'supervisor-logout') {
    // remove all session variables
    unset($_SESSION['pa-supervisor']);

    /* destroy the session
    session_destroy();*/
    echo 'done';
}

elseif ($_POST['rType'] == 'add-student') {
    $mat= $_POST['mat'];
    $psw = password_hash('welcome1', PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $acct=2;
    
    try{
        $sql = "INSERT INTO students (`matric_number`, `email`) 
           VALUES (:mat, :ema);".
           "INSERT INTO login_details (`userId`, `password`, `acct_type`) 
           VALUES (:mat, :psw, :ac);";
        $query = getConn()->prepare($sql);
        $values = [
            ':mat' => $mat,
            ':ema' => $email,
            ':psw' => $psw,
            ':ac' => $acct
        ];
        $query->execute($values);
        echo 'done';
        
    }
    catch(PDOException $e) {
        if ($e->getCode()=='23000') {
            echo "Student with matric number {$mat} already exist";
            return;
        }
    echo "Error: Try again";
    }
}

elseif ($_POST['rType'] == 'add-supervisor') {
    $mat= $_POST['user-id'];
    $psw = password_hash('welcome1', PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $acct=3;
    
    try{
        $sql = "INSERT INTO supervisors (`user_id`, `email`) 
           VALUES (:mat, :ema);".
           "INSERT INTO login_details (`userId`, `password`, `acct_type`) 
           VALUES (:mat, :psw, :ac);";
        $query = getConn()->prepare($sql);
        $values = [
            ':mat' => $mat,
            ':ema' => $email,
            ':psw' => $psw,
            ':ac' => $acct
        ];
        $query->execute($values);
        echo 'done';
        
    }
    catch(PDOException $e) {
        if ($e->getCode()=='23000') {
            echo "Supervisor with user id {$mat} already exist";
            return;
        }
    echo "Error: ".$e->getMessage();
    }
}

elseif ($_POST['rType'] == 'add-project') {
    $title= $_POST['titl'];
    $cat = $_POST['cat'];
    $desc = $_POST['proj_desc'];
    $lvl = $_POST['level'];
    $id = 'proj_'.round(microtime(true));
    $sta = 0;

    try{
        $sql = "INSERT INTO projects (`proj_id`, `topic`, `descr`, `dept`, `level`, `status`) 
           VALUES (:id, :tp, :de, :cat, :lv, :st);";
        $query = getConn()->prepare($sql);
        $values = [
            ':id' => $id,
            ':tp' => $title,
            ':de' => $desc,
            ':cat' => $cat,
            ':lv' => $lvl,
            ':st' => $sta
        ];
        $query->execute($values);
        echo 'done';
        
    }
    catch(PDOException $e) {  
        if ($e->getCode()=='23000') {
            echo "Project topic: {$title} already exist";
            return;
        }     
    echo "Error: ".$e->getMessage();
    }
}

elseif ($_POST['rType'] == 'edit-project') {
    $title= $_POST['titl'];
    $cat = $_POST['cat'];
    $desc = $_POST['proj_desc'];
    $lvl = $_POST['level'];
    $id = $_POST['id'];

    try{
        $sql = "UPDATE projects set  `topic`=:tp, `descr`=:de, `dept`=:cat, `level`=:lv where proj_id=:id;";
        $query = getConn()->prepare($sql);
        $values = [
            ':id' => $id,
            ':tp' => $title,
            ':de' => $desc,
            ':cat' => $cat,
            ':lv' => $lvl
        ];
        $query->execute($values);
        echo 'done';
        
    }
    catch(PDOException $e) {  
           
    echo "Error: ".$e->getMessage();
    }
}

elseif ($_POST['rType']=='save-psw') {
    $id= $_POST['usid'];
    $oid= $_POST['us-id'];
    $psw = $_POST['opsw'];
    $npsw = $_POST['npsw'];

    try{
        $sql = "Select password from login_details where userId = :user LIMIT 1";
        $query = getConn()->prepare($sql);
        $query->bindParam(':user', $oid);
        //$query->bindParam(':psw', $psw);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);

        foreach($query->fetchAll() as $post_val) {
           if (password_verify($psw, $post_val['password'])) {
              updateSec($id, $npsw, $oid);                       
           }else {
               echo('Incorrect old password');
           }
            
        }
        
    }
    catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
}

elseif ($_POST['rType']=='save-acct') {
    $fn= $_POST['fn'];
    $ln= $_POST['ln'];
    $em = $_POST['email'];
    $state = $_POST['state'];
    $cou = $_POST['country'];
    $addr = $_POST['addr'];
    $dpt = $_POST['dept'];
    $id= $_POST['us-id'];

    $abstPath = 'file:///C:/wamp64/www/projectallocation/';
    $temp = explode(".", $_FILES["pic"]["name"]);
    $newfilename = $id.'_'.round(microtime(true)).'.'.end($temp);
    $destiFilePath = $abstPath.'student/uploads/'.$newfilename;
    $pic = '//localhost/projectallocation/student/uploads/'.$newfilename;

    if (!move_uploaded_file($_FILES['pic']['tmp_name'], $destiFilePath)) {
        echo 'An error occured while trying to upload your picture. Try again';
    } else {
        try{
        $sql = "UPDATE students set `first_name`=:fn, last_name=:ln, email=:em, dept=:dt,
        address=:addr, img=:pic, state=:st, country=:co where `matric_number`=:id;";
        $query = getConn()->prepare($sql);
        $values = [
            ':id' => $id,
            ':fn' => $fn,
            ':ln' => $ln,
            ':em' => $em,
            ':dt' => $dpt,
            ':addr' => $addr,
            ':pic' => $pic,
            ':st' => $state,
            ':co' => $cou          
        ];
        $query->execute($values);
        echo 'done';
        
    }
    catch(PDOException $e) {             
      echo "Error: ".$e->getMessage();
    }    
    }

    
}

elseif ($_POST['rType']=='stu-save-acct') {
    $fn= $_POST['fn'];
    $ln= $_POST['ln'];
    $em = $_POST['email'];
    $state = $_POST['state'];
    $cou = $_POST['country'];
    $addr = $_POST['addr'];
    $dpt = $_POST['dept'];
    $id= $_POST['us-id'];
    $sup = $_POST['sup'];
   
        try{
        $sql = "UPDATE students set `first_name`=:fn, last_name=:ln, email=:em, dept=:dt,
        address=:addr, sup_id=:sp, state=:st, country=:co where `matric_number`=:id;";
        $query = getConn()->prepare($sql);
        $values = [
            ':id' => $id,
            ':fn' => $fn,
            ':ln' => $ln,
            ':em' => $em,
            ':dt' => $dpt,
            ':addr' => $addr,
            ':sp' => $sup,
            ':st' => $state,
            ':co' => $cou          
        ];
        $query->execute($values);
        echo 'done';
        
    }
    catch(PDOException $e) {             
      echo "Error: ".$e->getMessage();
    }      
}

elseif ($_POST['rType']=='sup-save-acct') {
    $fn= $_POST['fn'];
    $ln= $_POST['ln'];
    $em = $_POST['email'];
    $state = $_POST['state'];
    $cou = $_POST['country'];
    $addr = $_POST['addr'];
    $dpt = $_POST['dept'];
    $id= $_POST['us-id'];
   
        try{
        $sql = "UPDATE supervisors set `first_name`=:fn, last_name=:ln, email=:em, dept=:dt,
        address=:addr, state=:st, country=:co where `user_id`=:id;";
        $query = getConn()->prepare($sql);
        $values = [
            ':id' => $id,
            ':fn' => $fn,
            ':ln' => $ln,
            ':em' => $em,
            ':dt' => $dpt,
            ':addr' => $addr,
            ':st' => $state,
            ':co' => $cou          
        ];
        $query->execute($values);
        echo 'done';
        
    }
    catch(PDOException $e) {             
      echo "Error: ".$e->getMessage();
    }      
}

elseif ($_POST['rType']=='choose-project') {
    $id=$_POST['id'];
    $us_id=$_SESSION['pa-student'];

    try{
        $sql = "UPDATE projects set `stud_id`=:sd where `proj_id`=:id LIMIT 1;";
        $query = getConn()->prepare($sql);
        $values = [
            ':id' => $id,            
            ':sd' => $us_id          
        ];
        $query->execute($values);
        echo 'done';
        
    }
    catch(PDOException $e) {             
      echo "Error: ".$e->getMessage();
    }
}

elseif ($_POST['rType'] == 'add-ticket') {
    $title= $_POST['subj'];
    $desc = $_POST['tic_desc'];
    $us_id = $_POST['id'];
    $id = 'TIC_'.round(microtime(true));
    $st=0;

    try{
        $sql = "INSERT INTO tickets (`tic_id`, `subject`, `msg`, `stud_id`, `status`) 
           VALUES (:id, :sb, :de, :sd, :st);";
        $query = getConn()->prepare($sql);
        $values = [
            ':id' => $id,
            ':sb' => $title,
            ':de' => $desc,
            ':sd' => $us_id,
            ':st' => $st
        ];
        $query->execute($values);
        echo 'done';
        
    }
    catch(PDOException $e) {          
    echo "Error: ".$e->getMessage();
    }
}

elseif ($_POST['rType']=='reply-ticket') {
    $id=$_POST['id'];
    $rmsg=$_POST['rep-msg'];
    $st=1;

    try{
        $sql = "UPDATE tickets set `reply`=:rp, `status`=:st where `tic_id`=:id LIMIT 1;";
        $query = getConn()->prepare($sql);
        $values = [
            ':id' => $id,            
            ':rp' => $rmsg,
            ':st' => $st        
        ];
        $query->execute($values);
        echo 'done';
        
    }
    catch(PDOException $e) {             
      echo "Error: ".$e->getMessage();
    }
}

elseif ($_POST['rType']=='tic-solve') {
    $id=$_POST['un-id'];
    $st=2;

    try{
        $sql = "UPDATE tickets set `status`=:st where `tic_id`=:id LIMIT 1;";
        $query = getConn()->prepare($sql);
        $values = [
            ':id' => $id,            
            ':st' => $st        
        ];
        $query->execute($values);
        echo 'done';
        
    }
    catch(PDOException $e) {             
      echo "Error: ".$e->getMessage();
    }
}

elseif ($_POST['rType']=='remove-assign') {
    $id=$_POST['un-id'];
    $st='';
    try{
        $sql = "UPDATE projects set `stud_id`=:st where `proj_id`=:id LIMIT 1;";
        $query = getConn()->prepare($sql);
        $values = [
            ':id' => $id,            
            ':st' => $st        
        ];
        $query->execute($values);
        echo 'done';
        
    }
    catch(PDOException $e) {             
      echo "Error: ".$e->getMessage();
    }
}

elseif ($_POST['rType'] == 'get-supervisor') {
    $id = $_POST['id'];
    try{
        $sql = "Select first_name, last_name, sup_id, matric_number from students where matric_number = :user LIMIT 1";
        $query = getConn()->prepare($sql);
        $query->bindParam(':user', $id);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $val =array();
        foreach($query->fetchAll() as $val) {}
        if (count($val)>0) {
            echo json_encode($val);
        } else {
            echo 'not found';
        }
    }
    catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
}

elseif ($_POST['rType'] == 'add-cust-proj') {
    $title1= $_POST['topic1'];
    $desc1 = $_POST['desc1'];
    $title2= $_POST['topic2'];
    $desc2 = $_POST['desc2'];
    $title3= $_POST['topic3'];
    $desc3 = $_POST['desc3'];
    $us_id = $_POST['id'];
    $id1 = 'CUS_1_'.round(microtime(true));
    $id2 = 'CUS_2_'.round(microtime(true));
    $id3 = 'CUS_3_'.round(microtime(true));
    $grp = 'CUS_GRP_'.round(microtime(true));
    $st=0;

    try{
        $sql = "Select * from custom_projects where stud_id = :user LIMIT 1";
        $query = getConn()->prepare($sql);
        $query->bindParam(':user', $us_id);
        //$query->bindParam(':psw', $psw);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);

        foreach($query->fetchAll() as $post_val) {
           die('You can only send custom project topics request once in a life time.');
        }
        
    }
    catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }


    try{
        $sql = "INSERT INTO custom_projects (`custom_id`, `topic`, `descr`, `stud_id`, `status`, grp_id) 
           VALUES (:id1, :tp1, :de1, :sd, :st, :grp);
           INSERT INTO custom_projects (`custom_id`, `topic`, `descr`, `stud_id`, `status`, grp_id) 
           VALUES (:id2, :tp2, :de2, :sd, :st, :grp);
           INSERT INTO custom_projects (`custom_id`, `topic`, `descr`, `stud_id`, `status`, grp_id) 
           VALUES (:id3, :tp3, :de3, :sd, :st, :grp);";
        $query = getConn()->prepare($sql);
        $values = [
            ':id1' => $id1,
            ':id2' => $id2,
            ':id3' => $id3,
            ':grp' => $grp,
            ':tp1' => $title1,
            ':de1' => $desc1,
            ':tp2' => $title2,
            ':de2' => $desc2,
            ':tp3' => $title3,
            ':de3' => $desc3,
            ':sd' => $us_id,
            ':st' => $st
        ];
        $query->execute($values);
        echo 'done';
        
    }
    catch(PDOException $e) {          
    echo "Error: ".$e->getMessage();
    }
}

elseif ($_POST['rType'] == 'upd-cust-proj') {
    $title= $_POST['subj'];
    $desc = $_POST['desc'];
    $id = $_POST['id'];

    try{
        $sql = "UPDATE custom_projects set  `topic`=:tp, `descr`=:de where custom_id=:id;";
        $query = getConn()->prepare($sql);
        $values = [
            ':id' => $id,
            ':tp' => $title,
            ':de' => $desc
        ];
        $query->execute($values);
        echo 'done';
        
    }
    catch(PDOException $e) {  
           
    echo "Error: ".$e->getMessage();
    }
}

elseif ($_POST['rType'] == 'sup-choose-project') {
    $id = $_POST['id'];
    $sid = getProject($id, 'student');
    $st=1;
    $s=0;
    try{
        $sql = "UPDATE projects set `status`=:st where proj_id=:id;
        UPDATE custom_projects set `status`=:stt where stud_id=:sid;";
        $query = getConn()->prepare($sql);
        $values = [
            ':id' => $id,
            ':st' => $st,
            ':stt' =>$s,
            ':sid' =>$sid
        ];
        $query->execute($values);
        echo 'done';
        
    }
    catch(PDOException $e) {  
           
    echo "Error: ".$e->getMessage();
    }
}

elseif ($_POST['rType'] == 'sup-choose-cus-project') {
    $id = $_POST['id'];
    $st=1;
    $stud_id = getCustomProject($_POST['id'], 'student');
    $g_id = getCustomProject($_POST['id'], 'grp');
    $stt=0;
    try{
        $sql = "UPDATE projects set `status`=:stt, `stud_id`=''  where stud_id=:sid;
        UPDATE custom_projects set `status`=:stt where grp_id=:gid;
        UPDATE custom_projects set `status`=:st where custom_id=:id;";
        $query = getConn()->prepare($sql);
        $values = [
            ':sid' => $stud_id,
            ':stt' => $stt,
            ':id' => $id,
            ':st' => $st,
            ':gid' => $g_id
        ];
        $query->execute($values);       
        echo 'done';
    }
    catch(PDOException $e) {  
           
    echo "Error: ".$e->getMessage();
    }
}

elseif ($_POST['rType'] == 'del-stu') {
    $id = $_POST['id'];
    $em="";
    $st = 0;
    
    try{
        $sql = "delete from students where matric_number=:id;
        delete from tickets where stud_id=:id;
        delete from login_details where userId=:id;
        UPDATE projects set `stud_id`=:em, status = :st where`stud_id`=:id;";
        $query = getConn()->prepare($sql);
        $values = [
            ':id' => $id,
            ':em' => $em,
            ':st' => $st
        ];
        $query->execute($values);       
        echo 'done';
    }
    catch(PDOException $e) {  
           
    echo "Error: ".$e->getMessage();
    }
}

elseif ($_POST['rType'] == 'del-sup') {
    $id = $_POST['id'];
    $em="";
    
    try{
        $sql = "delete from supervisors where user_id=:id;
        delete from tickets where stud_id=:id;
        delete from login_details where userId=:id;
        UPDATE students set `sup_id`=:em where `sup_id`=:id;";
        $query = getConn()->prepare($sql);
        $values = [
            ':id' => $id,
            ':em' => $em
        ];
        $query->execute($values);       
        echo 'done';
    }
    catch(PDOException $e) {  
           
    echo "Error: ".$e->getMessage();
    }
}

else {
    echo 'Invalid request';
}

function updateSec($id, $psw, $oid){
    $psw = password_hash($psw, PASSWORD_DEFAULT);
    try{
        $sql = "UPDATE login_details set `password`=:ps, userId=:idd where `userId`=:id;
        UPDATE students set matric_number=:idd where `userId`=:id;";
        $query = getConn()->prepare($sql);
        $values = [
            ':id' => $oid,
            ':ps' => $psw,
            ':idd' => $id
           
        ];
        $query->execute($values);
        echo 'done';
        
    }
    catch(PDOException $e) {  
           
    echo "Error: ".$e->getMessage();
    }
}
?>