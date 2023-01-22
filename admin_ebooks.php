<?php
include 'config.php';

session_start();
$admin_id= $_SESSION['admin_id'];

if(!isset($admin_id)){
  header('location:login.php');
};

if(isset($_POST['add_product'])){

$title = mysqli_real_escape_string($conn, $_POST['title']);
$author = mysqli_real_escape_string($conn, $_POST['author']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$image = $_FILES['image']['name'];
$image_size = $_FILES['image']['size'];
$image_tmp_name = $_FILES['image']['tmp_name'];
$image_folder = 'image/'.$image;
$pdf=$_FILES['pdf']['name'];
$pdf_type=$_FILES['pdf']['type'];
$pdf_size=$_FILES['pdf']['size'];
$pdf_tem_loc=$_FILES['pdf']['tmp_name'];
$pdf_store="pdf/".$pdf;

$select_product_name = mysqli_query($conn, "SELECT title FROM `ebook` WHERE title = '$title'") or die('query failed');

if(mysqli_num_rows($select_product_name) > 0){
   $message[] = 'the book is already added';
}else{
   $add_product_query = mysqli_query($conn, "INSERT INTO `ebook`(title, author, description, image, pdf) VALUES('$title', '$author', '$description', '$image', '$pdf')") or die('query failed');

   if($add_product_query){
      if(($image_size > 2000000)||($pdf_size> 2000000)){
         $message[] = 'the file is too large';
      }else{
         move_uploaded_file($image_tmp_name, $image_folder);
         move_uploaded_file($pdf_tem_loc,$pdf_store);
         $message[] = 'product added successfully!';
      }
   }else{
      $message[] = 'product could not be added!';
   }
}
}

if(isset($_GET['delete'])){
$delete_id = $_GET['delete'];
$delete_image_query = mysqli_query($conn, "SELECT image FROM `ebook` WHERE id = '$delete_id'") or die('query failed');
$fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
unlink('image/'.$fetch_delete_image['image']);
mysqli_query($conn, "DELETE FROM `ebook` WHERE id = '$delete_id'") or die('query failed');
$delete_pdf_query = mysqli_query($conn, "SELECT pdf FROM `ebook` WHERE id = '$delete_id'") or die('query failed');
$fetch_delete_pdf = mysqli_fetch_assoc($delete_pdf_query);
unlink('files/'.$fetch_delete_pdf['pdf']);
mysqli_query($conn, "DELETE FROM `ebook` WHERE id = '$delete_id'") or die('query failed');
header('location:admin_ebooks.php');
}

if(isset($_POST['update_product'])){

$update_p_id = $_POST['update_p_id'];
$update_title = $_POST['update_title'];
$update_author = $_POST['update_author'];
$update_description = $_POST['update_description'];

mysqli_query($conn, "UPDATE `ebook` SET title = '$update_title', author = '$update_author', description = '$update_description'  WHERE id = '$update_p_id'") or die('query failed');

$update_image = $_FILES['update_image']['name'];
$update_image_tmp_name = $_FILES['update_image']['tmp_name'];
$update_image_size = $_FILES['update_image']['size'];
$update_folder = 'image/'.$update_image;
$update_old_image = $_POST['update_old_image'];

if(!empty($update_image)){
   if($update_image_size > 2000000){
      $message[] = 'image file size is too large';
   }else{
      mysqli_query($conn, "UPDATE `ebook` SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
      move_uploaded_file($update_image_tmp_name, $update_folder);
      unlink('image/'.$update_old_image);
   }
}

$update_pdf = $_FILES['update_pdf']['name'];
$update_pdf_tmp_name = $_FILES['update_pdf']['tmp_name'];
$update_pdf_size = $_FILES['update_pdf']['size'];
$update_pdf_type = $_FILES['update_pdf']['type'];
$update_folder = 'pdf/'.$update_pdf;
$update_old_pdf = $_POST['update_old_pdf'];

if(!empty($update_pdf)){
   if($update_pdf_size > 2000000){
      $message[] = 'pdf file size is too large';
   }else{
      mysqli_query($conn, "UPDATE `ebook` SET pdf = '$update_pdf' WHERE id = '$update_p_id'") or die('query failed');
      move_uploaded_file($update_pdf_tmp_name, $update_folder);
      unlink('pdf/'.$update_old_pdf);
   }
}
header('location:admin_ebooks.php');

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Admin products | Salient</title>

    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link rel="stylesheet" href="admin_style.css" />

  </head>
<body>
<?php 
    include_once('./php/header_admin.php');
    ?>

<!-- product CRUD section  -->

<section class="add-products">

   <h1 class="title">Virtual library</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <h3>add a book</h3>
      <input type="text" name="title" class="box" placeholder="title" required>
      <input type="text" name="author" class="box" placeholder="author" required>
      <input type="text" name="description" class="box" placeholder="description" required>
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" placeholder="cover" class="box" required>
      <input type="file" name="pdf" placeholder="pdf" class="box" required>
      <input type="submit" value="add product" name="add_product" class="btn">
   </form>

</section>
<!-- show products  -->

<section class="show-products">

   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `ebook`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <div class="box">
         <img src="image/<?php echo $fetch_products['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_products['title']; ?></div>
         <a href="admin_ebooks.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">update</a>
         <a href="admin_ebooks.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

</section>

<section class="edit-product-form">

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `ebook` WHERE id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
      <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
      <img src="image/<?php echo $fetch_update['image']; ?>" alt="">
      <input type="text" name="update_title" value="<?php echo $fetch_update['title']; ?>" class="box" required placeholder="enter product name">
      <input type="text" name="update_author" value="<?php echo $fetch_update['author']; ?>" class="box" required placeholder="enter book s author">
      <input type="text" name="update_description" value="<?php echo $fetch_update['description']; ?>" class="box" required placeholder="enter book s description">
      <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
      <input type="file" class="box" name="update_pdf" accept="pdf/pdf">
      <input type="submit" value="update" name="update_product" class="btn">
   </form>
   <?php
         }
      }
      }else{
         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
   ?>

</section>



</body>
</html>