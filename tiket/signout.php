<?php
    session_start();
    session_destroy();
    $uRL = "http://localhost:8080/tiket/";
    echo "<script>window.alert('Anda telah SignOut');window.location = '$uRL' ;</script>";
?>
