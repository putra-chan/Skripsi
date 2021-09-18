<html>

<head>
    <title>PT. Bintang Utara Putra</title>
    <link rel="icon" href="../image/bayplane.png">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link rel="stylesheet" href="../css/ionicons.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/materialize.min.js"></script>
</head>

<body>

<?php include "session.php";?>
<?php
    include "koneksi.php";
    $nav    = mysqli_query($conn, 'select * from user where username="'.$_SESSION['user'].'" ');
    $navb   = mysqli_fetch_array($nav);
?>
<nav style="background-color: #2C3E50;">
    <div class="nav-wrapper">
    <a href="index.php" class="brand-logo">PT. BINTANG UTARA PUTRA</a>
    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
        <li><a href="keranjang.php">Keranjang</a></li>
        <li><a href="pengaturan.php">Pengaturan</a></li>
        <li><a href="signout.php">Sign Out</a></li>
    </ul>
    <ul class="side-nav" id="mobile-demo">
    <li><a href="keranjang.php">Keranjang</a></li>
        <li><a href="pengaturan.php">Pengaturan</a></li>
        <li><a href="signout.php">Sign Out</a></li>
    </ul>
    </div>
</nav>
<script>
    $(".button-collapse").sideNav();

</script>
<main>
