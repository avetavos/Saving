<?php
    session_start();
    if(isset($_SESSION["name"])) {
        $user = $_SESSION["name"];
        printf($user);
    }
    else {
        printf("empty");
    }
?>