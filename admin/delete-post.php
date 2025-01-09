<?php
include "header.php";
include "config.php";
session_start();
// $_SESSION['user_id'];
// if($_SESSION["user_role"]=='0'){
//     header('location: post.php');
//   }
$postid=$_GET["id"];
// print_r($_post);

// echo $postid;
// die();
$sql = "DELETE FROM post WHERE post_id = {$postid}";
$result=mysqli_query($conn,$sql);
header("{$hostname}/admin/post.php");
