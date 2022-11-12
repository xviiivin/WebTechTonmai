<?php
if ($_SESSION["login"]["rank"] == 0) {
    header("location: index.php");
}
?>




<div class="container mx-auto px-1">

    <div class="md:px-6 lg:px-12 xl:px-16 2xl:px-48 py-8 md:py-12 lg:py-20 flex mt-10">
        <div class="md:px-4 xl:px-16 w-1/6  hidden md:flex flex-col border py-5 border-color-border">
            <div>
                <a href="<?= $link . "?page=admin&adminpage=home" ?>" class="text-lg">Category</a>
            </div>
            <div>
                <a href="<?= $link . "?page=address" ?>" class="text-base -mt-2 text-[#666666] hover:text-black">History</a>
            </div>
            <div>
                <a href="<?= $link . "?page=logout" ?>" class="text-base text-[#666666] hover:text-black">Log Out</a>
            </div>
        </div>
        <div class="px-4 md:px-8 xl:px-16 2xl:px-24 w-full md:w-5/6 border-r">


            <?php


                if ($_GET["adminpage"] == "category") {
                    include("admin/category.php");
                } else {
                    include("admin/category.php");
                }


            ?>


        </div>
    </div>
</div>