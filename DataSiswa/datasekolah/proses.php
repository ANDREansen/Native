<?php 
    require_once "../_config/config.php";
    require "../_assets/libs/vendor/autoload.php";


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $siswa = trim(mysqli_real_escape_string($con, $_POST['siswa']));
    $mpl = trim(mysqli_real_escape_string($con, $_POST['mpl']));
    $guru = trim(mysqli_real_escape_string($con, $_POST['guru']));
    $kls = trim(mysqli_real_escape_string($con, $_POST['kls']));
    $tgl = trim(mysqli_real_escape_string($con, $_POST['tgl']));

    mysqli_query($con,"INSERT INTO tb_datasekolah (id_sekolah,nama_sws,nama_mapel,nama_guru,nama_kelas,tgl_jadwal) VALUES ('$uuid','$siswa','$mpl','$guru','$kls','$tgl')" )  or die (mysqli_error($con));
    echo"<script>window.location='data.php';</script>";
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
   $siswa = trim(mysqli_real_escape_string($con, $_POST['siswa']));
    $mpl = trim(mysqli_real_escape_string($con, $_POST['mpl']));
    $guru = trim(mysqli_real_escape_string($con, $_POST['guru']));
    $kls = trim(mysqli_real_escape_string($con, $_POST['kls']));
    $tgl = trim(mysqli_real_escape_string($con, $_POST['tgl']));

    mysqli_query($con, "UPDATE tb_datasekolah SET nama_sws= '$siswa',nama_mapel ='$mpl', nama_guru='$guru', nama_kelas='$kls' WHERE id_sekolah = '$id' ") or die (mysqli_error($con));
    echo"<script>window.location='data.php';</script>";
}
?>