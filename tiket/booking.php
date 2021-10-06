<?php include_once "nav.php"; ?>
<?php include "../koneksi.php"; ?>
<div class="container pageBooking">
    <div class="rowp">
        <div class="col s12">
            <div class="card-panel">
                <h3>Customer</h3>
                <form method="post" action="pesan_p.php">
                    <div class="input-field">
                        <?php
                        $rang = range(1, 9);
                        shuffle($rang);
                        $c = implode($rang);
                        $res_code = $c;
                        ?>
                        <input type="text" name="res_code" id="name" value="<?= $res_code; ?>">
                        <label for="name">Kode Booking</label>
                    </div>
                    <?php
                    $id_rute = $_GET['id_rute'];
                    $sqr = mysqli_query($connect, 'select * from rute where id_rute="' . $id_rute . '" ');
                    $qur = mysqli_fetch_array($sqr);
                    ?>
                    <div class="input-field">
                        <p class="grey-text">Booking Pada</p>
                        <input type="date" name="res_a">
                    </div>
                    <div class="input-field">
                        <p class="grey-text">Tanggal Booking</p>
                        <input type="date" name="res_d" id="tb">
                    </div>
                    <div class="input-field">
                        <?php
                        $sqt = mysqli_query($connect, 'select * from trans where id_trans="' . $qur['id_trans'] . '" ');
                        $qut = mysqli_fetch_array($sqt);
                        ?>
                        <input type="text" name="seat" id="seat" value="">
                        <label for="seat">Kode Kursi</label>
                        <span class="red-text" id="seat_error"></span>
                    </div>
                    <!-- <div class="input-field">
                        <p class="grey-text">Berangkat Tanggal</p>
                        <input type="date" name="depart" value="<?php //echo $qur['depart']; 
                                                                ?>">
                    </div> -->
                    <div class="input-field">
                        <?php
                        $qur['price'];
                        $mataUang = $qur['price'];
                        $uangRupiah = "Rp. " . number_format($mataUang, 0, ',', '.');

                        ?>
                        <input type="text" name="price" h="h" value="<?php echo $uangRupiah; ?>">
                        <label for="h">Harga Tiket</label>
                    </div>
                    <div class="input-field">
                        <?php
                        $squ = mysqli_query($connect, 'select * from user where username="' . $_SESSION['user'] . '" ');
                        $quu = mysqli_fetch_array($squ);
                        ?>
                        <input type="text" name="id_user" id="iu" value="<?= $quu['id_user']; ?>" hidden>
                        <label for="iu" hidden>ID User</label>
                    </div>
                    <div class="input-field">
                        <?php
                        $cs = mysqli_query($connect, 'select * from customer where username="' . $_SESSION['user'] . '" ');
                        $cq = mysqli_fetch_array($cs);
                        ?>
                        <input type="text" name="id_customer" id="ic" value="<?= $cq['id_customer']; ?>" required hidden>
                        <label for="ic" hidden>ID Customer</label>
                    </div>
                    <div class="input-field">
                        <input type="text" name="id_rute" id="ir" value="<?= $qur['id_rute']; ?>" hidden>
                        <label for="ir" hidden>ID Rute</label>

                    </div>
                    <div class="input-field">
                        <input type="text" name="status" id="status" value="Proses" class="disabled" disabled>
                        <label for="status">Status</label>
                    </div>
                    <button class="btn waves-effect"><i class="ion-load-c"></i> Booking</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $("#seat").on("keyup", function() {
        $('#seat_error').html("");
        $.ajax({
            url: "check_seat.php",
            dataType: 'json',
            method: 'POST',
            data: {
                rute: $('#ir').val(),
                seat: $(this).val()
            },
            success: function(result) {
                // var data = JSON.parse(result);
                if (result) {
                    $('#seat_error').html("Maaf, Seat Nomor " + $('#seat').val() + " Sudah Terisi. Silahkan Pilih Seat Lain");
                    // $('#seat').val("");
                } else {
                    // $('#seat_error').html("");
                }
            },
            error: function() {
                console.log('An error occured!');
                alert('Error in ajax request');
            }
        });

    });
</script>

<?php include "footer.php"; ?>