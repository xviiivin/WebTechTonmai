<div class="container mx-auto px-1">

    <div class="md:px-6 lg:px-12 xl:px-16 2xl:px-48 py-8 md:py-12 lg:py-20 flex mt-10">
        <?php
        include("./include/components/sidebar_account.php");
        ?>
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
            </div>
            <div class="mb-16">
                <div class="p-[0.5rem]  bg-[#eaf7e6] show success">
                    <p class="font-semibold underline text-[#3a8735]">Make your order First</p>
                </div>
            </div>


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

                <a class="mt-3 text-lg w-4/6 text-center bg-black text-white  px-6 py-2 block hover:scale-105 " href="Address.html">
                    View Address
                </a>

            </div>
        </div>
    </div>
</div>