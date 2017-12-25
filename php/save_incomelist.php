<?php
    include "./connection.php";

    $allData = json_encode($_GET["incomeData"]);
    $data = array();
    $data = json_decode($allData, true);
    $bookID = $data[0]["value"];
    $date = $data[1]["value"];
    $i = 2;
    $row = 0;
    while ($i < sizeof($data)) {
        $list = $data[$i]["value"];
        $i++;
        $value = $data[$i]["value"];
        $objQuery = "INSERT INTO account_$bookID (type, detail, value, date) VALUES ('Income', '$list', '$value', '$date')";
        $mysqli->query($objQuery);
        $i++;
        $row++;
    }
    $mysqli->close();
?>