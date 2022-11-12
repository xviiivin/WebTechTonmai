<?php

if ($_POST["action"] == "addcategory") {
    $check = $db->prepare("SELECT * FROM category WHERE name = :name");
    $check->execute(array(":name" => ($_POST["name"])));
    $test = $check->fetch(PDO::FETCH_ASSOC);
    if ($test) {
        alert("error", "มีชื่อหมวดหมู่อยู่ในระบบแล้ว");
        header("Refresh:0");
    } else {
        $query1 = $db->prepare("INSERT INTO category (`name`) VALUES (:name)");
        $query1->execute([':name' => ($_POST["name"])]);
        alert("success", "เพิ่มหมวดหมู่เรียบร้อย");
        header("Refresh:0");
    }
}

if ($_POST["action"] == "deletecategorywithid") {
    $query1 = $db->prepare("DELETE FROM category WHERE id = :id");
    $query1->execute([":id" => $_POST["id"]]);
    alert("success", "ลบหมวดหมู่สำเร็จ!!!");
    header("Refresh:0");
}


if ($_POST["action"] == "addproduct") {
    $target_dir = "uploads/";
    $temp = explode(".", $_FILES["file"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $target_file = $target_dir . $newfilename;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo basename($newfilename);


            $query1 = $db->prepare("INSERT INTO product (`name`, `price`, `size`, `watering`,`sunlight`, `toolstips`, `basic`, `story`, `category`, `file_name`, `date`) VALUES (:name, :price, :size, :watering, :sunlight, :toolstips, :basic, :story, :category, :file_name, :date)");
            $query1->execute([':name' => ($_POST["name"]), ':price' => ($_POST["price"]), ':size' => ($_POST["size"]), ':watering' => ($_POST["watering"]), ':toolstips' => ($_POST["toolstips"]), ':sunlight' => $_POST["sunlight"], ':basic' => ($_POST["basic"]), ':story' => ($_POST["story"]), ':category' => ($_GET["categoryid"]), ':file_name' => ($newfilename), ':date' => (time())]);

            alert("success", "เพิ่มข้อมูลเรียบร้อย");
            header("Refresh:0");
        } else {
            alert("error", "Sorry, there was an error uploading your file.");
        }
    } else {
        alert("error", "File is not an image.");
    }
}




if ($_POST["action"] == "deleteproduct") {
    $query1 = $db->prepare("DELETE FROM product WHERE id = :id");
    $query1->execute([":id" => $_POST["id"]]);
    alert("success", "ลบสินค้าสำเร็จ!!!");
    header("Refresh:0");
}

?>



<?php


