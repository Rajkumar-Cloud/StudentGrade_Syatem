<?php
  include("connection.php");
  if(isset($_REQUEST['student_Data'])) {
  	$roll_no  = $_REQUEST['roll_no'];
  	$name = $_REQUEST['name'];
  	$email = $_REQUEST['email'];
  	$mobile = $_REQUEST['mobile'];
  	$dept = $_REQUEST['dept'];
  	$subjects = $_REQUEST['subjects'];
  	$sub1 = $_REQUEST['subject1'];
  	$sub2 = $_REQUEST['subject2'];
  	$sub3 = $_REQUEST['subject3'];
  	$sub4 = $_REQUEST['Subject4'];
  	$sub5 = $_REQUEST['Subject5'];
  	$total = 500;
    $mark_obtain = floor($_REQUEST['total']);
  	$stu_result = $_REQUEST['result'];
  	$grade = $_REQUEST['grade'];
    $query = "INSERT INTO student (roll_no,name, email, mobile, dept) VALUES ('".$roll_no."','".$name."','".$email."','".$mobile."','".$dept."')";
    $result = $link->prepare($query);
    $result->execute();
    $last_id = $link->lastInsertId();
    if($last_id){
      $query1 = "INSERT INTO result (stu_id,roll_no,subject,sub1,sub2,sub3,sub4,sub5,total,mark_obtain,result,grade)
       VALUES ('".$last_id."','".$roll_no."','".$subjects."','".$sub1."','".$sub2."','".$sub3."','".$sub4."','".$sub5."','".$total."','".$mark_obtain."','".$stu_result."','".$grade."')";
      $result1 = $link->prepare($query1);
      $result1->execute();
      echo 'success';
    }
  }

  if(isset($_REQUEST['updateStudent_Data'])) {
  $update_id  = $_REQUEST['update_id'];
    $roll_no  = $_REQUEST['roll_no'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $mobile = $_REQUEST['mobile'];
    $dept = $_REQUEST['dept'];
    $subjects = $_REQUEST['subjects'];
    $data_arr = [
      'id' => $update_id,
      'roll_no' => $roll_no,
      'name' => $name,
      'email' => $email,
      'mobile' => $mobile,
      'dept' => $dept
    ];
    $update_sql = "UPDATE student SET roll_no=:roll_no, name=:name, email=:email, mobile=:mobile, dept=:dept, subjects=:subjects WHERE id=:id";
    $result= $link->prepare($update_sql);
    $result->execute($data_arr);
    if($result) {
      echo "success";
    } else {
      echo "error";
    }
  }

  if(isset($_REQUEST['deleteStudent'])) {
    $del_id  = $_REQUEST['del_id'];
    $s_Sql = "DELETE FROM student WHERE id = '".$del_id."' ";
    $r_Sql = "DELETE FROM result WHERE stu_id = '".$del_id."' ";
    $result = $link->prepare($s_Sql);
    $result1 = $link->prepare($r_Sql);
    $result->execute();
    $result1->execute();
    if($result) {
      echo "success";
    } else {
      echo "error";
    }
  }
?>
