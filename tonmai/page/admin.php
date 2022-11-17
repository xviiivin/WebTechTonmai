<?php
if ($_SESSION["login"]["rank"] == 0) {
    header("location: index.php");
}
?>




<div class="container mx-auto px-1">

    <div class="md:px-6 lg:px-12 xl:px-16 2xl:px-48 py-8 md:py-12 lg:py-20 flex mt-10">
    
            <?php


            if ($_GET["adminpage"] == "category") {
                include("admin/category.php");
            } else if ($_GET["adminpage"] == "history") {
                include("admin/history.php");
            } else {
                include("admin/category.php");
            }


            ?>




        </div>
    </div>
</div>