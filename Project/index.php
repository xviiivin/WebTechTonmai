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
    require './include/config.php';

    include("include/components/navbar.php");
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
  <section>
    <footer class="bg-black text-left mt-40">
      <div class="container p-9 mx-auto">
        <div class="flex justify-between grid-cols-2 md:grid md:grid-cols-3">
          <!-- <div class="mb-6">
            <p class="uppercase font-bold mb-3 text-white">TonMai</p>
            <p class="text-white">Smoke weed every days</p>
          </div> -->

          <div class="mb-6">
            <p class="uppercase font-bold mb-3 text-white">Name</p>
            <ul class="text-white">
              <li>Kamon lertanasin</li>
              <li class="mt-1.5">Thanakorn Sriwannawit</li>
              <li class="mt-1.5">Norrapat Srimoonnoi</li>
              <li class="mt-1.5">Wiranyupa Petch-in </li>
              <li class="mt-1.5">Wiwat liangkobkit</li>
            </ul>
          </div>

          <div class="mb-6">
            <p class="uppercase font-bold mb-3 text-white">Student ID</p>
            <ul class="text-white">
              <li class="mt-1.5">64070001</li>
              <li class="mt-1.5">64070040</li>
              <li class="mt-1.5">64070054</li>
              <li class="mt-1.5">64070231</li>
              <li class="mt-1.5">64070232</li>
            </ul>
          </div>

          <div class="mb-6 hidden md:block">
            <p class="uppercase font-bold mb-3 text-white">Contact</p>
            <ul class="text-white">
              <li>
                <div class="flex mb-2.5">
                  <a href="https://www.facebook.com/profile.php?id=100009958903102" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-3">
                      <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                      </path>
                    </svg>
                  </a>
                  <a href="https://www.instagram.com/fewfkn_/" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-3">
                      <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                      <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                      <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                  </a>
                  <a href="https://github.com/fewkamon" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
                      <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                      </path>
                    </svg>
                  </a>
                </div>
              </li>
              <li>
                <div class="flex mb-3">
                  <a href="https://www.facebook.com/thanakorn.sri.96" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-3">
                      <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                      </path>
                    </svg>
                  </a>
                  <a href="https://www.instagram.com/tnksw_/" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-3">
                      <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                      <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                      <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                  </a>
                  <a href="https://github.com/64070040Thanakorn" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
                      <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                      </path>
                    </svg>
                  </a>
                </div>
              </li>
              <li>
                <div class="flex mb-3">
                  <a href="https://www.facebook.com/profile.php?id=100082222984461" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-3">
                      <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                      </path>
                    </svg>
                  </a>
                  <a href="https://www.instagram.com/_tortlee/" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-3">
                      <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                      <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                      <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                  </a>
                  <a href="https://github.com/7E8J" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
                      <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                      </path>
                    </svg>
                  </a>
                </div>
              </li>
              <li>
                <div class="flex mb-3">
                  <a href="https://www.facebook.com/nniew.wryp/" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-3">
                      <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                      </path>
                    </svg>
                  </a>
                  <a href="https://www.instagram.com/niniewwys/" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-3">
                      <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                      <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                      <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                  </a>
                  <a href="https://github.com/Wiranyupaa" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
                      <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                      </path>
                    </svg>
                  </a>
                </div>
              </li>
              <li>
                <div class="flex mb-3">
                  <a href="https://www.facebook.com/profile.php?id=100008180315272" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-3">
                      <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                      </path>
                    </svg>
                  </a>
                  <a href="https://www.instagram.com/xviiivin/" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-3">
                      <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                      <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                      <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                  </a>
                  <a href="https://github.com/xviiivin" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
                      <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                      </path>
                    </svg>
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="bg-white text-gray text-center flex justify-center pt-2 mb-3">
        <p class="inline">© Open Source : TonMai</p>
        <a href="https://github.com/xviiivin/WebTechTonmai/" class="ml-3 mt-1" target="_blank">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
            <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
            </path>
          </svg>
        </a>
      </div>
    </footer>
  </section>
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