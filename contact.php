<?php
$title = 'Contact us';
$page = 'contact';
include_once('./php/header.php');
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
    <form action="" class="contact-form">
      <input type="text" class="textb" placeholder="Your Name">
      <input type="email" class="textb" placeholder="Your Email">
      <textarea placeholder="Your Message"></textarea>
      <input type="submit" class="button" value='Send'>
    </form>
  </div>
</body>

<?php 
    include_once('./php/footer.php');
    ?>