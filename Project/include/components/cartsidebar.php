<style>
  .testestestse {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    /* number of lines to show */
    line-clamp: 2;
    -webkit-box-orient: vertical;
  }
</style>

<navside id="vertical-cart" class="absolute mx-0 top-0 right-[25em] z-40" aria-label="Sidebar">
  <!-- Container -->
  <div class="absolute">
    <div class="w-[25em] min-h-screen max-h-screen flex">
      <div id="nav-menu" class="w-full bg-white flex flex-col justify-between">
        <!-- header -->
        <div class="pt-6 px-3 flex flex-col">
          <div class="flex justify-between">
            <header>Shopping</header>
            <button onclick="OpenModal('vertical-cart')" class="px-1">
              <svg class="w-[20px] h-[20px]" fill="currentColor" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                <path d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z">
                </path>
              </svg>
            </button>
          </div>
          <!-- items -->
          <div id="cartsideeieifew" class="max-h-[47em] overflow-y-auto py-6 flex flex-col gap-4">

            <?php
            $subtotal = 0;
            foreach ($_SESSION["cart"] as $value) {
              $subtotal += $value["price"] * $value["count"];
            ?>

              <div class="flex flex-col gap-5">
                <div class="flex gap-4 justify-start">
                  <div>
                    <img class="rounded-lg" style="min-width: 112px; min-height: 113px; max-width: 112px; max-height: 113px;" src="./uploads/<?= $value["file_name"] ?>" alt="">
                  </div>
                  <div class="flex flex-col gap-2">
                    <div>
                      <p><?= $value["name"] ?></p>
                      <p class="testestestse text-gray-500 text-xs">
                        <?= $value["story"] ?>
                      </p>
                      <p><?= number_format($value["price"]) ?> ฿</p>
                    </div>
                    <div class="flex gap-4 justify-start items-center">
                      <div class="flex">
                        <button onclick="cartplusdelete1(<?= $value['id'] ?>, 'add')" class="border-black border-2 py-0.5 px-2 bg-black text-white">
                          <i class="fa-solid fa-plus"></i>
                        </button>
                        <input readonly class="border-black border-y-2 py-0.5 w-14 text-center focus:outline-0 text-sm" value="<?= $value["count"] ?>">
                        <button onclick="cartplusdelete1(<?= $value['id'] ?>, 'delete')" class="border-black border-2 py-0.5 px-2">
                          <i class="fa-solid fa-minus"></i>
                        </button>
                      </div>
                      <div class="">
                        <button onclick="removeproduct1(<?= $value['id'] ?>)" class="text-gray-500 text-sm underline">Remove</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr />
            <?php
            }
            ?>


          </div>

        </div>

        <!-- total -->
        <div class="bg-[#F7F7F7] flex flex-col gap-2 p-6">
          <div class="flex flex-col items-center">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck">
                <rect x="1" y="3" width="15" height="13"></rect>
                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                <circle cx="18.5" cy="18.5" r="2.5"></circle>
              </svg>
            </div>
            <p class="text-gray-500 text-xs">Shipping</p>
          </div>
          <div class="flex justify-between text-sm">
            <p>Subtotal</p>
            <p id="subtotalcartside"><?= number_format($subtotal) ?> ฿</p>
          </div>
          <div class="flex flex-col gap-2 items-center">
            <button  class="bg-black text-white w-full py-0.5"><a href="<?= $link . "?page=checkout" ?>">Confirm</a> </button>
            <a href="<?= $link . "?page=cart" ?>" class="text-sm underline">View Cart</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</navside>




