<?php
    ob_start();
    session_start();
    setcookie("deleting", "true", time() + 3600);
    
    $conn = mysqli_connect("localhost", "root", "1234", "eatingchicken");
    $food_id = mysqli_real_escape_string($conn, $_GET["food_id"]);
    $customer_id = mysqli_real_escape_string($conn, $_SESSION["id"]);

    if (isset($customer_id) && isset($food_id)) {
        if (!$conn) {
            echo "FAIL";
        }
        else {
            // THIS IS DAMN IMPORTANT, OTHERWISE YOU'LL GET ERROR
            mysqli_query($conn, "SET NAMES utf8mb4");
            
            $query_sql = "DELETE FROM cart WHERE customer_id = '$customer_id' AND food_id = $food_id";
            $query_result = mysqli_query($conn, $query_sql);

            if ($query_result) {
                header("location: https://eatingchicken.site/cart.php?code=1");
            }
            else {
                header("location: https://eatingchicken.site/cart.php?code=2");
            }

        }
    }
?>