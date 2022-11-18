<?php
if ($_POST["action"] == "checkout") {
    $subtotal = 0;


    if (empty($_GET["idproduct"])) {

        if (count($_SESSION["cart"]) == 0) {
            alert("error", "ไม่มีสินค้าในตระกร้า", $link);
        } else {
            foreach ($_SESSION["cart"] as $value) {
                $fefeawfeaw = $db->prepare("UPDATE product SET `amount` = `amount` - :amount WHERE id = :id");
                $fefeawfeaw->execute([':amount' => $value["count"], ':id' => $value["id"]]);

                $subtotal += $value["price"] * $value["count"];
            }
            $query1 = $db->prepare("INSERT INTO history (`iduser`, `product`, `price`, `date`) VALUES (:iduser, :product, :price, :date)");
            $query1->execute([':iduser' => $_SESSION["login"]["id"], ':product' => json_encode($_SESSION["cart"]), ':price' => $subtotal + 40, ':date' => time()]);
            alert("success", "กดสั่งซื้อสินค้าเรียบร้อยแล้ว", $link);
        }
    } else {

        $querycategory = $db->prepare("SELECT * FROM `product` WHERE id = :id");
        $querycategory->execute([":id" => $_GET["idproduct"]]);
        $categoryid = $querycategory->fetch(PDO::FETCH_ASSOC);

        $fefeawfeaw = $db->prepare("UPDATE product SET `amount` = `amount` - :amount WHERE id = :id");
        $fefeawfeaw->execute([':amount' => 1, ':id' => $_GET["idproduct"]]);

        $query1 = $db->prepare("INSERT INTO history (`iduser`, `product`, `price`, `date`) VALUES (:iduser, :product, :price, :date)");
        $query1->execute([':iduser' => $_SESSION["login"]["id"], ':product' => json_encode([$categoryid]), ':price' => $categoryid["price"] + 40, ':date' => time()]);
        alert("success", "กดสั่งซื้อสินค้าเรียบร้อยแล้วfew", $link);
    }
}

?>

