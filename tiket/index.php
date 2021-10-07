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
                            <div class="input-field">
                                <button id="submit-cari" class="btn waves-effect blue" disabled><i class="ion-search"></i> Cari</button>
                            </div>
                            <span id="error-cari" class="red-text"></span>
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

<script>
    $('#submit-cari').on('click', function() {
        if ($(this).attr('disabled')) {
            $('#error-cari').html("Lengkapi Isi Pencarian Terlebih Dahulu !");
        } else {
            $('#error-cari').html("");
        }
    })

    $('#nama-tempat-awal, #nama-tempat').on('keyup', function() {
        if ($('#nama-tempat-awal').val().length >= 1 && $('#nama-tempat').val().length >= 1) {
            $('#submit-cari').attr('disabled', false);
        } else {
            $('#submit-cari').attr('disabled', true);
        }
    })
</script>

<?php include "footer.php"; ?>