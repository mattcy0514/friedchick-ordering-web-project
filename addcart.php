<?php
    ob_start();
    session_start();
    setcookie("carting", "true", time() + 3600);
    
    $conn = mysqli_connect("localhost", "root", "1234", "eatingchicken");
    $food_id = mysqli_real_escape_string($conn, $_GET["food_id"]);
    $qty = mysqli_real_escape_string($conn, $_GET["qty"]);
    $customer_id = mysqli_real_escape_string($conn, $_SESSION["id"]);
    
    $time = date("Y-m-d h:i:s");

    if (isset($customer_id) && isset($food_id)) {
        if (!$conn) {
            echo "FAIL";
        }
        else {
            // THIS IS DAMN IMPORTANT, OTHERWISE YOU'LL GET ERROR
            mysqli_query($conn, "SET NAMES utf8mb4");
            
            $query_sql = "SELECT * FROM cart WHERE food_id = $food_id AND customer_id = '$customer_id'";
            $query_result = mysqli_query($conn, $query_sql);

            if (mysqli_num_rows($query_result) < 1) {
                $insert_sql = "INSERT INTO cart VALUES($food_id, '$customer_id', $qty, '$time')";
                $insert_result = mysqli_query($conn, $insert_sql);
                header("location: https://eatingchicken.site/web.php?code=1#menu");
            }
            else {
                header("location: https://eatingchicken.site/web.php?code=2#menu");
            }

        }
    }
?>