<div class="h-full">
    <div class="grid h-full md:grid-cols-1 lg:grid-cols-2">

        <!-- Form information -->
        <form action="<?= isset($_GET["idproduct"]) ? $link . "?page=checkout&idproduct=" . $_GET["idproduct"] : $link . "?page=checkout" ?>" method="post" class="lg:p-20 p-12">
            <h1 class="text-4xl">Shipping</h1>
            <div class="visible flex mb-4 mt-4 justify-between lg:invisible lg:mt-0 lg:mb-0">
                <!-- Cart Responsive Bar -->
                <a id="aToggle">
                    <div class="
            inline-block
                relative
                cursor-pointer
                transition-all
                duration-500
                before:content-['']
                before:absolute
                before:-bottom-1
                before:left-0
                before:w-0
                before:h-[2px]
                before:opacity-0
                before:transition-all
                before:duration-500
                before:bg-black
                hover:before:w-full
                hover:before:opacity-100">
                        <p id="Summary" class="text-md inline-block">Show summary</p>
                        <div id="ChevronID" class="inline">
                            <i class="fa-solid fa-chevron-down ml-2"></i>
                        </div>
                    </div>
                </a>
                <div>
                    <span class="text-md text-black">Total
                        <?php
                        $subtotal = 0;
                        if (empty($_GET["idproduct"])) {
                            foreach ($_SESSION["cart"] as $value) {
                                $subtotal += $value["price"] * $value["count"];
                            } ?>
                            <?= number_format($subtotal + 40); ?>
                        <?php
                        } else {
                            $querycategory = $db->prepare("SELECT * FROM `product` WHERE id = :id");
                            $querycategory->execute([":id" => $_GET["idproduct"]]);
                            $categoryid = $querycategory->fetch(PDO::FETCH_ASSOC);
                        ?>
                            <?= number_format($categoryid["price"] + 40); ?>
                        <?php
                        } ?> ฿</span>
                </div>
            </div>

            <!-- Show/Hide summary -->
            <div id="Toggle" class="hidden">
                <div class="visible pl-8 pr-8 pb-8 bg-[#F2F2F2] rounded-md mb-4 lg:hidden">
                    <?php
                    if (empty($_GET["idproduct"])) {
                    ?>
                        <?php
                        $subtotal = 0;
                        foreach ($_SESSION["cart"] as $value) {
                            $subtotal += $value["price"] * $value["count"];
                        ?>
                            <div class="sm:grid sm:grid-cols-3">
                                <div class="flex pt-8 ml-8 sm:ml-0 justify-center sm:flex-none sm:justify-start">
                                    <img src="uploads/<?= $value["file_name"] ?>" alt="tonmai" class="rounded-md w-32 h-32">
                                    <div class="w-10 h-10 bg-black text-white text-sm pt-2 rounded-full flex justify-center translate-x-[-20px] translate-y-[-20px]">
                                        <p><?= $value["count"] ?></p>
                                    </div>
                                </div>
                                <div class="col-span-2 mt-4 sm:mt-20">
                                    <div class="flex justify-between">
                                        <p class="text-lg"><?= $value["name"] ?></p>
                                        <p class="text-md text-black/[0.5]"><?= number_format($value["price"] * $value["count"]) ?> ฿</p>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-5">
                        <?php
                        }
                        ?>
                        <div class="flex justify-between mt-5">
                            <div>
                                <p class="text-sm text-black/[0.5]">Subtotal</p>
                            </div>
                            <div>
                                <p class="text-sm text-black/[0.5]"><?= number_format($subtotal) ?> ฿</p>
                            </div>
                        </div>
                        <div class="flex text-sm justify-between mt-5">
                            <div>
                                <p class="text-sm text-black/[0.5]">Shipping</p>
                            </div>
                            <div>
                                <p class="text-sm text-black/[0.5]">40 ฿</p>
                            </div>
                        </div>
                        <hr class="mt-5">
                        <div class="flex justify-between mt-5">
                            <div>
                                <p class="text-xl text-black">Total</p>
                            </div>
                            <div>
                                <span class="text-sm text-black/[0.5]">THB&nbsp;&nbsp;&nbsp;</span>
                                <span class="text-xl text-black"><?= number_format($subtotal + 40) ?> ฿</span>
                            </div>
                        </div>
                </div>

            </div>
            <div id="Toggle" class="hidden">
                <div class="visible pl-8 pr-8 pb-8 bg-[#F2F2F2] rounded-md mb-4 lg:hidden">
                <?php
                    } else {
                        $querycategory = $db->prepare("SELECT * FROM `product` WHERE id = :id");
                        $querycategory->execute([":id" => $_GET["idproduct"]]);
                        $categoryid = $querycategory->fetch(PDO::FETCH_ASSOC);
                ?>

                    <?php
                        $subtotal = 0;
                    ?>
                    <div class="sm:grid sm:grid-cols-3">
                        <div class="flex pt-8 ml-8 sm:ml-0 justify-center sm:flex-none sm:justify-start">
                            <img src="uploads/<?= $categoryid["file_name"] ?>" alt="tonmai" class="rounded-md w-32 h-32">
                            <div class="w-10 h-10 bg-black text-white text-sm pt-2 rounded-full flex justify-center translate-x-[-20px] translate-y-[-20px]">
                                <p>1</p>
                            </div>
                        </div>
                        <div class="col-span-2 mt-4 sm:mt-20">
                            <div class="flex justify-between">
                                <p class="text-lg"><?= $categoryid["name"] ?></p>
                                <p class="text-md text-black/[0.5]"><?= number_format($categoryid["price"]) ?> ฿</p>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-5">
                    <div class="flex justify-between mt-5">
                        <div>
                            <p class="text-sm text-black/[0.5]">Subtotal</p>
                        </div>
                        <div>
                            <p class="text-sm text-black/[0.5]"><?= number_format($categoryid["price"]) ?> ฿</p>
                        </div>
                    </div>
                    <div class="flex text-sm justify-between mt-5">
                        <div>
                            <p class="text-sm text-black/[0.5]">Shipping</p>
                        </div>
                        <div>
                            <p class="text-sm text-black/[0.5]">40 ฿</p>
                        </div>
                    </div>
                    <hr class="mt-5">
                    <div class="flex justify-between mt-5">
                        <div>
                            <p class="text-xl text-black">Total</p>
                        </div>
                        <div>
                            <span class="text-sm text-black/[0.5]">THB&nbsp;&nbsp;&nbsp;</span>
                            <span class="text-xl text-black"><?= number_format($categoryid["price"] + 40) ?> ฿</span>
                        </div>
                    </div>
                <?php
                    }
                ?>
                </div>
            </div>

            <div class="grid gap-y-5">
                <div class="flex justify-start text-sm text-gray-500">
                    <!-- nav button-->
                    <a href="<?= $link . "?page=cart" ?>" class="">Cart&nbsp;&nbsp;</a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-[2px]" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                    <p>&nbsp;&nbsp;Shipping</p>
                </div>
                <hr>
                <p class="text-[#928F8F] lg:text-2xl md:text-xl">Contact information</p>
                <input type="text" name="email" placeholder="Email or mobile phone number  *" required class="rounded-md border-2 border-[#C0B6B6] p-3">
                <p class="text-[#928F8F] lg:text-2xl md:text-xl mt-2">Shipping address</p>
                <div class="grid grid-cols-2 gap-4">
                    <input type="text" name="firstname" placeholder="First Name *" required class="rounded-md border-2 border-[#C0B6B6] p-3">
                    <input type="text" name="lastname" placeholder="Last Name *" required class="rounded-md border-2 border-[#C0B6B6] p-3 ">
                </div>
                <input type="text" name="company" placeholder="Company (Optional)" required class="rounded-md border-2 border-[#C0B6B6] p-3">
                <textarea type="text" name="address" placeholder="Address *" required class="h-40 rounded-md border-2 border-[#C0B6B6] p-3"></textarea>
                <div class="grid grid-cols-1 lg:mt-20 lg:grid-cols-2">
                    <div>
                        <a href="<?= $link ?>" class="invisible lg:visible">
                            <i class="fa-sharp fa-solid fa-angle-left fa-lg"></i>
                            <span class="text-xl p-4">back to home page</span>
                        </a>
                    </div>
                    <div>
                        <div class="flex justify-center lg:justify-end">
                            <button type="submit" class="bg-black text-white rounded-md border-2 p-3 w-full lg:w-60">Confirm</button>
                        </div>
                        <div class="flex justify-center">
                            <a href="<?= $link ?>" class="visible lg:invisible lg:p-0 pt-2">
                                <i class="fa-sharp fa-solid fa-angle-left fa-lg"></i>
                                <span class="text-xl p-4">back to home page</span>
                            </a>
                        </div>
                    </div>
                </div>

                <input type="text" name="action" value="checkout" class="hidden">
            </div>
        </form>

        <!-- Summary (on the right) -->
        <div class="hidden p-12 lg:p-20 lg:pl-20 lg:block lg:bg-[#F2F2F2]">

            <?php
            if (empty($_GET["idproduct"])) {
            ?>
                <?php
                $subtotal = 0;
                foreach ($_SESSION["cart"] as $value) {
                    $subtotal += $value["price"] * $value["count"];
                ?>
                    <div class="grid grid-cols-3">
                        <div>
                            <div class="w-10 h-10 bg-black text-white text-sm pt-2 rounded-full flex justify-center translate-x-28 translate-y-4">
                                <p><?= $value["count"] ?></p>
                            </div>
                            <img src="uploads/<?= $value["file_name"] ?>" alt="tonmai" class="rounded-md w-32 h-32 max-w-full">
                        </div>
                        <div class="col-span-2 mt-20">
                            <div class="flex justify-between">
                                <p class="text-xl"><?= $value["name"] ?></p>
                                <p class="text-lg text-black/[0.5]"><?= number_format($value["price"] * $value["count"]) ?> ฿</p>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-5">
                <?php
                }

                ?>


                <div class="flex justify-between mt-5">
                    <div>
                        <p class="text-black/[0.5]">Subtotal</p>
                    </div>
                    <div>
                        <p class="text-black/[0.5]"><?= number_format($subtotal) ?> ฿</p>
                    </div>
                </div>
                <div class="flex justify-between mt-5">
                    <div>
                        <p class="text-black/[0.5]">Shipping</p>
                    </div>
                    <div>
                        <p class="text-black/[0.5]">40 ฿</p>
                    </div>
                </div>
                <hr class="mt-5">
                <div class="flex justify-between mt-5">
                    <div>
                        <p class="text-2xl text-black">Total</p>
                    </div>
                    <div>
                        <span class="text-black/[0.5]">THB&nbsp;&nbsp;&nbsp;</span>
                        <span class="text-2xl text-black"><?= number_format($subtotal + 40) ?> ฿</span>
                    </div>
                </div>
            <?php
            } else {

                $querycategory = $db->prepare("SELECT * FROM `product` WHERE id = :id");
                $querycategory->execute([":id" => $_GET["idproduct"]]);
                $categoryid = $querycategory->fetch(PDO::FETCH_ASSOC);
            ?>

                <?php
                $subtotal = 0;
                ?>

                <div class="grid grid-cols-3">
                    <div>
                        <div class="w-10 h-10 bg-black text-white text-sm pt-2 rounded-full flex justify-center translate-x-28 translate-y-4">
                            <p>1</p>
                        </div>
                        <img src="uploads/<?= $categoryid["file_name"] ?>" alt="tonmai" class="rounded-md w-32 h-32 max-w-full">
                    </div>
                    <div class="col-span-2 mt-20">
                        <div class="flex justify-between">
                            <p class="text-xl"><?= $categoryid["name"] ?></p>
                            <p class="text-lg text-black/[0.5]"><?= number_format($categoryid["price"]) ?> ฿</p>
                        </div>
                    </div>
                </div>
                <hr class="mt-5">



                <div class="flex justify-between mt-5">
                    <div>
                        <p class="text-black/[0.5]">Subtotal</p>
                    </div>
                    <div>
                        <p class="text-black/[0.5]"><?= number_format($categoryid["price"]) ?> ฿</p>
                    </div>
                </div>
                <div class="flex justify-between mt-5">
                    <div>
                        <p class="text-black/[0.5]">Shipping</p>
                    </div>
                    <div>
                        <p class="text-black/[0.5]">40 ฿</p>
                    </div>
                </div>
                <hr class="mt-5">
                <div class="flex justify-between mt-5">
                    <div>
                        <p class="text-2xl text-black">Total</p>
                    </div>
                    <div>
                        <span class="text-black/[0.5]">THB&nbsp;&nbsp;&nbsp;</span>
                        <span class="text-2xl text-black"><?= number_format($categoryid["price"] + 40) ?> ฿</span>
                    </div>
                </div>
            <?php
            }
            ?>


        </div>


    </div>
</div>

<script>
    const btn = document.getElementById('aToggle');
    btn.addEventListener('click', function() {
        var x = document.getElementById("Toggle");
        if (x.style.display == "block") {
            Summary.innerText = "Show summary";
            x.style.display = "none";
            ChevronID.innerHTML = '<i class="fa-solid fa-chevron-down ml-2"></i>';
        } else {
            Summary.innerText = "Hide summary";
            x.style.display = "block";
            ChevronID.innerHTML = '<i class="fa-solid fa-chevron-up ml-2"></i>';
            gsap.from("#Toggle", {
                opacity: 0,
                y: -20,
                duration: 0.5
            });
        }
    });
</script>