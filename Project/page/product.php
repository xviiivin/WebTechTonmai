<?php

// $_SESSION["cart"] = [];


// print_r($_SESSION["cart"]);

if (isset($_GET["id"])) {

  $querycategory = $db->prepare("SELECT * FROM `product` WHERE id = :id");
  $querycategory->execute([":id" => $_GET["id"]]);
  $category = $querycategory->fetch(PDO::FETCH_ASSOC);


  // foreach ($_SESSION["cart"] as $value) {

  //     if ($value["id"] == $category["id"]) {
  //         print_r("test ");

  //     }

  // }


  if ($_POST["action"] == "addtocart") {
    $response = [];
    $product = $category;


    $product["count"] = intval($_POST["count"]);

    $status = 0;

    $carttest = [];

    if (count($_SESSION["cart"]) >= 1) {
      foreach ($_SESSION["cart"] as $value) {
        if (($product["id"]) == ($value["id"])) {
          $value["count"] = $product["count"] + $value["count"];
          $status = 1;
        }
        array_push($carttest, $value);
      }
    }

    if ($status == 1) {
      $_SESSION["cart"] = $carttest;
    } else {
      array_push($_SESSION["cart"], $product);
    }

    $response["status"] = "success";
    $response["message"] = "cart";
    $response["cart"] = $_SESSION["cart"];
    echo json_encode($response, true);
    exit();
  }

?>
  <div id="detail">
    <div class="lg:mx-12 xl:mx-44 2xl:mx-72">

      <!-- Example Items -->
      <section>
        <div class="my-6 flex justify-center">
          <div class="w-full sm:w-fit flex flex-col lg:flex-row gap-12">

            <!-- imgage -->
            <div class="">
              <div style="width: 500px; height: 500px">
                <img class="w-full h-full rounded" src="uploads/<?= $category["file_name"] ?>" alt="">
              </div>
            </div>

            <!-- amount -->
            <div class="mx-3l w-[500px]">
              <h1 class="text-4xl"><?= $category["name"] ?></h1>
              <h3 class="text-gray-500">
                <?php
                $asd = $category["category"];
                $teet =  implode($db->query("SELECT name FROM category WHERE id = $asd")->fetch(PDO::FETCH_ASSOC));

                echo $teet;
                ?>
              </h3>
              <div class="ml-6 mt-6">
                <p class="text-4xl"><?= number_format((float)$category["price"], 2, ".", "") ?> ฿</p>
              </div>
              <hr class="mt-3">
              <hr />
              <div class="mt-3 w-full grid grid-cols-1 gap-2">
                <div class="flex text-lg justify-between">
                  <p>Size</p>
                  <p><?= $category["size"] ?> cm</p>
                </div>
                <div class="flex text-lg justify-between">
                  <span>Remaining</span>
                  <span>1 pieces</span>
                </div>

                <div class="flex text-lg justify-between">
                  <p>Amount</p>
                  <div class="flex">
                    <button onclick="cartplusdelete('delete')" class="border-black border-2 py-1 px-3">
                      <i class="fa-solid fa-minus"></i>
                    </button>
                    <input class="border-black border-y-2 py-1 text-center w-14 focus:outline-0" min="1" name="cartid" id="cartid" value="1">
                    <button onclick="cartplusdelete('add')" class="border-black border-2 py-1 px-3 bg-black text-white">
                      <i class="fa-solid fa-plus"></i>
                    </button>
                  </div>
                </div>
              </div>
              <!-- button -->
              <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-2">
                <button class="bg-black w-full text-white py-1 px-8 border-black border-2">Buy Now</button>



                <button onclick="addtocart();" class="bg-white w-full py-1 px-8 border border-black border-2">Add to Cart</button>
              </div>
            </div>
          </div>
      </section>

      <!-- Product details -->
      <section>
        <div class="mt-6 mx-2">
          <div class="flex justify-center">
            <header class="text-xl">Product details</header>
          </div>
          <hr class="mt-3">
          <hr />
          <!-- sub product details  -->
          <div class="flex mt-3">
            <div class="min-w-fit p-3 sm:w-[20em]">
              product details
            </div>
            <div class="flex flex-col w-full gap-3">
              <div class="flex justify-center">
                <header class="text-2xl"><?= $category["name"] ?></header>
              </div>

              <p class="text-lg">Take Care / Character</p>

              <!-- Watering -->
              <div id="watering">
                <div class="flex p-3">
                  <div class="w-[4em] flex align-bottom gap-4">
                    <img src="img/water.png" alt="">
                    <h5>Watering</h5>
                  </div>
                </div>
                <div style="padding-inline-start: 60px;">
                  <ul class="list-disc">
                    <li class="mt-2"><?= $category["watering"] ?></li>
                  </ul>
                </div>
              </div>

              <!-- Sunlight -->
              <div id="sunlight">
                <div class="flex p-3">
                  <div class="w-[4em] flex align-bottom gap-4">
                    <img src="img/sunlight.png" alt="">
                    <h5>Sunlight</h5>
                  </div>
                </div>
                <div style="padding-inline-start: 60px;">
                  <ul class="list-disc">
                    <li class="mt-2">
                      <?= $category["sunlight"] ?>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- tools tips -->
              <div id="tools-tips" class="mt-3">
                <p class="text-lg">Tools tips</p>
                <ul class="list-decimal flex flex-col gap-4 mt-6" style="padding-inline-start: 60px">
                  <li>
                    <?=
                    $category["toolstips"]
                    ?>
                  </li>
                </ul>
              </div>
              <!-- basic information -->
              <div id="basic-information">
                <div class="w-full bg-gray-100 rounded-md mt-3">
                  <div class="p-6">
                    <header>Basic information</header>
                    <div class="m-2">
                      <ul class="text-gray-400" style="padding-inline-start: 30px;">
                        <?= $category["basic"] ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Stroy -->
              <div id="stroy">
                <div class="w-full bg-gray-100 rounded-md">
                  <div class="p-6">
                    <header>Story</header>
                    <div class="m-2">
                      <p class="text-gray-400 indent-5">
                        <?= $category["story"] ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>


  </div>

  <script>
    var link = `<?= $link . "?page=product&categoryid=" . $_GET["categoryid"] . "&id=" . $_GET["id"] ?>`;

    function cartplusdelete(status) {
      if (status === "add") {
        document.getElementById("cartid").value = parseInt(document.getElementById("cartid").value) + 1
      } else if (status === "delete") {
        if (parseInt(document.getElementById("cartid").value) !== 1) {
          document.getElementById("cartid").value = parseInt(document.getElementById("cartid").value) - 1
        }
      }
    }

    function stringtojson(data) {
      let test = `{"status"` + data.split(`{"status"`)[4];
      return (JSON.parse(test))
    }

    function addtocart() {
      $.post(link, {
        action: "addtocart",
        count: document.getElementById("cartid").value
      }, function(data) {

        let result = stringtojson(data);

        if (result.status == "success") {
          // alert("เพิ่มเข้าตระกร้าสินค้าเรียบร้อย");
          OpenModal('vertical-cart')
          datacart = result.cart
          testfew1()
        }
      });
    }
  </script>
<?php
} else {
  $querycategory = $db->prepare("SELECT * FROM `category` WHERE id = :id");
  $querycategory->execute([":id" => $_GET["categoryid"]]);
  $categoryid = $querycategory->fetch(PDO::FETCH_ASSOC);

  $querycategory = $db->prepare("SELECT * FROM `product` WHERE category = :id");
  $querycategory->execute([":id" => $_GET["categoryid"]]);
  $category = $querycategory->fetchAll();

?>
  <div id="result">
    <div class="container sm:mx-auto my-12">
      <div class="flex flex-col">
        <h1 class="text-5xl flex justify-center"><?= $categoryid["name"] ?></h1>
        <div class="flex justify-center mt-4 text-md text-gray-500 gap-4">
          <!-- to home button-->
          <a href="<?= $link ?>" class="hover:text-black">Home</a>
          <svg xmlns="http://www.w3.org/2000/svg" class="mt-[6px]" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
            <polyline points="9 18 15 12 9 6"></polyline>
          </svg>
          <p class="text-black"><?= $categoryid["name"] ?></p>
        </div>
      </div>

      <!-- item windows -->
      <div class="p-3">
        <div class="flex justify-start py-6 inline-block">
          <!-- <div id="featured">
            <div class="flex items-center gap-2">
              <span>Featured</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                <polyline points="6 9 12 15 18 9" />
              </svg>
            </div>
            <div id="featured_dropdown" class="absolute p-3 drop-shadow-xl bg-white">
              <ul>
                <li class="py-1 text-gray-500 hover:text-black transition-all">Featured</li>
                <li class="py-1 text-gray-500 hover:text-black transition-all">Best selling</li>
                <li class="py-1 text-gray-500 hover:text-black transition-all">Alphabetically, A-Z</li>
                <li class="py-1 text-gray-500 hover:text-black transition-all">Alphabetically, Z-A</li>
                <li class="py-1 text-gray-500 hover:text-black transition-all">Price, low to high</li>
                <li class="py-1 text-gray-500 hover:text-black transition-all">Price, high to low</li>
              </ul>
            </div>
            </divid>
          </div> -->
        </div>

        <!-- items -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">


          <?php

          foreach ($category as $value) {
          ?>
            <a class="flex justify-center" href="<?= $link . "?page=product&categoryid=" . $_GET["categoryid"] . "&id=" . $value["id"] ?>">
              <div class="flex flex-col gap-3 max-w-fit">
                <div class="overflow-hidden rounded">
                  <img class="hover:scale-[1.5] duration-500 transition-all" style="height: 400px; width: 400px" src="uploads/<?= $value["file_name"] ?>" alt="">
                </div>
                <div class="flex justify-between">
                  <div class="flex flex-col">
                    <span class="text-lg"><?= $value["name"] ?></span>
                    <span class="text-sm text-gray-500"><?= $categoryid["name"] ?></span>
                  </div>
                  <div class="w-1/3">
                    <div class="flex justify-end">
                      <span class="text-xl w-auto"><?= number_format((float)$value["price"], 2, '.', '') ?> ฿</span>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          <?php
          }
          ?>


        </div>

      </div>
    </div>
  </div>



<?php
}
?>