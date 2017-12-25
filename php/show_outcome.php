<?php
    include "./connection.php";

    $id = $_GET["id"];
    $day = date("d");
    $month = date("m");
    $year = date("Y");
    $objQuery = "SELECT * FROM account_$id WHERE type = 'Outcome' AND date = '$year-$month-$day';";
    $objRes = $mysqli->query($objQuery);
    $income = array();
    while ($row = $objRes->fetch_array(MYSQLI_ASSOC)) {
        $income[] = $row;
    }
    printf(json_encode($income));
    $mysqli->close();
?>