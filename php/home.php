<?php
    include "./connection.php";

    session_start();
    $id = $_SESSION["id"];
    
    $objQuery = "SELECT * FROM book WHERE ownerID = $id";
    $objRes = $mysqli->query($objQuery);
    $book = array();
    while ($row = $objRes->fetch_array(MYSQLI_ASSOC)) {
        $book[] = $row;
    }

    printf(json_encode($book));
    $mysqli->close();
?>