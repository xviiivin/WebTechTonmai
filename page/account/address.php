<?php
$query1 = $db->prepare("SELECT * FROM history WHERE iduser = :iduser");
$query1->execute([':iduser' => $_SESSION["login"]["id"]]);
$result = $query1->fetchAll();
?>
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
        <div class="px-4 md:px-8 xl:px-16 2xl:px-24 w-full md:w-5/6">


            <div class="mb-10">
                <span class="text-2xl font-medium mb-6">Your Addresses</span>
            </div>
            <form action="<?= $link . "?page=address" ?>" method="post">
                <div class="mb-26">
                    <div class="flex border-b border-color-border py-5">
                        <div class="w-1/3">
                            First Name
                        </div>
                        <div id="fName">
                            <div class="w-2/3">
                                <?php
                                if ($_SESSION["login"]["firstname"] != null) {
                                    echo $_SESSION["login"]["firstname"];
                                } else {
                                    echo "-";
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="flex border-b border-color-border py-5">
                        <div class="w-1/3">
                            Last Name
                        </div>
                        <div id="lName">
                            <div class="w-2/3">
                                <?php
                                if ($_SESSION["login"]["lastname"] != null) {
                                    echo $_SESSION["login"]["lastname"];
                                } else {
                                    echo "-";
                                }
                                ?>
                            </div>
                        </div>
                    </div>


                    <div class="flex border-b border-color-border py-5">
                        <div class="w-1/3">
                            Company
                        </div>
                        <div id="Company">
                            <div class="w-2/3">
                                <?php
                                if ($_SESSION["login"]["company"] != null) {
                                    echo $_SESSION["login"]["company"];
                                } else {
                                    echo "-";
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="flex border-b border-color-border py-5">
                        <div class="w-1/3">
                            Address
                        </div>
                        <div id="Address">
                            <div class="w-2/3">
                                <?php
                                if ($_SESSION["login"]["address"] != null) {
                                    echo $_SESSION["login"]["address"];
                                } else {
                                    echo "-";
                                }
                                ?>
                            </div>
                        </div>
                    </div>


                    <div class="flex border-b border-color-border py-5">
                        <div class="w-1/3">
                            Country
                        </div>
                        <div id="Country">
                            <div class="w-2/3">
                                <?php
                                if ($_SESSION["login"]["country"] != null) {
                                    echo $_SESSION["login"]["country"];
                                } else {
                                    echo "-";
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="flex border-b border-color-border py-5">
                        <div class="w-1/3">
                            Postal/Zip code
                        </div>
                        <div id="Zip">
                            <div class="w-2/3">
                                <?php
                                if ($_SESSION["login"]["zipcode"] != null) {
                                    echo $_SESSION["login"]["zipcode"];
                                } else {
                                    echo "-";
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="flex border-b border-color-border py-5">
                        <div class="w-1/3">
                            Phone
                        </div>
                        <div id="Phone">
                            <div class="w-2/3">
                                <?php
                                if ($_SESSION["login"]["phone"] != null) {
                                    echo $_SESSION["login"]["phone"];
                                } else {
                                    echo "-";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="QEdit">
                    <button id="Edit" type="button" class="mt-[50px] text-center bg-black text-white block hover:scale-105 w-32 pl-6 pr-6 pt-2 pb-2">
                        Edit
                    </button>
                </div>
                <input type="text" name="action" value="create" style="display: none;">
            </form>
        </div>
    </div>
</div>

<script>
    const btn = document.getElementById('Edit');
    var state = true;
    btn.addEventListener('click', function() {
        if (state) {
            state = false;
            fName.innerHTML = "<input type='text' class='rounded-md border-2 border-gray-500' name='firstname' value=<?= $_SESSION["login"]["firstname"] ?>>"
            lName.innerHTML = "<input type='text' class='rounded-md border-2 border-gray-500' name='lastname' value=<?= $_SESSION["login"]["lastname"] ?>>"
            Company.innerHTML = "<input type='text' class='rounded-md border-2 border-gray-500' name='company' value=<?= $_SESSION["login"]["company"] ?>>"
            Address.innerHTML = "<textarea type='text' class='rounded-md border-2 border-gray-500' name='address' value=<?= $_SESSION["login"]["address"] ?>>"
            Country.innerHTML = "<input type='text' class='rounded-md border-2 border-gray-500' name='country' value=<?= $_SESSION["login"]["country"] ?>>"
            Zip.innerHTML = "<input type='number' class='rounded-md border-2 border-gray-500' name='zipcode' value=<?= $_SESSION["login"]["zipcode"] ?>>"
            Phone.innerHTML = "<input type='number' class='rounded-md border-2 border-gray-500' name='phone' value=<?= $_SESSION["login"]["phone"] ?>>"
            QEdit.innerHTML = '<button id="Edit" type="submit" class="mt-[50px] text-center bg-black text-white block hover:scale-105 w-32 pl-6 pr-6 pt-2 pb-2">Confirm</button>'
            <?php
            if ($_POST["action"] == "create") {
                $query1 = $db->prepare("INSERT INTO users (`firstname`, `lastname`, `company`, `address`, `country`) VALUES (:firstname, :lastname, :company, :address, :country)");
                $query1->execute([':firstname' => strtolower($_POST["firstname"]), ':lastname' => strtolower($_POST["lastname"]), ':company' => strtolower($_POST["company"]), ':address' => strtolower($_POST["address"]), ':country' => strtolower($_POST["country"])]);
                // alert("success", "ล็อกอินสำเร็จแล้ว", $link . "?page=login");
            }
            ?>
        } else {
            state = true;
        }
    });
</script>