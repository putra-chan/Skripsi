<?php

include "../koneksi.php";

$dataSeat = mysqli_query($connect, "select * from reserv where id_rute=" . $_POST['rute'] . " and seat = " . $_POST['seat']);
$seat = mysqli_fetch_array($dataSeat);
$dataRute = mysqli_query($connect, "select * from rute where id_rute=" . $_POST['rute'] . " limit 1 ");
$rute = mysqli_fetch_array($dataRute);
$dataTrans = mysqli_query($connect, "select * from trans where id_trans=" . $rute['id_trans'] . " limit 1 ");
$trans = mysqli_fetch_array($dataTrans);
// var_dump($totalSeat['total_seat']);
// die;
$result = mysqli_num_rows($dataSeat) > 0 || $trans['seat'] < $_POST['seat'] ? true : false;

$isLimit = $trans['seat'] < $_POST['seat'] ? true : false;
$isFilled = mysqli_num_rows($dataSeat) > 0 ? true : false;

$response = ['status' => $result, 'limit' => $isLimit, 'filled' => $isFilled];

echo json_encode($response);
