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
$title = 'Contact us';
$page = 'contact';
include_once('./php/header.php');
?>
    <link rel="stylesheet" href="style.css" />
<?php 
    include_once('./php/nav.php');
    ?>
 <div class="contact-page">
    <h2 class="h2">Get in touch</h2>
    <div class="contact-info">
      <div class="item">
        <i class="icon fas fa-home"></i>
        Bucharest, Library Street 5
      </div>
      <div class="item">
        <i class="icon fas fa-phone"></i>
        0751-593-921
      </div>
      <div class="item">
        <i class="icon fas fa-envelope"></i>
        office@salient.ro
      </div>
      <div class="item">
        <i class="icon fas fa-clock"></i>
        Mon - Fri 8:00 AM to 6:00 PM
      </div>
    </div>
    <form action="" class="contact-form" method="post">
      <input type="text" class="textb" name="name" required placeholder="enter your name" >
      <input type="email" class="textb"  name="email" required placeholder="enter your email">
      <input type="number" name="number" required placeholder="enter your phone number" class="textb">
      <textarea placeholder="Enter your Message" cols="30" rows="10" name="message"></textarea>
      <input type="submit" class="button" value="send message" name="send">
    </form>
  </div>
</body>

<?php 
    include_once('./php/footer.php');
    ?>