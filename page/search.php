<?php


if (empty($_GET["keyword"])) {
  header("location: index.php");
}

$_GET["number"] = empty($_GET["number"]) ? 1 : $_GET["number"];
$pageza = ($_GET["number"] - 1) * 16;


$query1 = $db->prepare('SELECT * FROM product WHERE name LIKE :keywords');
$query1->execute([":keywords" => '%' . $_GET["keyword"] . '%']);
$count = count($query1->fetchAll());

$query = $db->prepare('SELECT * FROM product WHERE name LIKE :keywords LIMIT 16 OFFSET :page');
$query->execute([":keywords" => '%' . $_GET["keyword"] . '%', ':page' => $pageza]);
$data = $query->fetchAll();

$el = $db->prepare('SELECT * FROM category WHERE id LIKE :keywords');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>


<div id="result">
  <div class="container sm:mx-auto my-12">
    <div class="flex flex-col">
      <h1 class="text-4xl font-bold flex justify-center">Found <?= number_format($count) ?> results for "<?= $_GET["keyword"] ?>"</h1>
      <div class="flex justify-center mt-4 text-md text-gray-500 gap-4">
        <!-- to home button-->
        <a href="<?= $link ?>" class="hover:text-black">Home</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="mt-[6px]" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
          <polyline points="9 18 15 12 9 6"></polyline>
        </svg>
        <p class="text-black">Search results: "<?= $_GET["keyword"] ?>"</p>
      </div>
    </div>
    <?php
    if ($count == 0) {
    ?>
      <div class="flex justify-center text-center items-center text-2xl m-12 py-24">
        <span>There no product found :(</span>
      </div>
    <?php
    }
    ?>
    <div class="mt-[5em] <?php if ($count == 0) {
                            echo "hidden";
                          } ?>">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        <?php
        foreach ($data as $value) {
        ?>
          <!-- <a href="http://localhost/few/index.php?page=product&amp;categoryid=11&amp;id=9"> -->
          <a href="<?= $link . "?page=product&categoryid=" . $value["category"] . "&id=" . $value[0] ?>">
            <div class="flex flex-col gap-3">
              <div class="overflow-hidden rounded">
                <img class="hover:scale-[1.25] transition-all duration-500" style="height: 400px; width: 400px" src="uploads/<?= $value["file_name"] ?>" alt="">
              </div>
              <div class="flex justify-between">
                <div class="flex flex-col">
                  <span class=""><?= $value["name"] ?></span>
                  <span class="text-sm text-gray-500">
                    <?php
                    $asd = $value["category"];
                    $teet =  implode($db->query("SELECT name FROM category WHERE id = $asd")->fetch(PDO::FETCH_ASSOC));

                    echo $teet;
                    ?>
                  </span>
                </div>
                <div>
                  <span class=""><?= number_format((float)$value["price"], 2, '.', "") ?> ฿</span>
                </div>
              </div>
            </div>
          </a>
        <?php
        }
        ?>
      </div>

      <div class="sf-pagination text-center mt-[6em] mb-[6em]">
        <span class="prev">
          <a href="<?= $link . "?page=search&keyword=" . $_GET["keyword"] . "&number=1" ?>">«</a>
        </span>
        <?php
        for ($i = 1; $i <= ceil($count / (24)); $i++) {
        ?>
          <span class="page <?= $i == $_GET["number"] ? 'current' : '' ?>">
            <a href="<?= $link . "?page=search&keyword=" . $_GET["keyword"] . "&number=" . $i ?>"><?= $i ?></a>
          </span>
        <?php
        }
        ?>
        <span class="next">
          <a href="<?= $link . "?page=search&keyword=" . $_GET["keyword"] . "&number=" . ceil($count / (24)) ?>">»</a>
        </span>
      </div>
    </div>
  </div>
</div>


<style>
  .sf-pagination {
    align-items: center;
    display: flex;
    justify-content: center
  }

  .prod__countdown--style-2:not(.hidden)>.sf-pagination {
    margin: 0
  }

  .prod__countdown--style-2>.sf-pagination:last-child {
    margin-top: 10px
  }

  .sf-pagination>span {
    align-items: center;
    display: flex;
    height: 40px;
    justify-content: center;
    margin-left: .25rem;
    margin-right: .25rem;
    width: 40px
  }

  .prod__countdown--style-2:not(.hidden)>.sf-pagination>span {
    margin: 0
  }

  .prod__countdown--style-2>.sf-pagination>span:last-child {
    margin-top: 10px
  }

  .sf-pagination>span>a {
    align-items: center;
    display: flex;
    height: 100%;
    justify-content: center;
    width: 100%
  }

  .collection-list .sf-pagination>span>a .collection-list__controls.absolute {
    height: auto;
    right: 1rem;
    right: 0
  }

  .prod__countdown--style-2:not(.hidden)>.sf-pagination>span>a {
    margin: 0
  }

  .prod__countdown--style-2>.sf-pagination>span>a:last-child {
    margin-top: 10px
  }

  .sf-pagination>span:not(.deco) {
    border-radius: 9999px
  }

  .sf-pagination>span:not(.deco).current {
    background-color: black;
    color: white;
  }

  .sf-pagination>span:not(.deco):hover {
    background-color: #f3f3f3;
  }

  .sf-pagination>span:not(.deco).current:hover {
    background-color: black;
    color: white;
  }

  .sf-pagination>span:not(.deco).current {
    height: 44px;
    width: 44px
  }
</style>