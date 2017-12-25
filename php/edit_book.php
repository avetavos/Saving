<?php
    include "./connection.php";

    session_start();
    $bookID = $_GET["id"];
    $ownerID = $_SESSION["id"];

    $objQuery = "SELECT * FROM book WHERE bookID = $bookID AND ownerID = $ownerID";
    $objRes = $mysqli->query($objQuery);
    $book = array();
    while ($row = $objRes->fetch_array(MYSQLI_ASSOC)) {
        $book[] = $row;
    }

    printf(json_encode($book));
    $mysqli->close();
?>