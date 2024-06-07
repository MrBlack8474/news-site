<?php
include("config.php");
if($_SESSION["user_role"]=='0'){
    header('location: admin/post.php');
  }
$userid=$_GET["id"];
$sql="DELETE FROM user WHERE user_id='{$userid}'";
$result=mysqli_query($conn,$sql);
header("location: users.php");
