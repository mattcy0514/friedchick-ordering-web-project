<?php
    
    $conn = mysqli_connect("localhost", "root", "1234", "eatingchicken");

    if (!$conn) {
        echo "Bad Connection";
    }
    else {
        // THIS IS DAMN IMPORTANT, OTHERWISE YOU'LL GET ERROR
        mysqli_query($conn, "SET NAMES utf8mb4");
        
        $sql = "SELECT * FROM food";

        $result = mysqli_query($conn, $sql);
        
        while ($row = mysqli_fetch_array($result)) {
            echo $row["food_name"] . $row["food_desc"] . $row["food_price"] . "<br>";
        }
    }
?>