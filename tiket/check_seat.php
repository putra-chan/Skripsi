<?php

include "../koneksi.php";

$dataSeat = mysqli_query($connect, "select seat from reserv where id_rute=" . $_POST['rute'] . " and seat = " . $_POST['seat']);
$seat = mysqli_fetch_array($dataSeat);
$result = mysqli_num_rows($dataSeat) > 0 ? true : false;

echo $result ? "true" : "false";
