<?php
include "config.php";
// session_start();
if(isset($_FILES['fileToUpload'])){
    $error=array();
    $file_name=$_FILES['fileToUpload']['name'];
    $file_size=$_FILES['fileToUpload']['size'];
    $file_tmp=$_FILES['fileToUpload']['tmp_name'];
    $file_type=$_FILES['fileToUpload']['type'];
    $x=explode('.',$_FILES['name']);
    $file_ext=strtolower(end($x));
    $extension=array("jpeg","jpg","png");
    if(in_array($file_ext,$extension)=== false){
        $error[]="this file format is not support try only valid format";

    }
    if($file_size>2097152){
        $error="File size must be 2 MB or lower";
    }
    if(empty($error)==true){
        move_uploaded_file($file_tmp,"admin/upload/".$file_name);
    }else{
        print_r($error);
    }
}
session_start();
$title=mysqli_real_escape_string($conn,$_POST['post_title']);
$description=mysqli_real_escape_string($conn,$_POST['postdesc']);
$category= mysqli_real_escape_string($conn,$_POST['category']);
$date =date("d M Y");

$author=$_SESSION['user_id'];

$sql="INSERT INTO post(title,description,category,post_date,author,post_img)
        VALUE ('{$title}','{$description}','{$category}','{$date}','{$author}','{$file_name}');";
$sql.="UPDATE category SET post=post+1 WHERE Category_id ={$category}";

if(mysqli_multi_query($conn,$sql)){
    header("{$hostname}/admin/post.php");
}else{
    echo "<div class='alert-danger'>Query Failed.>/div>";
}


?>