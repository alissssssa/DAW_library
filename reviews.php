<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'message sent successfully!';
   }

}

?>

<?php
$title = 'Reviews';
$page = 'reviews';
include_once('./php/header.php');
?>
  <link rel="stylesheet" href="style.css" />
<?php 
include_once('./php/nav.php');
?>

    <div class="reviews-container">
      <h2 class="heading-secondary">Reviews</h2>

      <div class="reviews">
        <figure class="review">
          <img
            class="reviews-img"
            alt="Photo of customer Dave Bryson"
            src="./image/dave.jpg"
          />
          <blockquote class="reviews-text">
          The Salient Library is a centralled located place with very good collection of books ranging from subjects like history,politics,current affairs,specialized subject books & many more.This library offers a very good place for students & people who want to sit back,read & study.The library is modernly built one with cleanliness all around.
          </blockquote>
          <p class="reviews-name">&mdash; Dave Bryson</p>
        </figure>

        <figure class="review">
          <img
            class="reviews-img"
            alt="Photo of customer Ben Hadley"
            src="./image/steve.jpg"
          />
          <blockquote class="reviews-text">
          I live in Timisoara city so I often visit Salient. It is a very good library situated in a prime area there are lots of books that you can read from here.
          </blockquote>
          <p class="reviews-name">&mdash; Ben Hadley</p>
        </figure>

        <figure class="review">
          <img
            class="reviews-img"
            alt="Photo of customer Steve Miller"
            src="./image/steve.jpg"
          />
          <blockquote class="reviews-text">
          It is a best place for the person whose hobby is to read. and also very helpful for student for the preparation of their examination. There are so many Great books available here and there are many books of general knowledge. The atmosphere of the library is so so much good so you can also feel mental peace.
          </blockquote>
          <p class="reviews-name">&mdash; Steve Miller</p>
        </figure>

        <figure class="review">
          <img
            class="reviews-img"
            alt="Photo of customer Hannah Smith"
            src="./image/hannah.jpg"
          />
          <blockquote class="reviews-text">
          A place for book lover , one can find books for almost all interests, a separte section for kids, and a small portion is for smaller kids equipped with play toys is making this place a family visiting place, you can come with your kids of all ages and here they can find something for their age group, and yes you can get a huge selection of books for yourself too.</blockquote>
          <p class="reviews-name">&mdash; Hannah Smith</p>
        </figure>
      </div>
    </div> 
  <?php 
  include_once('./php/footer.php');
  ?>
  </body>
