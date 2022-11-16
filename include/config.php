<?php


try {
    $db = new PDO("sqlite:tonmai.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if ($_GET["page"] == "logout") {
    session_destroy();
    echo "<script>alert('ออกจากระบบ')</script>";
    header("location: index.php");
}

function alert($status, $message, $redirect = null)
{
    if ($status == "success") {
        if ($redirect) {
            echo "<script>Swal.fire('สำเร็จ!','" . $message . "','success').then((result) => {
                window.location.href = ".'"'.$redirect.'"'."
              })</script>";
        } else {
            echo "<script>Swal.fire('สำเร็จ!','" . $message . "','success').then((result) => {
                window.location.href = document.URL
              })</script>";
        }

        
    } else if ($status == "error") {
        if ($redirect) {
            echo "<script>Swal.fire('ผิดพลาด!','" . $message . "','error').then((result) => {
                window.location.href = ".'"'.$redirect.'"'."
              })</script>";
        } else {
            echo "<script>Swal.fire('ผิดพลาด!','" . $message . "','error').then((result) => {
                window.location.href = document.URL
              })</script>";
        }
    }
}

// $test = $db->prepare('CREATE TABLE users (
//     id INTEGER PRIMARY KEY,
//     firstName varchar(255) NOT NULL,
//     lastName varchar(255) NOT NULL,
//     email varchar(255) NOT NULL,
//     password varchar(255) NOT NULL,
//     rank int
// );');
// $test->execute();


// $test = $db->prepare('DROP TABLE product');
// $test->execute();

// $test = $db->prepare('CREATE TABLE product (
//     id INTEGER PRIMARY KEY,
//     name VARCHAR(255) NOT NULL,
//     price int(10) NOT NULL,
//     size int(10) NOT NULL,
//     watering VARCHAR(5000) NOT NULL,
//     toolstips VARCHAR(5000) NOT NULL,
//     basic VARCHAR(5000) NOT NULL,
//     story VARCHAR(5000) NOT NULL,
//     file_name VARCHAR(5000) NOT NULL,
//     category int(10) NOT NULL,
//     date VARCHAR(255) NOT NULL
// );');
// $test->execute();
