<?php
include "koneksi.php";
$folder = $_SERVER['DOCUMENT_ROOT'] . "/files/bukti_pembayaran/";

if (!empty($_FILES["media"])) {
  $media  = $_FILES["media"];
  $ext  = pathinfo($_FILES["media"]["name"], PATHINFO_EXTENSION);
  $size  = $_FILES["media"]["size"];
  $tgl  = date("Y-m-d");

  if ($media["error"] !== UPLOAD_ERR_OK) {
    echo '<div class="alert alert-warning">Gagal upload file.</div>';
    exit;
  }

  // filename yang aman
  $name = preg_replace("/[^A-Z0-9._-]/i", "_", $media["name"]);

  // mencegah overwrite filename
  $i = 0;
  $parts = pathinfo($name);
  while (file_exists($folder . $name)) {
    $i++;
    $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
  }

  $success = move_uploaded_file($media["tmp_name"], $folder . $name);
  if ($success) {
    $updateFile = mysqli_query($connect, "update reserv set proof_payment = '" . $name . "' where id_reserv = '" . $_REQUEST['id'] . "'");
    echo "sukses";
    exit;
  }
  // chmod(UPLOAD_DIR . $name, 0644);
}
