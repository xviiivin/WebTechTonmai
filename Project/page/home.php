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
                  <span class="text-[8rem] -mt-[0.3em] mb-6"><?= $value["name"] ?></span>
                  <!-- <span class="font-medium text-2xl -mt-16 mr-12 text-end">Autumm</span> -->
                  <div class="flex justify-center">
                    <a class="transition duration-500 border-black border py-3 px-12 text-extralight hover:bg-black hover:text-white" href="<?= $link . "?page=product&categoryid=" . $value["id"] ?>">Shop Now</a>
                  </div>
                </div>
                <img class="" draggable="false" src="https://img.freepik.com/premium-photo/simple-white-background-with-smooth-lines-light-colors_476363-5558.jpg?w=2000" alt="" class="">
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
        <h3 class="text-4xl font-bold">Popular</h3>
      </div>

      <!-- items -->
      <div class="mt-12 mx-3">
        <div class="swiper mySwiper2">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="img/demo_tree.png" alt="">
            </div>
            <div class="swiper-slide">
              <img src="img/demo_tree.png" alt="">
            </div>
            <div class="swiper-slide">
              <img src="img/demo_tree.png" alt="">
            </div>
            <div class="swiper-slide">
              <img src="img/demo_tree.png" alt="">
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
            <p class="text-3xl font-light mr-6 font-medium">Auspicious Tree</p>
            <i class="fa-sharp fa-solid fa-angle-down"></i>
          </div>
          <div id="recommend_tree_dropdown" class="absolute hidden opacity-0 drop-shadow-xl">
            <ul>
              <li><a class="bg-white p-3 w-[12em] block hover:bg-gray-200 hover:text-black duration-500 text-gray-500 text-xl" href="#">Auspicious
                  Tree</a>
              </li>
              <li><a class="bg-white p-3 w-[12em] block hover:bg-gray-200 hover:text-black duration-500 text-gray-500 text-xl" href="#">Air
                  Purifying Tree</a>
              </li>
              <li><a class="bg-white p-3 w-[12em] block hover:bg-gray-200 hover:text-black duration-500 text-gray-500 text-xl" href="#">Easy
                  Care
                  Plants</a>
              </li>
              <li><a class="bg-white p-3 w-[12em] block hover:bg-gray-200 hover:text-black duration-500 text-gray-500 text-xl" href="#">Flowering
                  Trees</a>
              </li>
              <li><a class="bg-white p-3 w-[12em] block hover:bg-gray-200 hover:text-black duration-500 text-gray-500 text-xl" href="#">Tropical
                  Trees</a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- items -->
      <div class="mt-3 flex justify-center p-3">
        <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-4">
          <div class="">
            <div class="bg-gray-100 w-80 h-80"></div>
          </div>
          <div class="">
            <div class="bg-gray-100 w-80 h-80"></div>
          </div>
          <div class="hidden lg:block">
            <div class="bg-gray-100 w-80 h-80"></div>
          </div>
        </div>


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

      <div class="flex justify-center">
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 grid-flow-row gap-4 mx-6">


          <?php
          $test = $db->prepare("SELECT * FROM product INNER JOIN category ON category.id = product.category ORDER BY id DESC LIMIT 9");
          $test->execute();
          $data = $test->fetchAll();

          foreach ($data as $value) {
          ?>

            <div class="flex bg-gray-200 rounded max-w-sm">
              <div class="p-4">

                <img class="rounded-lg w-24 h-24 bg-black" src="./uploads/<?= $value["file_name"] ?>" alt="">
              </div>
              <div class="flex flex-col justify-between py-2 px-3">
                <div>
                  <h5 class=""><?= $value[1] ?></h5>
                  <label class="text-gray-400 text-sm"><?= $value["name"] ?> </label>
                </div>
                <div class="flex justify-between items-center">
                  <p><?= number_format($value["price"]) ?> ฿</p>
                  <i class="fa-regular fa-square-plus"></i>
                </div>
              </div>
            </div>
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
</script>