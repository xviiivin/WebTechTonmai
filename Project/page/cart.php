<?php


if ($_POST["action"] == "removeproduct") {
    $response = [];
    $product = $category;
    $status = 0;
    $carttest = [];
    if (count($_SESSION["cart"]) >= 1) {
        foreach ($_SESSION["cart"] as $value) {
            if (($_POST["id"]) == ($value["id"])) {
                $status = 1;
            } else {
                array_push($carttest, $value);
            }
        }
    }

    if ($status == 1) {
        $_SESSION["cart"] = $carttest;
    }

    $response["status"] = "success";
    $response["message"] = "cart";
    $response["cart"] = $_SESSION["cart"];
    echo json_encode($response, true);
    exit();
}

if ($_POST["action"] == "addxtocart") {
    $response = [];
    $status = 0;
    $carttest = [];
    if (count($_SESSION["cart"]) >= 1) {
        foreach ($_SESSION["cart"] as $value) {
            if (($_POST["id"]) == ($value["id"])) {
                $value["count"] = +$value["count"] + 1;
                $status = 1;
            }
            array_push($carttest, $value);
        }
    }
    if ($status == 1) {
        $_SESSION["cart"] = $carttest;
    }
    $response["status"] = "success";
    $response["message"] = "cart";
    $response["cart"] = $_SESSION["cart"];
    echo json_encode($response, true);
    exit();
}

if ($_POST["action"] == "deletextocart") {
    $response = [];
    $status = 0;
    $carttest = [];
    if (count($_SESSION["cart"]) >= 1) {
        foreach ($_SESSION["cart"] as $value) {
            if (($_POST["id"]) == ($value["id"])) {
                $value["count"] = +$value["count"] - 1;
                $status = 1;
            }
            if ($value["count"] > 0) {
                array_push($carttest, $value);
            }
        }
    }
    if ($status == 1) {
        $_SESSION["cart"] = $carttest;
    }
    $response["status"] = "success";
    $response["message"] = "cart";
    $response["cart"] = $_SESSION["cart"];
    echo json_encode($response, true);
    exit();
}

?>


