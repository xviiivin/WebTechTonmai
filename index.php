<?php
$link = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
session_start();

error_reporting(1);
ob_start();



if (empty($_SESSION["cart"])) {
  $_SESSION["cart"] = [];
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./assets/css/output.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/home.css">
  <link rel="stylesheet" href="./assets/css/output.css" />
  <link rel="stylesheet" href="./assets/css/all.min.css" />
  <link rel="stylesheet" href="./assets/css/fontawesome.css" />
  <title>Ton Mai</title>
  <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500;600;700&display=swap');

  * {
    margin: 0;
    padding: 0;
    font-family: 'Kanit', sans-serif;
  }

  div.sticky {
    position: -webkit-sticky;
    position: sticky;
    top: 0;
  }
</style>

<body>

  <div id="navbar_hidden" class="sticky z-50 transition-all duration-500">
    <?php
    if ($_GET["page"] != "checkout") {
      require './include/config.php';

      include("include/components/navbar.php");
    }
    ?>
  </div>

  <?php
  if ($_GET["page"] == "") {
    include("page/home.php");
  } else if ($_GET["page"] == "login") {
    include("page/login.php");
  } else if ($_GET["page"] == "account") {
    include("page/account/index.php");
  } else if ($_GET["page"] == "address") {
    include("page/account/address.php");
  } else if ($_GET["page"] == "register") {
    include("page/register.php");
  } else if ($_GET["page"] == "cart") {
    include("page/cart.php");
  } else if ($_GET["page"] == "product") {
    include("page/product.php");
  } else if ($_GET["page"] == "checkout") {
    include("page/checkout.php");
  } else if ($_GET["page"] == "admin") {
    include("page/admin.php");
  } else if ($_GET["page"] == "search") {
    include("page/search.php");
  } else {
    include("page/home.php");
  }
  ?>
  <!-- footer -->

  <?php
  if ($_GET["page"] != "checkout") {
    include("include/components/footer.php");
  }
  ?>
</body>

<script src="./assets/js/gsap.min.js"></script>
<script src="./assets/js/navbar.js"></script>
<script src="./assets/js/home.js"></script>
<script src="./assets/js/all.min.js"></script>
<script src="./assets/js/fontawesome.js"></script>
<script src="./assets/js/home.js"></script>
<script src="./assets/js/alpine.js" defer></script>
<script src="./assets/js/result.js" defer></script>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>
  var prevScrollpos = window.pageYOffset;
  window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
      document.getElementById("navbar_hidden").style.top = "0";
    } else {
      document.getElementById("navbar_hidden").style.top = "-150px";
    }
    prevScrollpos = currentScrollPos;
  }
</script>



</html>