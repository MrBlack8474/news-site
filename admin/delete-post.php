<?php
include("config.php");
// $_SESSION['post_id'];
// if($_SESSION["user_role"]=='0'){
//     header('location: post.php');
//   }
$postid=$_POST['post_id'];
// print_r($_post);

echo $postid;
die();
$sql='DELETE FROM post WHERE  post_id={$postid}';
$result=mysqli_query($conn,$sql);
header("location: post.php");
