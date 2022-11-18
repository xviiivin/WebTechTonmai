<style>
  .swiper {
    width: 100%;
    height: 100%;
  }

  .swiper-slide {
    font-size: 18px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .swiper-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
</style>
<!-- Home -->
<div id="content">

  <!-- Banner -->
  <section>
    <div class="h-[52em] items-center flex">
      <div class="w-full h-full">
        <div class="swiper mySwiper ">
          <div class="swiper-wrapper">
            <?php
            $test = $db->prepare("SELECT * FROM category");
            $test->execute();
            $data = $test->fetchAll();
            foreach ($data as $value) {
            ?>
              <div class="swiper-slide relative">
                <div class="absolute flex flex-col">
                  <div class='border-white mb-5'>
                    <span class="text-[8rem] -mt-[0.3em] mb-6 text-white"><?= $value["name"] ?></span>
                  </div>
                  <!-- <span class="font-medium text-2xl -mt-16 mr-12 text-end">Autumm</span> -->
                  <div class="flex justify-center">
                    <a class="transition duration-500 border-white border py-3 px-12 text-white bg-transparent hover:bg-black hover:text-white hover:border-black" href="<?= $link . "?page=product&categoryid=" . $value["id"] ?>">Shop Now</a>
                  </div>
                </div>

                <img class='brightness-75  z-[-1]' draggable="false" src="img/banner/<?= $value["img"] ?>" alt="" class="">
              </div>

            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- respondsive -->
    <!-- <div class="md:hidden block">
      <div class="flex justify-center mt-12">
        <div class="flex flex-col p-2 items-center">
          <h4 class="font-medium text-lg mb-3">Auspicious Tree</h4>
          <h2 class="text-6xl mb-6">In Stock</h2>
          <button class="border-black border py-2 px-6 bg-black text-white w-36 mb-7">Shop Now</button>
          <div class="flex gap-6">
            <span>
              <div class="bg-black w-3 h-3 rounded-full hover:scale-125 duration-300"></div>
            </span>
            <span>
              <div class="bg-black w-3 h-3 rounded-full hover:scale-125 duration-300"></div>
            </span>
            <span>
              <div class="bg-black w-3 h-3 rounded-full hover:scale-125 duration-300"></div>
            </span>
            <span>
              <div class="bg-black w-3 h-3 rounded-full hover:scale-125 duration-300"></div>
            </span>
          </div>
        </div>
      </div>
    </div> -->
  </section>

  <!-- Popular -->
  <section class="mt-[5em] mb-[5em]">
    <div class="my-12">

      <!-- header -->
      <div class="flex justify-center">
        <h3 class="text-4xl font-bold">New Item Arrived</h3>
      </div>

      <!-- items -->
      <div class="mt-12 mx-3">
        <div class="swiper mySwiper2">
          <div class="swiper-wrapper">
            <?php
            $test = $db->prepare("SELECT * FROM product INNER JOIN category ON category.id = product.category ORDER BY id DESC LIMIT 12");
            $test->execute();
            $data = $test->fetchAll();

            foreach ($data as $value) {
            ?>
              <div class="swiper-slide">
                <a href="<?= $link . "?page=product&categoryid=" . $value["category"] . "&id=" . $value[0] ?>">
                  <img src="uploads/<?= $value["file_name"] ?>" alt="">
                </a>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
</div>
</section>

<!-- Recommended -->
<section id="recommendedhome">
  <div class=" my-12">

    <!-- header -->
    <div class="flex flex-col sm:flex-row justify-center items-center">
      <h3 class="text-3xl font-light mr-3 text-gray-400">Recommended</h3>
      <div id="recommend_tree" class="flex relative inline-block transition-all duraion-500 before:w-full before:h-[2px] before:absolute before:content-[''] before:bg-black before:-bottom-1 min-w-min">
        <div class="flex items-center">
          <p class="text-3xl font-light mr-6 font-medium" id="changetextrecommend">Auspicious Tree</p>
          <i class="fa-sharp fa-solid fa-angle-down"></i>
        </div>
        <div id="recommend_tree_dropdown" class="absolute hidden opacity-0 drop-shadow-xl">
          <ul>


            <?php

            $test123 = $db->prepare("SELECT * FROM category");
            $test123->execute();
            $resultdsads = $test123->fetchAll();
            foreach ($resultdsads as $value) {
            ?>
              <li>
                <span class="bg-white p-3 w-[12em] block hover:bg-gray-200 hover:text-black duration-500 text-gray-500 text-xl" onclick="recommendfew('<?= $value['name'] ?>')"><?= $value["name"] ?></span>
              </li>


            <?php
            }
            ?>

          </ul>
        </div>
      </div>
    </div>

    <!-- items -->
    <div class="mt-3 flex justify-center p-3">


      <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-4" id="fewza1150">


      </div>

      <?php

      $test123 = $db->prepare("SELECT * FROM category");
      $test123->execute();
      $resultdsads = $test123->fetchAll();

      foreach ($resultdsads as $value) {
        $testf = $db->prepare("SELECT * FROM product WHERE category = :category ORDER BY id ASC LIMIT 3");
        $testf->execute([':category' => $value["id"]]);
        $datafewfew = $testf->fetchAll();
      ?>
        <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-4" id="<?= $value["name"] ?>" style="display: none">

          <?php
          foreach ($datafewfew as $value1) {
          ?>
            <div class="">
              <div class="bg-gray-100 w-80 h-80">

                <a href="<?= $link . "?page=product&categoryid=" . $value1["category"] . "&id=" . $value1[0] ?>">

                  <img src="uploads/<?= $value1["file_name"] ?>" alt="">
                </a>

              </div>
            </div>
          <?php
          }
          ?>

        </div>
      <?php
      }
      ?>

    </div>
  </div>
</section>

<!-- all products -->
<section>
  <div class=" my-12">

    <!-- header -->
    <div class="flex justify-center mb-6">
      <h3 class="text-3xl font-light mr-3">All Product</h3>
    </div>

    <div class="flex justify-center mx-44 ">
      <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 grid-flow-row gap-4 mx-6">


        <?php
        $test = $db->prepare("SELECT * FROM product INNER JOIN category ON category.id = product.category ORDER BY id ASC LIMIT 15");
        $test->execute();
        $data = $test->fetchAll();

        foreach ($data as $value) {
        ?>

          <a class="flex bg-gray-200 rounded-lg" href="<?= $link . "?page=product&categoryid=" . $value["category"] . "&id=" . $value[0] ?>">
            <div class="p-3 w-1/3">
              <img class="rounded-lg min-w-12 min-h-12 bg-black" src="./uploads/<?= $value["file_name"] ?>" alt="">
            </div>
            <div class="flex flex-col justify-between py-2 px-3 w-2/3">
              <div>
                <h5 class="text-lg"><?= $value[1] ?></h5>
                <label class="text-gray-400 text-sm"><?= $value["name"] ?> </label>
              </div>
              <div class="flex justify-between items-center">
                <p class="text-lg"><?= number_format((float)$value["price"], 2, ".", "") ?> ฿</p>
                <i class="fa-regular fa-square-plus h-5"></i>
              </div>
            </div>
          </a>
        <?php
        }
        ?>



      </div>
    </div>

  </div>
</section>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>


<script>
  var swiper = new Swiper(".mySwiper", {
    direction: "horizontal",
    speed: 2000,
    allowTouchMove: false,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    effect: 'fade',
    fadeEffect: {
      crossFade: true
    },
  });

  var swiper = new Swiper(".mySwiper2", {
    slidesPerView: 4,
    spaceBetween: 30,
    slidesPerGroup: 4,
    loop: true,
    loopFillGroupWithBlank: true,
    speed: 2000,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
  });


  function recommendfew(type) {
    document.getElementById("changetextrecommend").innerText = type
    const fewza = document.getElementById(type);
    const test = document.getElementById("fewza1150");
    console.log(fewza)
    test.innerHTML = fewza.innerHTML;
  }

  recommendfew('<?= $resultdsads[0]['name'] ?>')
</script>