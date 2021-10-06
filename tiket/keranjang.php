<?php include "nav.php"; ?>
<?php
include "../koneksi.php";
$s = mysqli_query($connect, 'select * from user where username="' . $_SESSION['user'] . '" ');
$q = mysqli_fetch_array($s);
$id_user = $q['id_user'];
?>
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card-panel pageKeranjang">
                <div class="center">
                    <h1><i class="ion-android-cart"></i> Keranjang Anda</h1>
                    <p>Mohon tunggu Notifikasi dari Admin</p>
                    <b>Nb:</b>
                    <i>sebelum c etak tiket, anda harus mengisi data diri anda.</i>
                    <a href="pengaturan.php">
                        <button class="btn waves-effect grey">
                            <i class="ion-ios-settings"></i>
                        </button>
                    </a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Code Booking</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1; ?>
                        <tr>

                            <?php
                            $sql = mysqli_query($connect, 'select * from reserv where id_user="' . $id_user . '" ');
                            while ($query = mysqli_fetch_array($sql)) {
                            ?>
                                <td><?php echo $i++; ?></td>
                                <td><?= $query['reserv_code']; ?></td>
                                <td>
                                    <?php
                                    if ($query['status'] == 'Proses') {
                                        echo "Proses";
                                    } else if ($query['status'] == 'Dibatalkan') {
                                        echo "Dibatalkan";
                                    } else {
                                    ?>
                                        <a href="cetak.php?id_reserv=<?= $query['id_reserv']; ?>" target="_blank">
                                            <button class="btn waves-effect blue">
                                                <i class="ion-android-print"></i>
                                            </button>
                                        </a>
                                    <?php
                                    } ?>
                                </td>
                                <?php if ($query['status'] == 'Proses') : ?>
                                    <td>
                                        <a class="waves-effect waves-light btn modal-trigger" href="#uploadFileModal" data-val=<?= $query['id_reserv'] ?>>
                                            <i class="ion-android-upload"></i> Upload Bukti Pembayaran
                                        </a>
                                    </td>
                                    <td>
                                        <a href="batal-pesanan.php?id=<?= $query['id_reserv']; ?>">
                                            <button class="btn waves-effect red">
                                                <i class="ion-android-cancel"></i> Batal Booking
                                            </button>
                                        </a>
                                    </td>
                                <?php endif ?>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- modal -->
<div class="modal" id="uploadFileModal">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Masukkan File</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="form-inline upload" method="post" action="" onsubmit="return false;">
                <div class="input-group">
                    <label class="input-group-btn">
                        <span class="btn btn-danger btn-lg">
                            Browse&hellip; <input type="file" id="media" name="media" style="display: none;" required>
                        </span>
                    </label>
                    <input type="text" class="form-control input-lg" size="40" readonly required>
                </div>
                <div class="input-group">
                    <input type="submit" class="btn btn-lg btn-primary" value="Start upload">
                </div>
            </form>
            <br>
            <div class="progress" style="display:none">
                <div id="progressBar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    <span class="sr-only">0%</span>
                </div>
            </div>
            <div class="msg alert alert-info text-left" style="display:none"></div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.modal').modal();
    });

    $('.modal-trigger').on('click', function() {
        var content = '<input type="hidden" name="id_reserv" value="' + $(this).attr("data-val") + '">';
        $('.modal').append(content);
    })

    $(document).ready(function() {
        $('.upload').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData();
            formData.append("media", document.getElementById('media').files[0]);
            formData.append("id", $('[name="id_reserv"]').val())
            $('.msg').hide();
            $('.progress').show();

            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener('progress', function(e) {
                        if (e.lengthComputable) {
                            console.log('Bytes Loaded : ' + e.loaded);
                            console.log('Total Size : ' + e.total);
                            console.log('Persen : ' + (e.loaded / e.total));

                            var percent = Math.round((e.loaded / e.total) * 100);

                            $('#progressBar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
                        }
                    });
                    return xhr;
                },

                type: 'POST',
                url: '/upload.php',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#media').val('');
                    $('.progress').hide();
                    if (response == "") {
                        alert('File gagal di upload');
                    } else {
                        alert('File Berhasil di upload');
                        $('.modal').modal('close');
                        location.reload();
                    }
                }
            });
        });
    });
</script>
<!-- AdminLTE for demo purposes -->

<script>
    $(function() {
        $(document).on('change', ':file', function() {
            var input = $(this),
                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });

        $(document).ready(function() {
            $(':file').on('fileselect', function(event, numFiles, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = numFiles > 1 ? numFiles + ' files selected' : label;

                if (input.length) {
                    input.val(log);
                } else {
                    if (log) alert(log);
                }

            });
        });

    });
</script>
<?php include "footer.php"; ?>