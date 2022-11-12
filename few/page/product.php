<?php


if (isset($_GET["id"])) {

    $querycategory = $db->prepare("SELECT * FROM `product` WHERE id = :id");
    $querycategory->execute([":id" => $_GET["id"]]);
    $category = $querycategory->fetch(PDO::FETCH_ASSOC);

?>
    <div id="detail">
        <div class="sm:mx-6 md:mx-10 lg:mx-32 xl:mx-44 2xl:mx-72">

            <!-- Example Items -->
            <section>
                <div class="my-6 flex justify-center">
                    <div class="w-full sm:w-fit grid grid-cols-1 sm:grid-cols-2 gap-6">

                        <!-- imgage -->
                        <div class="minw-min">
                            <div class="flex justify-center">
                                <div>
                                    <div>
                                        <img class="w-11/12 h-11/12" src="uploads/<?= $category["file_name"] ?>" alt="">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- amount -->
                        <div class="mx-3">
                            <h1 class="text-4xl"><?= $category["name"] ?></h1>
                            <div class="ml-6 mt-6">
                                <p class="text-xl"><?= number_format($category["price"]) ?> ฿</p>
                            </div>
                            <hr class="mt-6">
                            <hr />
                            <div class="mt-6 w-full grid grid-cols-1 gap-2">
                                <div class="flex text-lg justify-between">
                                    <p>Size</p>
                                    <p><?= $category["size"] ?> cm</p>
                                </div>

                                <div class="flex text-lg justify-between">
                                    <p>Amount</p>
                                    <div class="flex">
                                        <button class="border-black border-2 py-1 px-3 bg-black text-white">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                        <input class="border-black border-y-2 py-1 px-6 w-14 focus:outline-0" value="1">
                                        <button class="border-black border-2 py-1 px-3">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- button -->
                            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-2">
                                <button class="bg-black text-white py-1 px-8 border-black border-2">Buy Now</button>
                                <button class="bg-white py-1 px-8 border border-black border-2">Add to Cart</button>
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
                                        <img src="./../../img/water.png" alt="">
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
                                        <img src="./../../img/sunlight.png" alt="">
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
                                    <?=
                                    $category["toolstips"]
                                    ?>
                                </ul>
                            </div>
                            <!-- basic information -->
                            <div id="basic-information">
                                <div class="w-full bg-gray-100 rounded-md">
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

        <!-- Popular -->
        <section>
            <div class=" w-screen my-12">

                <!-- header -->
                <div class="flex justify-center">
                    <h3 class="text-3xl font-light">Recommend</h3>
                </div>

                <!-- items -->
                <div id="items" class="mt-3 flex p-3 h-96 overflow-x-auto">
                    <div class="flex">
                        <div class="w-96 mb-6 mr-6">
                            <div class="bg-gray-100 w-full h-full"></div>
                            <div class="flex justify-between text-lg mt-2">
                                <p>Tonmai 1</p>
                                <!-- <p>120$</p> -->
                            </div>
                        </div>
                        <div class="w-96 mb-6 mr-6">
                            <div class="bg-gray-100 w-full h-full"></div>
                            <div class="flex justify-between text-lg mt-2">
                                <p>Tonmai 2</p>
                                <!-- <p>120$</p> -->
                            </div>
                        </div>
                        <div class="w-96 mb-6 mr-6">
                            <div class="bg-gray-100 w-full h-full"></div>
                            <div class="flex justify-between text-lg mt-2">
                                <p>Tonmai 3</p>
                                <!-- <p>120$</p> -->
                            </div>
                        </div>
                        <div class="w-96 mb-6 mr-6">
                            <div class="bg-gray-100 w-full h-full"></div>
                            <div class="flex justify-between text-lg mt-2">
                                <p>Tonmai 4</p>
                                <!-- <p>120$</p> -->
                            </div>
                        </div>
                        <div class="w-96 mb-6 mr-6">
                            <div class="bg-gray-100 w-full h-full"></div>
                            <div class="flex justify-between text-lg mt-2">
                                <p>Tonmai 4</p>
                                <!-- <p>120$</p> -->
                            </div>
                        </div>
                        <div class="w-96 mb-6">
                            <div class="bg-gray-100 w-full h-full"></div>
                            <div class="flex justify-between text-lg mt-2">
                                <p>Tonmai 4</p>
                                <!-- <p>120$</p> -->
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
    </div>
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
                <h1 class="text-4xl font-bold flex justify-center"><?= $categoryid["name"] ?></h1>
                <div class="flex justify-center mt-4 text-md text-gray-500 gap-4">
                    <!-- to home button-->
                    <a href="#" class="hover:text-black">Home</a>
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
                <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 gap-4">


                    <?php

                    foreach ($category as $value) {
                    ?>
                        <a href="<?= $link . "?page=product&categoryid=" . $_GET["categoryid"] . "&id=" . $value["id"] ?>">
                            <div class="flex flex-col gap-3">
                                <div class="">
                                    <img style="height: 200px; width: 200px" src="uploads/<?= $value["file_name"] ?>" alt="">
                                </div>
                                <div class="flex flex-col">
                                    <span class=""><?= $value["name"] ?></span>
                                    <span class=""><?= number_format($value["price"]) ?> ฿</span>
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