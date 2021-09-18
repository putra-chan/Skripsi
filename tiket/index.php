<?php include "nav.php"; ?>
<div class="background">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card-panel teal white-text">
                    <?php include "../koneksi.php";
                    $ss = mysqli_query($connect, 'select * from user where username="' . $_SESSION['user'] . '" ');
                    $ds = mysqli_fetch_array($ss);
                    ?>
                    <h5>Selamat datang,
                        <i><?= $ds['username']; ?>.</i>
                    </h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="card-panel default pembungkus">
                    <div class="banner center">
                        <h3>Selamat Datang di <b>PT. Bintang Utara Putra</b></h3>
                        <h5>Melayani Perjalanan Antar Kota dan Antar Provinsi</h5>
                    </div>
                    <form method="post" action="cari.php">
                        <div class="col s3">
                            <div class="input-field">
                                <input type="text" name="cari" id="nama-tempat-awal">
                                <label for="nama-tempat-awal">Asal</label>
                            </div>
                        </div>
                        <div class="col s3">
                            <div class="input-field">
                                <input type="text" name="cari" id="nama-tempat">
                                <label for="nama-tempat">Tujuan</label>
                            </div>
                        </div>
                        <div class="col s3">
                            <label class="grey-text" id="tanggal-keberangkatan">Tanggal Berangkat</label>
                            <input type="date" name="tglBerangkat" id="tanggal-keberangkatan">
                        </div>
                        <div class="col s3">
                            <div class="input-field">
                                <button class="btn waves-effect blue"><i class="ion-search"></i> Cari</button>
                            </div>
                        </div>
                    </form>
                    <div class="col s12 note">
                        <b>Nb: </b>
                        <i>Sebelum mencari tiket, Pastikan anda sudah mengisi data diri anda</i>
                        <a href="pengaturan.php">
                            <button class="btn waves-effect green">
                                <i class="ion-ios-settings"></i>
                            </button>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?php include "footer.php"; ?>