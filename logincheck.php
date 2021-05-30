<?php
    ob_start();
    session_start();
    setcookie("login", "true", time() + 3600);

    if (isset($_POST["id"])) {
        $conn = mysqli_connect("localhost", "root", "1234", "eatingchicken");
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        $pwd = $_POST["pwd"];
        $hash_pwd = mysqli_real_escape_string($conn, hash("sha256", "$pwd"));

        if (!$conn) {
            
        }
        else {
            // THIS IS DAMN IMPORTANT, OTHERWISE YOU'LL GET ERROR
            mysqli_query($conn, "SET NAMES utf8mb4");
            $sql = "SELECT * FROM customer WHERE customer_id = '$id' AND customer_pwd = '$hash_pwd'";

            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION["id"] = $row["customer_id"];
                header("location: https://eatingchicken.site/web.php?code=1");
            }
            else {
                header("location: https://eatingchicken.site/login.php?code=2");
            }
        }
    }
?>