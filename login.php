<?php
session_start();
if(isset($_SESSION['SESSION_EMAIL'])){
  header('location:index.php');
  die();}

include './config.php';

if(isset($_GET['verification'])){
  if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `users` WHERE code='{$_GET['verification']}'"))>0){
    $querry = mysqli_query($conn,"UPDATE `users` SET code='' WHERE code ='{$_GET['verification']}'");
    
    if ($querry){
      $message[] = 'Your account has been verified. Enjoy!!';}
    } else {
      header('location:login.php');}
} 



if(isset($_POST['submit'])){

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

  $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email ='$email' AND password='$pass' ") or die ('query failed');

  if(mysqli_num_rows($select_users) > 0){
  $row = mysqli_fetch_assoc($select_users);

   if(($row['user_type']=='admin') && empty($row['code'])){
    $_SESSION['admin_name']= $row['name'];
    $_SESSION['admin_email']= $row['email'];
    $_SESSION['admin_id']= $row['id'];
    header('location:admin_page.php');

   } elseif(($row['user_type']=='user') && empty($row['code'])){
    $_SESSION['user_name']= $row['name'];
    $_SESSION['user_email']= $row['email'];
    $_SESSION['user_id']= $row['id'];
    header('location:index.php');
  }else {
    $message[] = 'Please verify your account and try again.';
  } 
}else {
    $message[] = 'incorrect email or password!';
  } 
}
?>

<?php
$title = 'login';
$page = 'login';
include_once('./php/header.php');
?>
    <link rel="stylesheet" href="style.css" />
<?php 
    include_once('./php/nav_login.php');
    ?>
<?php
if(isset($message)){
  foreach ($message as $message){
    echo '
    <div class="message">
      <span>'.$message.'</span>
      <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
    </div>
    ';
  }
}
?>
    <!-- login form  -->
    <div class="login-form-container" id="content-login">
      <form action="" method="post">
        <h3>sign in</h3>
        <span>username</span>
        <input
          type="email"
          name="email"
          class="box"
          placeholder="enter your email"
          required
        />
        <span>password</span>
        <input
          type="password"
          name="password"
          class="box"
          placeholder="enter your password"
          required
        />

        <input type="submit" name="submit" value="sign in" class="btn" />
        <p>don't have an account ? <a href="register.php">create one</a></p>
      </form>
    </div>

</body>
</html>