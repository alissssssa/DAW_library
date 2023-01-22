<?php
include 'config.php';
if(isset($_GET['verification'])){
  if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `users` WHERE code='{$_GET['verification']}'"))>0){
    $querry = mysqli_query($conn,"UPDATE `users` SET code='' WHERE code ='{$_GET['verification']}'");
    
    if ($querry){
      $message[] = 'Your account has been verified. Enjoy!!';
    }
  } else{
  header('location:index.php');
  }
}
session_start();
$user_id= $_SESSION['user_id'];

if(!isset($user_id)){
  header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_image = $_POST['product_image'];
  $product_quantity = $_POST['product_quantity'];

  $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

  if(mysqli_num_rows($check_cart_numbers) > 0){
     $message[] = 'already added to cart!';
  }else{
     mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
     $message[] = 'product added to cart!';
  }
}

$email="";
if(isset($_POST['subscribe'])){
$email=$_POST['email'];
$select_subscribers = mysqli_query($conn, "SELECT * FROM `subscription` WHERE email ='$email'") or die ('query failed');
if (mysqli_num_rows($select_subscribers)>0) {
  $message[] = 'You are already subscribed';}
  elseif (filter_var($email, FILTER_VALIDATE_EMAIL)){
    $querry1 = mysqli_query($conn,"INSERT INTO `subscription` (email) VALUES ('$email')");
    $message[] = 'You have been successfully subscribed';}
  else{
  $message[] = "Invalid email format";
  } 
}

?>

<?php
$title = 'Home';
$page = 'home';
include_once('./php/header.php');
?>
    <link rel="stylesheet" href="style.css" />
<?php 
    include_once('./php/nav.php');
?>
    <!-- home section -->
    <section class="home" id="home">
      <div class="row">
        <div class="content">
          <h3>Find your favourite</h3>
          <p>
            You can choose to read it online or to order a printed version. Either way we are glad to be here for you and to make reading a pleasure for everyone. 
          </p>
          <a href="collection.php" class="btn">shop now</a>
        </div>

        <div class="books-slider">
          <div>
            <a href="#" class="swiper-slide"
              ><img src="./image/book-2.jpg" alt=""
            /></a>

            <a href="#" class="swiper-slide"
              ><img src="image/book-5.jpg" alt=""
            /></a>
            <a href="#" class="swiper-slide"
              ><img src="image/book-6.jpg" alt=""
            /></a>
          </div>
          <img src="image/stand.png" class="stand" alt="" />
        </div>
      </div>
    </section>

    <!-- icons section -->

    <section class="icons-container">

    <div class="icons">
        <i class="fas fa-book"></i>
        <div class="content">
          <h3>Read free library</h3>
          <p>books available for online reading</p>
        </div>
      </div>

      <div class="icons">
        <i class="fas fa-redo-alt"></i>
        <div class="content">
          <h3>easy returns</h3>
          <p>15 days returns</p>
        </div>
      </div>

      <div class="icons">
        <i class="fas fa-shipping-fast"></i>
        <div class="content">
          <h3>free shipping</h3>
          <p>order over 200 Lei</p>
        </div>
      </div>



      <div class="icons">
        <i class="fas fa-headset"></i>
        <div class="content">
          <h3>24/7 support</h3>
          <p>call us anytime</p>
        </div>
      </div>
    </section>

    <!-- arrivals section  -->
    <section class="products">

<h1 class="title">Electronic books</h1>

<div class="box-container">

   <?php  
      $select_books = mysqli_query($conn, "SELECT * FROM `ebook`") or die('query failed');
      if(mysqli_num_rows($select_books) > 0){
         while($fetch_books = mysqli_fetch_assoc($select_books)){
   ?>
  <form action="" method="post" class="box">
   <img class="image" src="/image/<?php echo $fetch_books['image'];?>" alt="">
   <div class="name"><?php echo $fetch_books['title']; ?></div>
   <div class="author"><?php echo $fetch_books['author']; ?></div>
   <!-- <div class="description"><?php echo $fetch_books['description']; ?></div> -->
   <!-- <input type="submit" value="add to cart" name="add_to_cart" class="btn"> -->
   <a href="/pdf/<?php echo $fetch_books['pdf'];?>" class="btn btn-success">Open</a>

   <a href="/pdf/<?php echo $fetch_books['pdf'];?>" class="btn btn-primary" download="/pdf/<?php echo $fetch_books['pdf'];?>">Download</a>
  </form>
   <?php
      }
   }else{
      echo '<p class="empty">no books here </p>';
   }
   ?>
</div>

</section>

     <!-- newsletter section -->
     <section class="newsletter">
      <form action="" method="post">
        <h3>subscribe for latest updates</h3>
        <input
          type="text"
          name="email"
          placeholder="enter your email"
          id=""
          class="box"
        />
        <input name="subscribe" type="submit" value="subscribe" class="btn" />
      </form>
    </section>
   
    <?php 
    include_once('./php/footer.php');
    ?>
  </body>
</html>
