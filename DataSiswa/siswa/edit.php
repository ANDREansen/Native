<?php include_once('../_header.php');

?>

	<div class="box">
		<h1>Siswa</h1>
        <h4>
            <small>Edit Data Siswa</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
        <div class="row">
        	<div class="col-lg-6 col-lg-offset-3">
                <?php 
                    $id = @$_GET['id'];
                    $sql_mapel = mysqli_query($con, "SELECT * FROM tb_siswa WHERE id_sws = '$id'") or die (mysqli_error($con));
                    $data = mysqli_fetch_array($sql_mapel);
                 ?>
        		<form action="proses.php" method="post">
                <div class="form-group">
        				<label for="ns">NIS</label>
                        <input type="hidden" name="id" value="<?=$data['id_sws']?>">
        				<input type="text" name="ns" id="ns" value="<?=$data['nis']?> "class="form-control" required autofocus>
        			</div>
        			<div class="form-group">
        				<label for="nama">Nama Siswa</label>
                        <input type="hidden" name="id" value="<?=$data['id_sws']?>">
        				<input type="text" name="nama" id="nama" value="<?=$data['nama_sws']?> "class="form-control" required autofocus>
        			</div>
        			<div class="form-group">
                        <label for="klm">Jenis Kelamin</label>
                        <div>
                            <label class="radio-inline">
                            <input type="radio" name="klm" id="klm" value ="L"  required >Laki-Laki
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="klm"  value ="P"  required >Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
        				<label for="almt">Alamat</label>
        				<textarea name="almt" id="almt" class="form-control" required><?=$data['alamat']?></textarea>
        			</div>
                    <div class="form-group">
        				<label for="tlp">No Telpon</label>
        				<textarea name="tlp" id="tlp" class="form-control" required><?=$data['no_tlp']?></textarea>
        			</div>
        			<div class="form-group pull-right">
        				<input type="submit" name="edit" value="Simpan" class="btn btn-success">
        			</div>
        		</form>
        		
        	</div>
        	
        </div>
	</div>

	<?php include_once('../_header.php');