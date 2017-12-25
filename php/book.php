<?php
    include "./connection.php";

    session_start();
    $ownerID = $_SESSION["id"];
    $bookID = $_GET["id"];

    $objName = "SELECT bookname, color, bookID FROM book WHERE bookID = $bookID AND ownerID = $ownerID";
    $resName = $mysqli->query($objName);
    $book = array();
    while ($row = $resName->fetch_array(MYSQLI_ASSOC)) {
        $book[] = $row;
    }
    printf(json_encode($book));
    $mysqli->close();
?>