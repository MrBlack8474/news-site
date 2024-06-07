<?php
   include'config.php';
  if(isset($_FILES['fileToUpload'])){
    $errors= array();
   //  $file_n=&$file_name;
    $file_name=$_FILES['fileToUpload']['name'];
    $file_size=$_FILES['fileToUpload']['size'];
    $file_tmp=$_FILES['fileToUpload']['tmp_name'];
    $file_type=$_FILES['fileToUpload']['type'];
    $file_ext =(pathinfo($file_name, PATHINFO_EXTENSION));
    $extension=array("jpeg","jpg","png");
     if(in_array($file_ext,$extension)===false){
        $errors[]="this extension file is not allowed, please choose a JPG PNG FILE";
     }else{
     if($file_size>2097152){
        $errors[]= "file must be less then 2 MB";
     }
     if(empty($errors)==true){
        move_uploaded_file($file_tmp,"upload/".$file_name);
     }else{
        print_r($errors);
        die();
     }
}
  }
session_start();

    $title=mysqli_real_escape_string($conn,$_POST['post_title']);
    $descriptio=mysqli_real_escape_string($conn, $_POST['postdesc']);
    $category=mysqli_real_escape_string($conn, $_POST['category']);
    
   //  $image=mysqli_real_escape_string($conn, $_POST['fileToUpload']);
    $date=date("d F,Y") ;
    $author=$_SESSION['user_id'];
    $sql="INSERT INTO post (title,description,category,post_img,author,post_date)  
    VALUES ('{$title}','{$descriptio}','{$category}','{$file_name}',{$author},'{$date}');";
    $sql.="UPDATE category SET post = post+1 WHERE category_name='{$category}' ";
    if(mysqli_multi_query($conn,$sql)){

    header("location: post.php");
    exit;
    }else{
      echo "<div class='alert alert-danger'>Query failed</div>";
    }
 