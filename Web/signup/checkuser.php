<?php
  if(!isset($_POST['newemail'])){
      header('Refresh: 3;url=../');
      echo "something went wrong, you will be redirected
            <a href='../'><p>Click here if nothing happens</p></a>
            ";
      exit();
  }
  $checkpass=0;
  if(isset($_POST['pass'])){
    $checkpass=1;
  }

  $con = mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","notesofcourse_c","testing123","notesofcourse_nocdb");

  $newemail = $_POST['newemail'];

  $result = mysqli_query($con, "SELECT * FROM Users where `Email` = '$newemail'");

  if($checkpass){
    $row = mysqli_fetch_assoc($result);
    if($row['password']!=$_POST['pass']){
      echo 'notmatch';
    }else{
      echo 'match';
    }
  }else{
    if (mysqli_num_rows($result) >0){
      echo 'exist';
    }else{
      echo 'notexist';
    }
  }
?>