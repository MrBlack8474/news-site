<?php include "header.php"; 

// if(isset($_GET['id'])){
    include "config.php";
    // $userid=mysqli_escape_string($conn, $_POST["user_id"]);
    // $fname= mysqli_escape_string($conn,$_POST["f_name"]);
    // $lname= mysqli_escape_string($conn,$_POST["l_name"]);
    // $user = mysqli_escape_string($conn,$_POST["username"]);
    // // $password= mysqli_escape_string($conn,md5($_POST["password"]));
    // $role = mysqli_escape_string($conn,$_POST["role"]);
 
    $userid=$_GET['id'];

        $sql1="DELETE  FROM user WHERE user_id ={$userid}";
        if(mysqli_query($conn,$sql1)){
           
            header("{$hostname}/admin/users.php"); 
         }
        
    

?>