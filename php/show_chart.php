<?php 
    include "./connection.php";

    $bookID = $_GET["id"];
    $dateStart1 = date("Y-m-01",strtotime("-3 Months"));
    $dateStop1 = date("Y-m-t",strtotime("-3 Months"));
    $dateStart2 = date("Y-m-01",strtotime("-2 Months"));
    $dateStop2 = date("Y-m-t",strtotime("-2 Months"));
    $dateStart3 = date("Y-m-01",strtotime("-1 Months"));
    $dateStop3 = date("Y-m-t",strtotime("-1 Months"));
    $dateStart4 = date("Y-m-01");
    $dateStop4 = date("Y-m-d");

    $objQuery1_1 = "SELECT SUM(value) as 'income' FROM account_$bookID WHERE type = 'Income' AND date BETWEEN '$dateStart1' AND '$dateStop1'";
    $objRes1_1 = $mysqli->query($objQuery1_1);
    $objQuery1_2 = "SELECT SUM(value) as 'outcome' FROM account_$bookID WHERE type = 'Outcome' AND date BETWEEN '$dateStart1' AND '$dateStop1'";
    $objRes1_2 = $mysqli->query($objQuery1_2);

    $objQuery2_1 = "SELECT SUM(value) as 'income' FROM account_$bookID WHERE type = 'Income' AND date BETWEEN '$dateStart2' AND '$dateStop2'";
    $objRes2_1 = $mysqli->query($objQuery2_1);
    $objQuery2_2 = "SELECT SUM(value) as 'outcome' FROM account_$bookID WHERE type = 'Outcome' AND date BETWEEN '$dateStart2' AND '$dateStop2'";
    $objRes2_2 = $mysqli->query($objQuery2_2);

    $objQuery3_1 = "SELECT SUM(value) as 'income' FROM account_$bookID WHERE type = 'Income' AND date BETWEEN '$dateStart3' AND '$dateStop3'";
    $objRes3_1 = $mysqli->query($objQuery3_1);
    $objQuery3_2 = "SELECT SUM(value) as 'outcome' FROM account_$bookID WHERE type = 'Outcome' AND date BETWEEN '$dateStart3' AND '$dateStop3'";
    $objRes3_2 = $mysqli->query($objQuery3_2);

    $objQuery4_1 = "SELECT SUM(value) as 'income' FROM account_$bookID WHERE type = 'Income' AND date BETWEEN '$dateStart4' AND '$dateStop4'";
    $objRes4_1 = $mysqli->query($objQuery4_1);
    $objQuery4_2 = "SELECT SUM(value) as 'outcome' FROM account_$bookID WHERE type = 'Outcome' AND date BETWEEN '$dateStart4' AND '$dateStop4'";
    $objRes4_2 = $mysqli->query($objQuery4_2);

    $chart = array();
    while ($row = $objRes1_1->fetch_array(MYSQLI_ASSOC)) {
        $chart[] = $row;
    }
    while ($row = $objRes1_2->fetch_array(MYSQLI_ASSOC)) {
        $chart[] = $row;
    }
    while ($row = $objRes2_1->fetch_array(MYSQLI_ASSOC)) {
        $chart[] = $row;
    }
    while ($row = $objRes2_2->fetch_array(MYSQLI_ASSOC)) {
        $chart[] = $row;
    }
    while ($row = $objRes3_1->fetch_array(MYSQLI_ASSOC)) {
        $chart[] = $row;
    }
    while ($row = $objRes3_2->fetch_array(MYSQLI_ASSOC)) {
        $chart[] = $row;
    }
    while ($row = $objRes4_1->fetch_array(MYSQLI_ASSOC)) {
        $chart[] = $row;
    }
    while ($row = $objRes4_2->fetch_array(MYSQLI_ASSOC)) {
        $chart[] = $row;
    }
    printf(json_encode($chart));
    $mysqli->close();
?>