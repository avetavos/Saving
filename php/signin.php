<?php
    require "./connection.php";

    $email = $_POST["email"];
    $password = $_POST["password"];

    $objQuery = "SELECT email, password, active, userID, name FROM member WHERE email = '$email' AND password = '$password'";
    $objRes = $mysqli->query($objQuery);
    $row = $objRes->fetch_array(MYSQLI_NUM);

    if ($email === $row[0] && $password === $row[1]) {
        if ($row[2] == "Yes") {
            session_start();
            $_SESSION["id"] = $row[3];
            $_SESSION["username"] = $row[0];
            $_SESSION["name"] =  $row[4];
            $_SESSION["site"] = "saving.com";
            session_write_close();
        }
        else {
            printf("activate");
        }
    }
    else {
        printf("incorrect");
    }

    $mysqli->close();
?>