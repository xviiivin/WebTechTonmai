
<?php

try {
    $db = new PDO("sqlite:tonmai.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$link = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

if ($_GET["page"] == "logout") {
    session_destroy();
    echo "<script>alert('ออกจากระบบ')</script>";
    header("location: index.php");
}

if (isset($_SESSION["login"])) {
    $checkeee = $db->prepare("SELECT * FROM users WHERE id = :id");
    $checkeee->execute(array(":id" => $_SESSION["login"]["id"]));
    $test = $checkeee->fetch(PDO::FETCH_ASSOC);
    $_SESSION["login"] = $test;
}

if (empty($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

function alert($status, $message, $redirect = null)
{
    if ($status == "success") {
        if ($redirect) {
            echo "<script>Swal.fire('สำเร็จ!','" . $message . "','success').then((result) => {
                window.location.href = " . '"' . $redirect . '"' . "
              })</script>";
        } else {
            echo "<script>Swal.fire('สำเร็จ!','" . $message . "','success').then((result) => {
                window.location.href = document.URL
              })</script>";
        }
    } else if ($status == "error") {
        if ($redirect) {
            echo "<script>Swal.fire('ผิดพลาด!','" . $message . "','error').then((result) => {
                window.location.href = " . '"' . $redirect . '"' . "
              })</script>";
        } else {
            echo "<script>Swal.fire('ผิดพลาด!','" . $message . "','error').then((result) => {
                window.location.href = document.URL
              })</script>";
        }
    }
}
?>