<?php
    include "./connection.php";

    $bookID = $_GET["id-his"];
    $date = $_GET["his-date"];
    $objQuery = "SELECT * FROM account_$bookID WHERE date = '$date' ORDER BY type";
    $objRes = $mysqli->query($objQuery);
    $history = array();
    while ($row = $objRes->fetch_array(MYSQLI_ASSOC)) {
        $history[] = $row;
    }
    printf(json_encode($history));
    $mysqli->close();
?>