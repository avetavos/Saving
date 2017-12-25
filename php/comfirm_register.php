<?php
    require "./connection.php";

    $SID = $_POST["sid"];
    $userID = $_POST["uid"];

    $strQuery = "SELECT * FROM member WHERE SID = '$SID' AND userID = '$userID'";
    $objQuery = $mysqli->query($strQuery);

    $strUpdate = "UPDATE member SET Active = 'Yes'  WHERE SID = '$SID' AND userID = '$userID'";
    $objUpdate = $mysqli->query($strUpdate);

    $mysqli->close();
?>