<div class="container mx-auto px-4 py-20">
    <div class="flex flex-col">
        <h1 class="text-4xl font-bold flex justify-center">Shopping Cart</h1>
        <div class="flex justify-center mt-4 text-md text-gray-500">
            <!-- to home button-->
            <a href="#" class="hover:text-black">Home&nbsp;&nbsp;</a>
            <svg xmlns="http://www.w3.org/2000/svg" class="mt-[6px]" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
            <p class="text-black">&nbsp;&nbsp;Your Shopping Cart</p>
        </div>
        <table class="table-fixed mt-8 border-collapse border-collapse border-b border-gray-300">
            <thead class="border-collapse border-b border-gray-300 font-bold text-lg">
                <th class="lg:w-[55%] text-left">Product</th>
                <th class="text-end hidden sm:table-cell lg:w-[10%] lg:text-left">Price</th>
                <th class="lg:w-[25%] text-left hidden lg:table-cell">Quantity</th>
                <th class="lg:w-[10%] text-left hidden lg:table-cell">Total</th>
            </thead>
            <tbody id="fewzatest">


                <?php

                $subtotal = 0;

                foreach ($_SESSION["cart"] as $value) {

                    $subtotal += $value["price"] * $value["count"];

                ?>
                    <tr>
                        <!-- item content -->
                        <td class="flex mt-8 mb-8">
                            <img src="./uploads/<?= $value["file_name"] ?>" class="w-32 h-32" alt="tonmai">
                            <div class="grid content-center ml-8 mr-8">
                                <p class="text-lg"><?= $value["name"] ?></p>
                                <p class="text-sm text-gray-500"><?= $value["story"] ?></p>
                                <div class="">
                                    <button class="text-gray-500 text-md underline" onclick="removeproduct(<?= $value['id'] ?>)">Remove</button>
                                </div>
                                <p class="mb-3 mt-4 lg:mb-0 text-left sm:hidden"><span class="font-bold">Price : </span><?= $value["price"] ?> ฿</p>
                                <div class="flex gap-4 justify-start items-center table-cell sm:hidden">
                                    <div class="flex">
                                        <button onclick="cartplusdelete(<?= $value['id'] ?>, 'add')" class="border-black border-2 py-0.5 px-2 bg-black text-white">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                        <input id="<?= $value["id"] ?>cartid1" readonly class="border-black border-y-2 py-0.5 w-14 text-center focus:outline-0 text-sm" value="<?= $value["count"] ?>">
                                        <button onclick="cartplusdelete(<?= $value['id'] ?>, 'delete')" class="border-black border-2 py-0.5 px-2">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </td>
                        <!-- Price -->
                        <td>
                            <!-- Price Responsive-->
                            <p class="mb-3 lg:mb-0 text-center lg:text-left hidden sm:block"><?= $value["price"] ?> ฿</p>
                            <!-- Quantity Responsive -->
                            <div class="flex gap-4 justify-start items-center hidden sm:table-cell lg:hidden">
                                <div class="flex">
                                    <button onclick="cartplusdelete(<?= $value['id'] ?>, 'add')" class="border-black border-2 py-0.5 px-2 bg-black text-white">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <input id="<?= $value["id"] ?>cartid2" readonly class="border-black border-y-2 py-0.5 w-14 text-center focus:outline-0 text-sm" value="<?= $value["count"] ?>">
                                    <button onclick="cartplusdelete(<?= $value['id'] ?>, 'delete')" class="border-black border-2 py-0.5 px-2">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <!-- Quantity -->
                        <td class="hidden lg:table-cell">
                            <div class="flex gap-4 justify-start items-center">
                                <div class="flex">
                                    <button onclick="cartplusdelete(<?= $value['id'] ?>, 'add')" class="border-black border-2 py-0.5 px-2 bg-black text-white">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <input id="<?= $value["id"] ?>cartid3" readonly class="border-black border-y-2 py-0.5 w-14 text-center focus:outline-0 text-sm" value="<?= $value["count"] ?>">
                                    <button onclick="cartplusdelete(<?= $value['id'] ?>, 'delete')" class="border-black border-2 py-0.5 px-2">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <!-- Total -->
                        <td class="hidden lg:table-cell">
                            <p><?= number_format($value["price"] * $value["count"]) ?> ฿</p>
                        </td>
                    </tr>

                <?php
                }
                ?>




            </tbody>
        </table>

        <?php
        if (count($_SESSION["cart"]) == 0) {
        ?>
            <b class="text-center mt-8 text-2xl">Dont have product :(</b>
        <?php
        }
        ?>
        <!-- Shipping -->
        <div class="md:flex md:justify-end mt-4">
            <div class="flex flex-col gap-2 p-6 md:w-[30%] xl:mr-16">
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
                <div class="flex justify-between text-md">
                    <p>Subtotal</p>
                    <p id="fewzasubtotal"><?= number_format($subtotal); ?> ฿</p>
                </div>
                <div class="flex flex-col gap-2 items-center">
                    <button class="bg-black text-white w-full py-0.5">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</div>





<script>
    var linkvczxvczx = `<?= $link . "?page=cart" ?>`;

    var datacart = (<?= json_encode($_SESSION["cart"], true); ?>);

    function cartplusdelete(id, status) {
        if (status === "add") {
            $.post(linkvczxvczx, {
                action: "addxtocart",
                id: id,
            }, function(data) {
                let result = stringtojson(data);
                if (result.status == "success") {
                    datacart = result.cart
                    testfew()
                }
            });

        } else if (status === "delete") {
            $.post(linkvczxvczx, {
                action: "deletextocart",
                id: id,
            }, function(data) {
                let result = stringtojson(data);
                if (result.status == "success") {
                    datacart = result.cart
                    testfew()
                }
            });
        }

    }

    function testfew() {
        let test = document.getElementById("fewzatest");
        test.innerHTML = "";
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
                                <button onclick="cartplusdelete(${fewzahaha['id']}, 'add')" class="border-black border-2 py-0.5 px-2 bg-black text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                                <input readonly class="border-black border-y-2 py-0.5 w-14 text-center focus:outline-0 text-sm" value="${fewzahaha["count"]}">
                                <button onclick="cartplusdelete(${fewzahaha['id']}, 'delete')" class="border-black border-2 py-0.5 px-2">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                            </div>
                            <div class="">
                                <button onclick="removeproduct(${fewzahaha['id']})" class="text-gray-500 text-sm underline">Remove</button>
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
        test.innerHTML = feweiei;
        document.getElementById("cartsideeieifew").innerHTML = feweiei1;
        document.getElementById("subtotalcartside").innerText = `${itotal.toLocaleString()} ฿`
        document.getElementById("fewzasubtotal").innerText = `${itotal.toLocaleString()} ฿`
        document.getElementById("idcartbrabra").innerText = datacart.length;
    }


    function stringtojson(data) {
        let test = `{"status"` + data.split(`{"status"`)[4];
            
        return (JSON.parse(test))
    }

    function removeproduct(id) {
        $.post(linkvczxvczx, {
            action: "removeproduct",
            id: id
        }, function(data) {
            let result = stringtojson(data);
            if (result.status == "success") {
                datacart = result.cart
                testfew()
            }
        });
    }

   
</script>