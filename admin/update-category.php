<?php include "header.php"; 
if($_SESSION["user_role"]=='1'){

if(isset($_POST["save"])){
    include "config.php";
    $categoryname=mysqli_escape_string($conn,$_POST["cat"]);
    $id=mysqli_escape_string($conn,$_POST["id"]);

    $sql = "SELECT category_name FROM category WHERE category_name='{$categoryname}' ";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

 if(mysqli_num_rows($result)> 0){
    echo"<p style='color:red' text-align:center;margin:10px 0;'>category is already present </p>";

 }else{
    $sql1="UPDATE category  SET category_name='{$categoryname}' WHERE  category_id='{$id}'";
     if(mysqli_query($conn,$sql1)){
        header("location: category.php");
     }
}
}
}else {
    header("location; post.php");
}
?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
              <?php
                include"config.php";
                $category_id= $_GET['id'];
                $sql="SELECT * FROM category WHERE category_id={$category_id}";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)> 0){
                    while($row=mysqli_fetch_assoc($result)){
                ?>

                  <!-- Form Start -->
                  <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" autocomplete="off">
                  <div class="form-group">
                          <input type="hidden" name="id"  class="form-control" value="<?php echo $row['category_id'];?>" placeholder="" >
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
                  <?php
                    }}
                    ?>
              </div>
          </div>
      </div>
  </div>
 </php 
    ?>
<?php include "footer.php"; ?>
