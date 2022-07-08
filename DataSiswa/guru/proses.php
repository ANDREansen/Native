<?php 
    require_once "../_config/config.php";
    require "../_assets/libs/vendor/autoload.php";


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $mapel = trim(mysqli_real_escape_string($con, $_POST['mapel']));
    $almt = trim(mysqli_real_escape_string($con, $_POST['almt']));
    $tlp = trim(mysqli_real_escape_string($con, $_POST['tlp']));
    mysqli_query($con, "INSERT INTO tb_guru (id_guru, nama_guru, mapel, alamat, no_tlp) VALUES ('$uuid','$nama','$mapel', '$almt', '$tlp')") or die (mysqli_error($con));
    echo"<script>window.location='data.php';</script>";
}elseif (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $mapel = trim(mysqli_real_escape_string($con, $_POST['mapel']));
    $almt = trim(mysqli_real_escape_string($con, $_POST['almt']));
    $tlp = trim(mysqli_real_escape_string($con, $_POST['tlp']));
    mysqli_query($con, "UPDATE tb_guru SET nama_guru= '$nama',mapel ='$mapel', alamat='$almt', no_tlp='$tlp' WHERE id_guru = '$id' ") or die (mysqli_error($con));
    echo"<script>window.location='data.php';</script>";
}


 ?>