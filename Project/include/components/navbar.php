<!-- Navigator -->
<nav>
    <!-- Nav -->

    <div class="">
        <div id="nav" class="sticky mx-10 lg:mx-24 xl:mx-36">
            <div class="py-10 flex-row flex items-center justify-between">
                <!-- responsive navside md: -->
                <div class="block md:hidden w-1/4">
                    <div class="px-3 group cursor-pointer" onclick="OpenModal('vertical-nav')">
                        <svg class="w-[22px] h-[22px]" fill="currentColor" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M442 114H6a6 6 0 0 1-6-6V84a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6z">
                            </path>
                        </svg>
                    </div>
                </div>
                <!-- logo -->
                <div class="md:w-1/4">
                    <a href="<?= $link; ?>">
                        <img class="h-12 min-w-min max-w-min" src="/src/img/logo.png" alt="NaN">
                    </a>
                </div>
                <!-- Dropdown -->
                <div class="hidden md:block">
                    <ul class="flex items-center gap-12">
                        <li>
                            <a href="<?= $link; ?>" class="">
                                <p class="inline-block
                relative
                cursor-pointer
                transition-all
                duration-500
                before:content-['']
                before:absolute
                before:-bottom-2
                before:left-0
                before:w-0
                before:h-[2px]
                before:opacity-0
                before:transition-all
                before:duration-500
                before:bg-black
                hover:before:w-full
                hover:before:opacity-100
                ">
                                    Home
                                </p>
                            </a>
                        </li>
                        <li id="nav-dropdown" class="group inline-block relative">
                            <div class="flex gap-2 items-center">
                                <p class="inline-block
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
                  group-hover:before:w-full
                  group-hover:before:opacity-100
                  ">Type of Trees
                                </p>
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                            <div id="modal-dropdown" class="absolute p-3 bg-white drop-shadow-2xl rounded hidden opacity-100 mt-6">
                                <ul>
                                    <?php
                                    $querycategory = $db->prepare("SELECT * FROM `category`");
                                    $querycategory->execute();
                                    $category = $querycategory->fetchAll();
                                    foreach ($category as $value) {
                                    ?>
                                        <li>
                                            <a class="bg-white p-3 w-[12em] block hover:bg-gray-200 hover:text-black duration-500 text-gray-500" href="<?= $link . "?page=product&categoryid=" . $value["id"] ?>">
                                                <?= $value["name"] ?>
                                            </a>
                                        </li>
                                    <?php
                                    }
                                    ?>


                                </ul>
                            </div>
                        </li>
                        <li class="">
                            <a href="#recommendedhome" class="">
                                <p class="inline-block
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
                                    recommend
                                </p>
                            </a>
                        </li>

                        <?php
                        if ($_SESSION["login"]["rank"] == 1) {
                        ?>
                            <li class="">
                                <a href="<?= $link; ?>?page=admin" class="">
                                    <p class="inline-block
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
                                        Admin Control
                                    </p>
                                </a>
                            </li>
                        <?php
                        }
                        ?>


                    </ul>
                </div>
                <!-- nav account -->
                <div class="flex-row flex w-1/4 md:w-auto justify-end lg:justify-center gap-x-8 md:gap-x-10">
                    <div class="items-center">
                        <button id="search-modal" onclick="OpenModal('search-bar')">
                            <i class="fa-solid fa-magnifying-glass w-[18px] h-[18px]"></i>
                        </button>
                    </div>
                    <div class="md:block hidden">
                        <a href=" <?= isset($_SESSION["login"]) ? $link . "?page=account" : $link . "?page=login" ?>">
                            <i class="fa-regular fa-user w-[20px] h-[20px]"></i>
                        </a>
                    </div>
                    <div class="">
                        <div onclick="OpenModal('vertical-cart')">
                            <div class="relative inline-block">
                                <i class="fa-solid fa-cart-shopping w-[20px] h-[20px] cursor-pointer"></i>
                                <div class="inline-flex absolute -top-3 -right-3 justify-center items-center w-5 h-5 text-xs text-white bg-black rounded-full text-white" id="idcartbrabra">
                                    <?= number_format(count($_SESSION["cart"])) ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vertical Nav -->
    <navside id="vertical-nav" class="absolute mx-0 top-0 z-30" aria-label="Sidebar">
        <!-- Container -->
        <div class="absolute">
            <div class="flex w-[20em] h-screen flex justify-between">
                <!-- Navigator -->
                <div id="nav-menu" class="w-full bg-white border flex flex-col justify-between">
                    <ul class=" py-6 px-3">
                        <li class="mt-0 py-3 px-3 hover:bg-gray-200 transition-all">
                            <a href="<?= $link; ?>">Home</a>
                        </li>
                        <li id="asd" class="mt-0">
                            <div class="justify-between flex py-3 px-3 hover:bg-gray-200 transition-all">
                                <label for="">Type of Trees</label>
                                <i class="fa-sharp fa-solid fa-angle-right"></i>
                            </div>
                            <div id="type-tree-dropdown" class="ml-3">
                                <ul>
                                    <li class="p-3 hover:bg-gray-200 transition-all">Auspicious Tree</li>
                                    <li class="p-3 hover:bg-gray-200 transition-all">Air Purifying Tree</li>
                                    <li class="p-3 hover:bg-gray-200 transition-all">Easy Care Plants</li>
                                    <li class="p-3 hover:bg-gray-200 transition-all">Flowering trees</li>
                                    <li class="p-3 hover:bg-gray-200 transition-all">Tropical trees</li>
                                </ul>
                            </div>
                        </li>
                        <li class="mt-0 py-3 px-3 hover:bg-gray-200 transition-all">
                            <a href="#">Recommend</a>
                        </li>
                    </ul>
                    <!-- Auth -->
                    <div class="flex flex-col md:hidden block py-6 px-3 mb-6">
                        <label class="text-xl" for="">My Account</label>
                        <a class="bg-black text-white mt-3 py-2 text-center" href="#">Login</a>
                        <a class="border-[2px] border-black py-1 mt-3 text-center" href="#">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </navside>

    <!-- Vertical Cart -->
    <?php include("cartsidebar.php"); ?>

    <!-- Search bar -->
    <div id="search-bar" class="w-full top-0 absolute hidden z-30">
        <div class="bg-white md:block hidden">
            <div class="pt-12 pb-6 px-12 flex-row flex items-center justify-between">
                <div class="px-6 md:block hidden">
                    <a href="<?= $link; ?>">
                        <img src="/src/img/logo.png" class="mr-3 h-12" alt="NaN">
                    </a>
                </div>
                <div class="w-2/3 px-12">
                    <form action="/search" method="GET" class="relative w-full flex border border-black rounded-md p-1">
                        <input type="text" placeholder="Search products" aria-label="Search products" class="w-full h-11 px-3" style="border: none;">
                        <button class="absolute top-px right-0 py-3 px-3.5">
                            <svg class="w-[18px] h-[18px] mx-3 cursor-pointer" fill="currentColor" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z">
                                </path>
                            </svg>
                        </button>
                    </form>
                </div>
                <div class="flex flex-row px-6">
                    <svg class="w-[20px] h-[20px] mx-3 cursor-pointer" fill="currentColor" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M313.6 304c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4 14.6 0 38.3 16 89.6 16 51.7 0 74.9-16 89.6-16 47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0 80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z">
                        </path>
                    </svg>
                    <div class="relative inline-block">
                        <svg class="w-[20px] h-[20px] mx-3 cursor-pointer" fill="currentColor" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M352 128C352 57.42 294.579 0 224 0 153.42 0 96 57.42 96 128H0v304c0 44.183 35.817 80 80 80h288c44.183 0 80-35.817 80-80V128h-96zM224 48c44.112 0 80 35.888 80 80H144c0-44.112 35.888-80 80-80zm176 384c0 17.645-14.355 32-32 32H80c-17.645 0-32-14.355-32-32V176h48v40c0 13.255 10.745 24 24 24s24-10.745 24-24v-40h160v40c0 13.255 10.745 24 24 24s24-10.745 24-24v-40h48v256z">
                            </path>
                        </svg>
                        <div class="inline-flex absolute -top-2 -right-2 justify-center items-center w-6 h-6 text-xs text-white bg-black rounded-full text-white">
                            0</div>
                    </div>
                </div>
            </div>
            <div class="container mx-auto pb-6">
                <div class="text-center">
                    <p>Poppular Searches: <b class="underline ml-2">Air Purifying Tree</b></p>
                </div>
            </div>
        </div>
        <!-- search bar responsive -->
        <div class="md:hidden block px-6 py-3 bg-white">
            <div class="flex justify-between">
                <label for="">Search our store</label>
                <button onclick="OpenModal('search-bar')" class="px-1">
                    <svg class="w-[20px] h-[20px]" fill="currentColor" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z">
                        </path>
                    </svg>
                </button>
            </div>
            <form action="/search" method="GET" novalidate="" class="relative w-full flex border border-black mt-3">
                <input type="text" placeholder="Search products" aria-label="Search products" class="w-full h-11 px-3" style="border: none;">
                <button class="absolute top-px right-0 py-3 px-3.5">
                    <svg class="w-[18px] h-[18px] mx-3 cursor-pointer" fill="currentColor" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z">
                        </path>
                    </svg>
                </button>
            </form>
            <div class="w-full align-center items-center md:text-center pb-9 mt-3">
                <p class="text-gray-500">Poppular Searches: <b class="underline ml-2">Air Purifying Tree</b></p>
            </div>
        </div>
    </div>
</nav>

<!-- Fade Background -->
<div id="fade-bg" class="w-full h-full bg-[#333333] hidden opacity-0 absolute top-0 z-20" onclick="OpenModal('fade-bg')">
</div>