<?php include "header.php"; 

if(isset($_POST['save'])){
    include "config.php";
    $Cat_name=mysqli_escape_string($conn,$_POST["cat"]);
    $sql="SELECT category_name FROM category where category_name='{$Cat_name}'";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if(mysqli_num_rows($result)>01){
        echo "<p style='color:red;'>Category Already Exist</p>";
    }
    else{
        $sql1="INSERT INTO category (category_name)
         VALUES ('{$Cat_name}')";
        // INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES (NULL, 'ljds', '0');
         if(mysqli_query($conn,$sql1) ){
            header("{$hostname}/admin/category.php");
         }
    }
}


?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
