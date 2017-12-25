<?php
    include "./connection.php";

    session_start();
    $bookID = $_GET["id"];
    $ownerID = $_SESSION["id"];
    $bookname = $_GET["accountbook"];
    $bookcolor = $_GET["bookcolor"];;
    $bookdetail = $_GET["bookdetail"];

    $checkQuery = "SELECT * FROM book WHERE bookname = '$bookname' AND bookID = $bookID";
    $checkRes = $mysqli->query($checkQuery);
    $row = $checkRes->num_rows;

    if ($row <= "1") {
        $objQuery = "UPDATE book SET bookname = '$bookname', color = '$bookcolor', detail = '$bookdetail' WHERE bookID = $bookID;";
        $mysqli->query($objQuery);
        printf($objQuery);
    }
    else {
        printf('repeat');
    }

    $mysqli->close();
?>