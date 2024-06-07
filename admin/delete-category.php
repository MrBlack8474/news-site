<?php
include("config.php");
if($_SESSION["user_role"]=='0'){
    header('location: post.php');
  }else{
$id=$_GET["id"];
$sql="DELETE FROM category WHERE category_id='{$id}'";
$result=mysqli_query($conn,$sql);
header("location: category.php");
  }