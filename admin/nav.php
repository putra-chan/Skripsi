<?php include "session.php";?>
<html>

<head>
    <title>PT. BINTANG UTARA PUTRA</title>
    <link rel="icon" href="../image/bayplane.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link rel="stylesheet" href="../css/ionicons.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/materialize.min.js"></script>
</head>

<nav style="background-color: #2C3E50;">
    <div class="nav-wrapper container">
        <a href="index.php" class="brand-logo">PT. BINTANG UTARA PUTRA</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
            <li><a href="index.php">Beranda</a></li>
            <li><a href="user.php">Users</a></li>
            <li><a href="logout.php">Sign Out</a></li>   
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="index.php">Beranda</a></li>
            <li><a href="user.php">Users</a></li>
            <li><a href="logout.php">Sign Out</a></li>
        </ul>
    </div>
</nav>

<main>
<script>
    $(".button-collapse").sideNav();

</script>
