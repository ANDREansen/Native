<?php 
    require_once "../_config/config.php";
    require "../_assets/libs/vendor/autoload.php";


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $ns = trim(mysqli_real_escape_string($con, $_POST['ns']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $klm = trim(mysqli_real_escape_string($con, $_POST['klm']));
    $almt = trim(mysqli_real_escape_string($con, $_POST['almt']));
    $tlp = trim(mysqli_real_escape_string($con, $_POST['tlp']));
    mysqli_query($con, "INSERT INTO tb_siswa (id_sws, nis, nama_sws, jenis_kelamin, alamat, no_tlp) VALUES ('$uuid','$ns','$nama','$klm', '$almt', '$tlp')") or die (mysqli_error($con));
    echo"<script>window.location='data.php';</script>";
}elseif (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $ns = trim(mysqli_real_escape_string($con, $_POST['ns']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $klm = trim(mysqli_real_escape_string($con, $_POST['klm']));
    $almt = trim(mysqli_real_escape_string($con, $_POST['almt']));
    $tlp = trim(mysqli_real_escape_string($con, $_POST['tlp']));
    mysqli_query($con, "UPDATE tb_siswa SET nis = '$ns', nama_sws= '$nama',jenis_kelamin ='$klm', alamat='$almt', no_tlp='$tlp' WHERE id_sws = '$id' ") or die (mysqli_error($con));
    echo"<script>window.location='data.php';</script>";
}


 ?>