<div class="container mx-auto px-1">

    <div class="md:px-6 lg:px-12 xl:px-16 2xl:px-48 py-8 md:py-12 lg:py-20 flex mt-10">
        <?php
        // include("./include/components/sidebar_account.php");
        ?>
        <div class="md:px-4 xl:px-16 w-1/6  hidden md:flex flex-col border-r border-color-border">
            <div>
                <a href="<?= $link . "?page=account" ?>" class="text-base text-[#666666] hover:text-black">Dashboard</a>
            </div>
            <div>
                <a href="<?= $link . "?page=address" ?>" class="text-lg">Addresses</a>
            </div>
            <div>
                <a href="<?= $link . "?page=logout" ?>" class="text-base text-[#666666] hover:text-black">Log Out</a>
            </div>
        </div>
        <form class="px-4 md:px-8 xl:px-16 2xl:px-24 w-full md:w-5/6">


            <div class="mb-10">
                <span class="text-2xl font-medium mb-6">Your Addresses</span>

                <!-- <a href="edit.html" class="mt-3 text-lg bg-black text-white  px-6 py-2 block hover:scale-105 w-[15%]">
                        Edit Address (1)
                    </a> -->

            </div>
            <div class="mb-26">
                <div class="flex border-b border-color-border py-5">
                    <div class="w-1/3">
                        First Name
                    </div>
                    <div class="w-2/3">
                        -
                    </div>
                </div>

                <div class="flex border-b border-color-border py-5">
                    <div class="w-1/3">
                        Last Name
                    </div>
                    <div class="w-2/3">
                        -
                    </div>
                </div>


                <div class="flex border-b border-color-border py-5">
                    <div class="w-1/3">
                        Company
                    </div>
                    <div class="w-2/3">
                        -
                    </div>
                </div>

                <div class="flex border-b border-color-border py-5">
                    <div class="w-1/3">
                        Address
                    </div>
                    <div class="w-2/3">
                        -
                    </div>
                </div>


                <div class="flex border-b border-color-border py-5">
                    <div class="w-1/3">
                        Country
                    </div>
                    <div class="w-2/3">
                        -
                    </div>
                </div>

                <div class="flex border-b border-color-border py-5">
                    <div class="w-1/3">
                        Postal/Zip code
                    </div>
                    <div class="w-2/3">
                        -
                    </div>
                </div>

                <div class="flex border-b border-color-border py-5">
                    <div class="w-1/3">
                        Phone
                    </div>
                    <div class="w-2/3">
                        -
                    </div>
                </div>
            </div>

            <a id="Edit" class="mt-[50px] text-center bg-black text-white block hover:scale-105 w-32 pl-6 pr-6 pt-2 pb-2">
                Edit
            </a>
        </form>
    </div>
</div>

<script>
    const btn = document.getElementById('Edit');
    var state = true;
    btn.addEventListener('click', function() {
        if (state) {
            state = false;
            Edit.innerText = "Confirm";
        }
        else {
            state = true;
            Edit.innerText = "Edit";
        }

    });
</script>