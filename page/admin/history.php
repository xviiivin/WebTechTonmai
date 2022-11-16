<div class="md:px-4 xl:px-16 w-1/6  hidden md:flex flex-col border py-5 border-color-border">
    <div>
        <a href="<?= $link . "?page=admin&adminpage=home" ?>" class="text-base text-[#666666] hover:text-black">Category</a>
    </div>
    <div>
        <a href="<?= $link . "?page=admin&adminpage=history" ?>" class="text-lg mt-2 ">History</a>
    </div>
    <div>
        <a href="<?= $link . "?page=logout" ?>" class="text-base text-[#666666] hover:text-black">Log Out</a>
    </div>
</div>
<div class="px-4 md:px-8 xl:px-16 2xl:px-24 w-full md:w-5/6 border-r">
    <center>
        <span class="text-2xl">ประวัติการซื้อสินค้า</span>
    </center>




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

            $query1 = $db->prepare("SELECT * FROM history INNER JOIN users ON users.id = history.iduser;");
            $query1->execute();
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