<div class="container mx-auto px-1">

    <div class="md:px-6 lg:px-12 xl:px-16 2xl:px-48 py-8 md:py-12 lg:py-20 flex mt-10">
        <?php
        // include("./include/components/sidebar_account.php");
        ?>
        <div class="md:px-4 xl:px-16 w-1/6  hidden md:flex flex-col border-r border-color-border">
            <div>
                <a href="<?= $link . "?page=account" ?>" class="text-lg">Dashboard</a>
            </div>
            <div>
                <a href="<?= $link . "?page=address" ?>" class="text-base text-[#666666] hover:text-black">Addresses</a>
            </div>
            <div>
                <a href="<?= $link . "?page=logout" ?>" class="text-base text-[#666666] hover:text-black">Log Out</a>
            </div>
        </div>
        <div class="px-4 md:px-8 xl:px-16 2xl:px-24 w-full md:w-5/6">
            <div class="mb-10">
                Hello
                <span class="font-semibold"><?php echo ($_SESSION["login"]["firstname"]) . " " . ($_SESSION["login"]["lastname"]); ?></span>
                <a href="<?= $link . "?page=logout" ?>" class="underline">(log out)</a>
            </div>

            <div class='mb-16'>
                <div class="text-2xl font-medium mb-8">
                    <p>Order History</p>
                </div>

                <table class="table-fixed mt-8 border-collapse border-collapse border-b border-gray-300 w-full">
                    <thead class="border-collapse border-b border-gray-300 font-bold text-lg">
                        <tr>
                            <th class="mx-4">id</th>
                            <th class="hidden sm:table-cell px-4">Product</th>
                            <th class="hidden lg:table-cell px-4">Price</th>
                            <th class="text-left hidden lg:table-cell px-4">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $query1 = $db->prepare("SELECT * FROM history WHERE iduser = :iduser");
                        $query1->execute([':iduser' => $_SESSION["login"]["id"]]);
                        $result = $query1->fetchAll();


                        foreach ($result as $value) {
                            $fewza = json_decode($value["product"], true);
                            $test = array();
                            foreach ($fewza as $value1) {
                                array_push($test, "[ " . $value1["name"] . ": " . $value1["price"] . " ]");
                            }
                        ?>
                            <tr>
                                <!-- item content -->
                                <td class="text-center">
                                    <p><?= $value["id"] ?></p>
                                </td>
                                <!-- Price -->
                                <td class="text-center">
                                    <p><?= implode(", ", $test) ?></p>
                                </td>
                                <!-- Quantity -->
                                <td class="text-center">
                                    <p><?= number_format($value["price"]) ?></p>
                                </td>
                                <!-- Total -->
                                <td class="text-center">
                                    <p><?= date("Y-m-d, H:i:s", $value["date"]) ?></p>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>





                    </tbody>
                </table>
            </div>

            <?php
            if (count($result) == 0) {
            ?>
                <div class="mb-16">
                    <div class="p-[0.5rem]  bg-[#eaf7e6] show success">
                        <p class="font-semibold underline text-[#3a8735]">Make your order First</p>
                    </div>
                </div>

            <?php
            }
            ?>



            <div class="mb-16">
                <p class="text-2xl font-medium mb-3">Accout Details</p>


                <div class="flex border-b border-color-border py-5">
                    <div class="w-1/3">
                        Name
                    </div>
                    <div class="w-2/3">
                        <?php echo ($_SESSION["login"]["firstname"]) . " " . ($_SESSION["login"]["lastname"]); ?>
                    </div>
                </div>


                <div class="flex border-b border-color-border py-5">
                    <div class="w-1/3">
                        Email
                    </div>
                    <div class="w-2/3">
                        <?php echo ($_SESSION["login"]["email"]); ?>
                    </div>
                </div>

            </div>

            <div class="">

                <a class="mt-3 text-lg w-4/6 text-center bg-black text-white px-6 py-2 block hover:scale-105 " href="<?= $link . "?page=address" ?>">
                    View Address
                </a>

            </div>
        </div>
    </div>
</div>