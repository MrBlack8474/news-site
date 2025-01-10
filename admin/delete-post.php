<?php

include "config.php";
session_start();
// $_SESSION['user_id'];
// if($_SESSION["user_role"]=='0'){
//     header('location: post.php');
//   }
$postid=$_GET["id"];
$category=$_GET["catid"];
// $category =mysqli_real_escape_string($conn,$_POST['category']);
// $category=mysqli_real_escape_string($conn, $_POST['category']);
// print_r($_post);

// echo $postid;
// die();
$sql = "DELETE FROM post WHERE post_id = {$postid};";
$sql .= "UPDATE category  SET post =post-1 WHERE category_id='{$category}'";
$result=mysqli_multi_query($conn,$sql);
header("{$hostname}/admin/post.php");
