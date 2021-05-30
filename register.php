<?php
    ob_start();
    setcookie("registering", "true", time() + 3600);
    
    $id = $_POST["id"];
    $pwd = $_POST["pwd"];
    $hash_pwd = hash("sha256", "$pwd");
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $conn = mysqli_connect("localhost", "root", "1234", "eatingchicken");

    if (!$conn) {
        header("location: https://eatingchicken.site/login.php?code=2");
    }
    else {
        // THIS IS DAMN IMPORTANT, OTHERWISE YOU'LL GET ERROR
        mysqli_query($conn, "SET NAMES utf8mb4");
        $sql = "INSERT INTO customer VALUES('$id', '$hash_pwd', '$email', '$phone')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("location: https://eatingchicken.site/login.php?code=1");
        }
        else {
            header("location: https://eatingchicken.site/login.php?code=2");
        }
    }

?>