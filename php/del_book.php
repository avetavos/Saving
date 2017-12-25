<?php
    include "./connection.php";

    session_start();
    $bookID = $_GET["id"];
    $ownerID = $_SESSION["id"];

    $objData = "DELETE FROM book WHERE bookID = $bookID AND ownerID = $ownerID;";
    $objTable = "DROP TABLE account_$bookID";
    $mysqli->query($objData);
    $mysqli->query($objTable);

    $mysqli->close();
?>