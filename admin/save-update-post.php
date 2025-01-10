<?php
include "config.php";

if(empty($_FILES['new-image']['name'])){
    $file_image=$_POST['old-image'];
}else{
    $errors= array();
    //  $file_n=&$file_name;
     $file_name=$_FILES['new-image']['name'];
     $file_size=$_FILES['new-image']['size'];
     $file_tmp=$_FILES['new-image']['tmp_name'];
     $file_type=$_FILES['new-image']['type'];
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
        $sql="UPDATE post SET title='{$_POST["post_title"]}' ,category={$_POST["category"]} ,description='{$_POST["postdesc"]}' ,post_img='{$file_name}'
        WHERE post_id={$_POST["post_id"]}";

        // $result=mysqli_query($conn,$sql);
        if(mysqli_query($conn,$sql)){
            header("{$hostname}/admin/post.php");

        }else{
            echo "Something went wrong";
        }

?>