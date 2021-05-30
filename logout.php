<?php
    ob_start();
    session_start();
    setcookie("logout", "true", time() + 3600);
    session_destroy();
    header("location: https://eatingchicken.site/web.php?code=1");
    
?>