if (isset($_GET["categoryid"])) {
    $querycategory = $db->prepare("SELECT * FROM `category` WHERE id = :id");
    $querycategory->execute([":id" => $_GET["categoryid"]]);
    $categoryid = $querycategory->fetch(PDO::FETCH_ASSOC);

    $querycategory = $db->prepare("SELECT * FROM `product` WHERE category = :id");
    $querycategory->execute([":id" => $_GET["categoryid"]]);
    $category = $querycategory->fetchAll();
?>

    <center>
        <span class="text-2xl">ชื่อหมวดหมู่: <?= $categoryid["name"] ?></span>
    </center>


    <div class="grid grid-cols-12 mt-8 gap-4">
        <div class="col-span-12 border py-5 px-4">
            <div class="mb-2">
                <center>
                    <form action="<?= $link . "?page=admin&adminpage=home&categoryid=" . $_GET["categoryid"] ?>" method="post" enctype="multipart/form-data">
                        <div>
                            <span class="text-center">
                                ชื่อสินค้า
                            </span>
                            <br />
                            <input type="text" name="name" placeholder="" class="text-center mt-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        </div>
                        <div class="mt-3">
                            <span class="text-center">
                                ราคา
                            </span>
                            <br />
                            <input type="number" name="price" min="1" placeholder="" class="text-center mt-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        </div>

                        <div class="mt-3">
                            <span class="text-center">
                                Size
                            </span>
                            <br />
                            <input type="number" name="size" placeholder="" class="text-center mt-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>
                        <div class="mt-3">
                            <span class="text-center">
                                Watering
                            </span>
                            <br />
                            <textarea type="text" name="watering" placeholder="ชื่อสินค้า" class=" mt-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"> </textarea>
                        </div>


                
                        <div class="mt-3">
                            <span class="text-center">
                                Sunlight
                            </span>
                            <br />
                            <textarea type="text" name="sunlight" placeholder="ชื่อสินค้า" class=" mt-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"> </textarea>
                        </div>

                        <div class="mt-3">
                            <span class="text-center">
                                Tools tips
                            </span>
                            <br />
                            <textarea type="text" name="toolstips" placeholder="ชื่อสินค้า" class=" mt-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"> </textarea>
                        </div>

                        <div class="mt-3">
                            <span class="text-center">
                                Basic information

                            </span>
                            <br />
                            <textarea type="text" name="basic" placeholder="ชื่อสินค้า" class=" mt-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"> </textarea>
                        </div>

                        <div class="mt-3">
                            <span class="text-center">
                                Story
                            </span>
                            <br />
                            <textarea type="text" name="story" placeholder="ชื่อสินค้า" class=" mt-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"> </textarea>
                        </div>


                        <div class="mt-3">
                            <span class="text-center">
                                รูปภาพ
                            </span>
                            <br />
                            <br />
                            <input type="file" name="file" placeholder="" class=" text-sm text-slate-500
      file:mr-4 file:py-2 file:px-4
      file:rounded-full file:border-0
      file:text-sm file:font-semibold
      file:bg-violet-50 file:text-violet-700
      hover:file:bg-violet-100" />
                        </div>
                        <br />

                        <input type="text" name="action" value="addproduct" style="display: none;" placeholder="ชื่อหมวดหมู่" class="text-center mt-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <button type="submit" class="  mt-4 px-11 w-full py-1 text-center rounded-md border-2 bg-black text-white">เพิ่มรายการ</button>
                    </form>
                </center>
            </div>
        </div>
        <div class="col-span-12 ">
            <div class="grid grid-cols-12 gap-4">


                <?php

                foreach ($category as $value) {
                ?>
                    <div class="col-span-4 border py-5 px-4">
                        <span>
                            ชื่อ: <?= $value["name"] ?>
                        </span>
                        <br />
                        <span>
                            ราคา: <?= number_format($value["price"]) ?>
                        </span>
                        <br />
                        <span>
                            size: <?= number_format($value["size"]) ?>
                        </span>
                        <br />
                        <center class="mt-4">
                            <span>
                                <img style="height: 100px; width: 100px" src="uploads/<?= $value["file_name"] ?>" alt="" srcset="">
                            </span>
                        </center>
                        <form action="<?= $link . "?page=admin&adminpage=home&categoryid=" . $_GET["categoryid"] ?>" method="post">
                            <input type="text" style="display:none" name="id" value="<?= $value["id"] ?>">
                            <input type="text" style="display:none" name="action" value="deleteproduct">
                            <button class="mt-4 px-11 w-full py-1 text-center rounded-md border-2 bg-black text-white">ลบข้อมูล</button>
                        </form>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>


<?php
} else {
    $querycategory = $db->prepare("SELECT * FROM `category`");
    $querycategory->execute();
    $category = $querycategory->fetchAll();

?>
    <center>
        <span class="text-2xl">หมวดหมู่สินค้า</span>
    </center>

    <div class="grid grid-cols-12 mt-8 gap-4">
        <div class="col-span-4 border py-5 px-4">
            <div class="mb-2">
                <center>
                    <form action="<?= $link . "?page=admin&adminpage=home" ?>" method="post">
                        <span class="text-center">
                            เพิ่มหมวดหมู่สินค้า
                        </span>
                        <input type="text" name="name" placeholder="ชื่อหมวดหมู่" class="text-center mt-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <input type="text" name="action" value="addcategory" style="display: none;" placeholder="ชื่อหมวดหมู่" class="text-center mt-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <button type="submit" class="  mt-4 px-11 w-full py-1 text-center rounded-md border-2 bg-black text-white">เพิ่มรายการ</button>
                    </form>
                </center>
            </div>
        </div>
        <div class="col-span-8 ">
            <div class="grid grid-cols-12 gap-4">
                <?php
                foreach ($category as $value) {
                ?>
                    <div class="col-span-6 border py-5 px-4">
                        <span>
                            ชื่อ: <?= $value["name"] ?>
                        </span>
                        <br />
                        <br />
                        <center>
                            <a href="<?= $link . "?page=admin&adminpage=home&categoryid=" . $value["id"] ?>">คลิกเพื่อเข้าไปดูหมวดหมู่</a>
                        </center>
                        <form action="<?= $link . "?page=admin&adminpage=home" ?>" method="post">
                            <input type="text" style="display:none" name="id" value="<?= $value["id"] ?>">
                            <input type="text" style="display:none" name="action" value="deletecategorywithid">
                            <button class="mt-4 px-11 w-full py-1 text-center rounded-md border-2 bg-black text-white">ลบข้อมูล</button>
                        </form>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php
}
?>