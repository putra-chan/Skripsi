<?php include "nav.php"; ?>
<?php
include "koneksi.php";
$s = mysqli_query($conn, 'select * from user where username="'.$_SESSION['user'].'" ');
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
                        <i>sebelum c    etak tiket, anda harus mengisi data diri anda.</i>
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
                                
                                <?php  include "koneksi.php";
                                    $sql = mysqli_query($conn, 'select * from reserv where id_user="'.$id_user.'" ');
                                    while($query = mysqli_fetch_array($sql)) {
                                ?>
                                <td><?php echo $i++; ?></td>
                                <td><?=$query['reserv_code'];?></td>
                                <td>
                                <?php
                                    if($query['status'] == 'Proses') {
                                        echo "Proses";
                                    } else {
                                    ?>
                                    <a href="cetak.php?id_reserv=<?=$query['id_reserv'];?>" target="_blank">
                                        <button class="btn waves-effect blue">
                                            <i class="ion-android-print"></i>
                                        </button>
                                    </a>
                                    <?php
                                }?>
                            </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
<?php include "footer.php";?>
