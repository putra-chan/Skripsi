<?php
include "../koneksi.php";

$sql = mysqli_query($connect, "update reserv set status = 'Dibatalkan' where id_reserv = '" . $_REQUEST['id'] . "'");
if ($sql) {
    echo "<script>window.alert('Booking Anda Berhasil DIbatalkan');window.location.href='keranjang.php';</script>";
} else {
    echo "<script>window.alert('Gagal');window.location.href='keranjang.php';</script>";
}