<script>
  var link1xxxxx = `<?= $link . "?page=cart" ?>`;

  var datacart = (<?= json_encode($_SESSION["cart"], true); ?>);

  function cartplusdelete1(id, status) {
    if (status === "add") {
      $.post(link1xxxxx, {
        action: "addxtocart",
        id: id,
      }, function(data) {
        let result = stringtojson1(data);
        if (result.status == "success") {
          datacart = result.cart
          testfew1()
        }
      });

    } else if (status === "delete") {
      $.post(link1xxxxx, {
        action: "deletextocart",
        id: id,
      }, function(data) {
        let result = stringtojson1(data);
        if (result.status == "success") {
          datacart = result.cart
          testfew1()
        }
      });
    }

  }

  function testfew1() {

    let test = document.getElementById("fewzatest");
    let test1 = document.getElementById("cartsideeieifew");
    let test2 = document.getElementById("fewzasubtotal");
    if (test) {
      test.innerHTML = "";
    }

    test1.innerHTML = "";
    let feweiei = "";
    let feweiei1 = "";

    let itotal = 0;

    for (let i = 0; i < datacart.length; i++) {
      const fewzahaha = datacart[i];
      itotal += (parseInt(fewzahaha["price"]) * parseInt(fewzahaha["count"]))

      feweiei1 += `
            <div class="flex flex-col gap-5">
                <div class="flex gap-4 justify-start">
                    <div>
                        <img class="rounded-lg" style="min-width: 112px; min-height: 113px; max-width: 112px; max-height: 113px;" src="./uploads/${fewzahaha["file_name"]}" alt="">
                    </div>
                    <div class="flex flex-col gap-2">
                        <div>
                            <p>${fewzahaha["name"]}</p>
                            <p class="testestestse text-gray-500 text-xs">
                                ${fewzahaha["story"]}
                            </p>
                            <p>${fewzahaha["price"]} ฿</p>
                        </div>
                        <div class="flex gap-4 justify-start items-center">
                            <div class="flex">
                                <button onclick="cartplusdelete1(${fewzahaha['id']}, 'add')" class="border-black border-2 py-0.5 px-2 bg-black text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                                <input readonly class="border-black border-y-2 py-0.5 w-14 text-center focus:outline-0 text-sm" value="${fewzahaha["count"]}">
                                <button onclick="cartplusdelete1(${fewzahaha['id']}, 'delete')" class="border-black border-2 py-0.5 px-2">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                            </div>
                            <div class="">
                                <button onclick="removeproduct1(${fewzahaha['id']})" class="text-gray-500 text-sm underline">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr /> `
      feweiei += `
            <tr>
                <td class="flex mt-8 mb-8">
                    <img src="./uploads/${fewzahaha["file_name"]}" class="w-32 h-32" alt="tonmai">
                    <div class="grid content-center ml-8 mr-8">
                        <p class="text-lg">${fewzahaha["name"]}</p>
                        <p class="text-sm text-gray-500">${fewzahaha["story"]}</p>
                        <div class="">
                            <button class="text-gray-500 text-md underline" onclick="removeproduct(${fewzahaha["id"]})">Remove</button>
                        </div>
                        <p class="mb-3 mt-4 lg:mb-0 text-left sm:hidden"><span class="font-bold">Price : </span>${fewzahaha["price"]} ฿</p>
                        <div class="flex gap-4 justify-start items-center table-cell sm:hidden">
                            <div class="flex">
                                <button onclick="cartplusdelete(${fewzahaha["id"]}, 'add')" class="border-black border-2 py-0.5 px-2 bg-black text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                                <input id="${fewzahaha["id"]}cartid1" readonly class="border-black border-y-2 py-0.5 w-14 text-center focus:outline-0 text-sm" value="${fewzahaha["count"]}">
                                <button onclick="cartplusdelete(${fewzahaha["id"]}, 'delete')" class="border-black border-2 py-0.5 px-2">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </td>
                <td>
                    <p class="mb-3 lg:mb-0 text-center lg:text-left hidden sm:block">${fewzahaha["price"]} ฿</p>
                    <div class="flex gap-4 justify-start items-center hidden sm:table-cell lg:hidden">
                        <div class="flex">
                            <button onclick="cartplusdelete(${fewzahaha["id"]}, 'add')" class="border-black border-2 py-0.5 px-2 bg-black text-white">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                            <input id="${fewzahaha["id"]}cartid2" readonly class="border-black border-y-2 py-0.5 w-14 text-center focus:outline-0 text-sm" value="${fewzahaha["count"]}">
                            <button onclick="cartplusdelete(${fewzahaha["id"]}, 'delete')" class="border-black border-2 py-0.5 px-2">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                        </div>
                    </div>
                </td>
                <td class="hidden lg:table-cell">
                    <div class="flex gap-4 justify-start items-center">
                        <div class="flex">
                            <button onclick="cartplusdelete(${fewzahaha["id"]}, 'add')" class="border-black border-2 py-0.5 px-2 bg-black text-white">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                            <input id="${fewzahaha["id"]}cartid3" readonly class="border-black border-y-2 py-0.5 w-14 text-center focus:outline-0 text-sm" value="${fewzahaha["count"]}">
                            <button onclick="cartplusdelete(${fewzahaha["id"]}, 'delete')" class="border-black border-2 py-0.5 px-2">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                        </div>
                    </div>
                </td>
                <td class="hidden lg:table-cell">
                    <p>${(parseInt(fewzahaha["price"]) * parseInt(fewzahaha["count"])).toLocaleString()} ฿</p>
                </td>
            </tr>`;

    }
    if (test) {
      test.innerHTML = feweiei;
    }
    test1.innerHTML = feweiei1;
    document.getElementById("subtotalcartside").innerText = `${itotal.toLocaleString()} ฿`

    if (test2) {
      test2.innerText = `${itotal.toLocaleString()} ฿`
    }
    document.getElementById("idcartbrabra").innerText = datacart.length;

    console.log(datacart)
  }


  function stringtojson1(data) {
    console.log(data.split(`{"status"`))

    test = `{"status"` + data.split(`{"status"`)[4];
    return (JSON.parse(test))
  }

  function removeproduct1(id) {
    $.post(link1xxxxx, {
      action: "removeproduct",
      id: id
    }, function(data) {
      let result = stringtojson1(data);
      if (result.status == "success") {
        datacart = result.cart
        testfew1()
      }
    });
  }
</script>