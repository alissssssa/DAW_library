<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
if(isset($_SESSION['SESSION_EMAIL'])){
  header('location:index.php');
  die();}

require 'vendor/autoload.php';
include './config.php';

if(isset($_POST['submit'])){
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
  $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
  $code = mysqli_real_escape_string($conn, md5(rand()));
  $user_type = $_POST['user_type'];
  $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email ='$email' AND password='$pass' ") or die ('query failed');

  
  if (mysqli_num_rows($select_users)>0) {
    $message[] = 'user already exist!';
    
  }else {
    if (($pass === $cpass)&&(filter_var($email, FILTER_VALIDATE_EMAIL))){
      $sql = "INSERT INTO `users` (name, email, password, code, user_type) VALUES('$name', '$email', '$cpass', '$code', '$user_type')";
      $result = mysqli_query($conn,$sql);
      if($result){
        echo "<div style='display:none;'>";
     
      $mail = new PHPMailer(true);

      try {
          //Server settings
          $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
          $mail->isSMTP();                                            //Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
          $mail->Username   = 'salientlibrary@gmail.com';                     //SMTP username
          $mail->Password   = 'djbcfzsnwdeojbhj';                               //SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
          $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

          //Recipients
          $mail->setFrom('salientlibrary@gmail.com');
          $mail->addAddress($email);  

          //Content
          $mail->isHTML(true);                                  //Set email format to HTML
          $mail->Subject = 'Salient - mail verification';
          $mail->Body    = 'Please verify your email adress. Here is your verification link <b> <a href="http://localhost:3000/?verification='.$code.'">http://localhost:3000/?verification='.$code.'</a> </b>';

          $mail->send();
          echo 'Message has been sent';
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
      echo "</div>";
      $message[] = 'We have sent a verification link on your email adress!';
    }else{
      $message[] = 'Something went wrong.';
    }
  } else {
    $message[] = 'The password confirmation does not match.';
  }
  }} 
?>

<?php
$title = 'Register';
$page = 'register';
include_once('./php/header.php');
?>
<?php 
    include_once('./php/nav_login.php');
    ?>
  <link rel="stylesheet" href="style.css" />
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
    <div class="register-form-container" id="content">
      <form action="" method="post" >
        <h3>register</h3>
        <span>name</span>
        <input
          type="text"
          name="name"
          class="box"
          placeholder="enter your name"
          value="<?php if (isset($_POST['submit'])) {echo $name; } ?>"
          required
        />
        <span>username</span>
        <input
          type="email"
          name="email"
          class="box"
          placeholder="enter your email"
          value="<?php if (isset($_POST['submit'])) {echo $email; } ?>"
          required
        />
        <span>password</span>
        <input
          type="password"
          name="password"
          class="box"
          placeholder="enter your password"
        />
        <span>confirm password</span>
        <input
          type="password"
          name="cpassword"
          class="box"
          placeholder="confirm your password"
          required
        />
        <span>Select the type of user</span>
        <select class="box" name="user_type">
          <option value="user">user</option>
          <option value="admin">admin</option>
        </select>
        <input type="submit" name="submit" value="register now" class="btn" />
        <p>already have an account? <a href="login.php">sign in</a></p>
      </form>
    </div>

</body>
</html>