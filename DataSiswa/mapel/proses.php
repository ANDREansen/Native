<?php 
    require_once "../_config/config.php";
    require "../_assets/libs/vendor/autoload.php";


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $ket = trim(mysqli_real_escape_string($con, $_POST['ket']));
    mysqli_query($con, "INSERT INTO tb_mapel (id_mapel, nama_mapel, ket_mapel) VALUES ('$uuid','$nama','$ket')") or die (mysqli_error($con));
    echo"<script>window.location='data.php';</script>";
}elseif (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $ket = trim(mysqli_real_escape_string($con, $_POST['ket']));
    mysqli_query($con, "UPDATE tb_mapel SET nama_mapel= '$nama',ket_mapel='$ket' WHERE id_mapel = '$id' ") or die (mysqli_error($con));
    echo"<script>window.location='data.php';</script>";
}


 ?>