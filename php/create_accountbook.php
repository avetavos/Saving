<?php
    include "./connection.php";

    session_start();
    $id = $_SESSION["id"];
    $bookname = $_GET["accountbook"];
    $bookcolor = $_GET["bookcolor"];;
    $bookdetail = $_GET["bookdetail"];

    $checkQuery = "SELECT * FROM book WHERE bookname = '$bookname' AND ownerID = $id";
    $checkRes = $mysqli->query($checkQuery);
    $row = $checkRes->num_rows;

    if ($row == "0") {
        $objQuery = "INSERT INTO book(ownerID, bookname, color, detail) VALUES ($id, '$bookname', '$bookcolor', '$bookdetail');";
        $mysqli->query($objQuery);
        $bookID = $mysqli->insert_id;
        $objTable = "CREATE TABLE `saving`.`account_$bookID` ( `actionID` INT NOT NULL AUTO_INCREMENT , `type` ENUM('Income','Outcome') NOT NULL , `detail` VARCHAR(100) NOT NULL , `value` BIGINT(20) NOT NULL , `date` DATE NOT NULL , PRIMARY KEY (`actionID`)) ENGINE = InnoDB;";
        $mysqli->query($objTable);
        printf('Success');
    }
    else {
        printf('repeat');
    }

    $mysqli->close();
?>