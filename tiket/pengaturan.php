<?php include "nav.php"; ?>

<?php include "../koneksi.php"; ?>

<div class="container">
    <div class="row">
        <div class="col s5">
            <div class="card-panel">
                <h3>Data Anda</h3>
                <div class="card green">
                    <?php

                    $sa = mysqli_query($connect, 'select * from customer where  username="' . $_SESSION['user'] . '" ');
                    $da = mysqli_fetch_array($sa);
                    ?>
                    <div class="card-content">
                        <h5>Nama</h5>
                        <p class="white-text">
                            <?= $da['name']; ?>
                        </p>
                        <br />
                        <h5>Alamat</h5>
                        <p class="white-text">
                            <?= $da['address']; ?>
                        </p>
                        <br />
                        <h5>No.HP</h5>
                        <p class="white-text">
                            <?= $da['phone']; ?>
                        </p>
                        <h5>Jenis Kelamin</h5>
                        <p class="white-text">
                            <?= $da['gender']; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s7">
            <div class="card-panel">
                <h4>SIlahkan isi data berikut ini</h4>

                <?php
                include "../koneksi.php";
                $username = mysqli_real_escape_string($connect, $_SESSION["user"]);
                $ss = mysqli_query($connect, "select * from user where username='" . $username . "'");
                // var_dump($ss);
                // die;
                $ds = mysqli_fetch_array($ss);
                ?>
                <form method="post" action="pengaturan_p.php">
                    <input type="hidden" name="id_customer" id="id_cust" required value="<?= $ds['id_user']; ?>">
                    <div class="input-field">
                        <input type="text" name="name" id="name" required value="<?= $ds['fullname']; ?>">
                        <label for="name">Nama Lengkap</label>
                    </div>
                    <div class="input-field">
                        <input type="text" name="address" id="addr" required>
                        <label for="addr">Alamat</label>
                    </div>
                    <div class="input-field">
                        <input type="number" name="phone" id="phone" required>
                        <label for="phone">No HP</label>
                    </div>
                    <select class="browser-default" name="gender" required>
                        <option selected disabled>Jenis Kelamin:</option>
                        <option value="Laki-laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <div class="input-field">
                        <input type="text" name="username" id="user" value="<?= $ds['username']; ?>" required class="btn disabled">
                        <label for="user">Username</label>
                    </div>
                    <br />
                    <?php

                    $cs = mysqli_query($connect, 'select * from customer where username="' . $_SESSION['user'] . '" ');
                    $fu = mysqli_num_rows($cs);
                    if ($fu == 0) {
                    ?>
                        <a href=""><button class="btn waves-effect blue"><i class="ion-android-send"></i></button></a>
                    <?php
                    } else {
                        echo "<p>Tidak perlu input lagi</p>";
                    }
                    ?>

                </form>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>