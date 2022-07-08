<?php include_once('../_header.php'); ?>
 
    <div class="box">
        <h1>DATA SEKOLAH</h1>
        <h4>
            <small>Data Sekolah</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
            </div>
        </h4>
        <div style="margin-bottom: 20px;">
            <form class="form-inline" action="" method="post">
                <div class="form-group">
                    <input type="text" name="pencarian" class="form-control" placeholder="Pencarian">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Cari</button>
                </div>
            </form>
        </div>
        <div class="table-responsive">            
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Siswa</th>
                        <th>Nama Mapel</th>
                        <th>Nama Guru</th>
                        <th>Nama Kelas</th>
                        <th>Tanggal Jadwal</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $batas = 3;
                $hal = @$_GET['hal'];
                if(empty($hal)) {
                    $posisi = 0;
                    $hal = 1;
                } else {
                    $posisi = ($hal - 1) * $batas;
                }
                $no = 1;
                $query="SELECT * FROM tb_datasekolah 
                        INNER JOIN tb_siswa ON tb_datasekolah.nama_sws = tb_siswa.nama_sws
                        INNER JOIN tb_mapel ON tb_datasekolah.nama_mapel = tb_siswa.nama_mapel
                        INNER JOIN tb_guru ON tb_datasekolah.nama_guru = tb_guru.nama_guru
                        INNER JOIN tb_ruangkls ON tb_datasekolah.nama_kelas = tb_ruangkls.nama_kelas
                ";
                if(@$_SERVER['REQUEST_METHOD'] == 'POST') {
                    $pencarian = trim(mysqli_real_escape_string($con, $_POST['pencarian']));
                    if($pencarian != '') {
                        $sql = "SELECT * FROM tb_datasekolah WHERE nama_sws LIKE '%$pencarian%'";
                        $query = $sql;
                        $queryJml = $sql;
                    } else {
                        $query = "SELECT * FROM tb_datasekolah LIMIT $posisi, $batas";
                        $queryJml = "SELECT * FROM tb_datasekolah";
                        $no = $posisi + 1;
                    }
                } else {
                    $query = "SELECT * FROM tb_datasekolah LIMIT $posisi, $batas";
                    $queryJml = "SELECT * FROM tb_datasekolah";
                    $no = $posisi + 1;
                }
                $sql_cb = mysqli_query($con, $query) or die (mysqli_error($con));
                if(mysqli_num_rows($sql_cb) > 0) {
                    while($data = mysqli_fetch_array($sql_cb)) { ?>
                        <tr>
                            <td><?=$no++; ?>.</td>
                            <td><?=$data['nama_sws']; ?></td>
                            <td><?=$data['nama_mapel']; ?></td>
                            <td><?=$data['nama_guru']; ?></td>
                            <td><?=$data['nama_kelas']; ?></td>
                            <td><?=$data['tgl_jadwal']; ?></td>

                            <td class="text-center">
                                <a href="del.php?id=<?=$data['id_sekolah'];?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    echo '<tr><td colspan="7" align="center">Data tidak ditemukan</td></tr>';
                } ?>
                </tbody>
            </table>
        </div>
 
        <?php if(@$_POST['pencarian'] == '') { ?>
            <div style="float:left;">
                <?php $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
                echo "Jumlah Data : <b>".$jml."</b>"; ?>
            </div>
            <div style="float:right;">
                <ul class="pagination pagination-sm" style="margin:0;">
                    <?php $jml_hal = ceil($jml / $batas);
                    for($i=1; $i<=$jml_hal; $i++) {
                        if($i != $hal) {
                            echo '<li><a href="?hal='.$i.'">'.$i.'</a></li>';
                        } else {
                            echo '<li class="active"><a>'.$i.'</a></li>';
                        }
                    } ?>
                </ul>
            </div>
        <?php } else { ?>
            <div style="float:left;">
                <?php
                $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
                echo "Data Hasil Pencarian : <b>".$jml."</b>";
                ?>
            </div>
        <?php } ?>
    </div>
 
<?php include_once('../_footer.php'); ?>