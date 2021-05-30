<?php
    ob_start();
    session_start();
    setcookie("checkout", "true", time() + 3600);

    $conn = mysqli_connect("localhost", "root", "1234", "eatingchicken");
    $id = mysqli_real_escape_string($conn, $_SESSION["id"]);
    if (isset($id)) {
        if (!$conn) {
            
        }
        else {
            // THIS IS DAMN IMPORTANT, OTHERWISE YOU'LL GET ERROR
            mysqli_query($conn, "SET NAMES utf8mb4");
            
            // POST TO LINE
            $sql = "SELECT customer.customer_id, customer.customer_phone, food.food_name, food.food_price, cart.qty FROM cart 
            INNER JOIN food ON cart.food_id = food.food_id 
            INNER JOIN customer ON cart.customer_id = customer.customer_id 
            WHERE customer.customer_id = '$id'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) >= 1){
                $raw_message = "\n";
                $customer_id = "";
                $customer_phone = "";
                $sum = 0;
                while ($row = mysqli_fetch_array($result)) {
                    $raw_message = $raw_message . "商品: " . $row["food_name"] . " 數量: " . $row["qty"] . "\n";
                    $sum += $row["qty"] * $row["food_price"];
                    $customer_id = $row["customer_id"];
                    $customer_phone = $row["customer_phone"];
                }
                $raw_message = $raw_message . "總計: $sum NTD\n姓名: $customer_id\n電話: $customer_phone";
                echo $raw_message;
                
                $headers = array(
                    'Content-Type: multipart/form-data',
                    'Authorization: Bearer iaJcORiEZZgmdEaPmn0eZSAcLZmdpEHStSaZBNrGg88'
                );
                
                $message = array(
                    'message' => "$raw_message"
                );
                
                $ch = curl_init();
                curl_setopt($ch , CURLOPT_URL , "https://notify-api.line.me/api/notify");
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
                $result = curl_exec($ch);
                curl_close($ch);


                // DELETE CART
                $del_sql = "DELETE FROM cart WHERE customer_id = '$customer_id'";
                $del_result = mysqli_query($conn, $del_sql);
                if ($del_result) {
                    header("location: https://eatingchicken.site/cart.php?code=1");
                }
                else {
                    header("location: https://eatingchicken.site/cart.php?code=2");
                }
            }
            else {
                header("location: https://eatingchicken.site/cart.php?code=3");
            }
            
      

        }
  } 
?>