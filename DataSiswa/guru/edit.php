<?php include_once('../_header.php');

?>

	<div class="box">
		<h1>Guru</h1>
        <h4>
            <small>Edit Data Guru</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
        <div class="row">
        	<div class="col-lg-6 col-lg-offset-3">
                <?php 
                    $id = @$_GET['id'];
                    $sql_mapel = mysqli_query($con, "SELECT * FROM tb_guru WHERE id_guru = '$id'") or die (mysqli_error($con));
                    $data = mysqli_fetch_array($sql_mapel);
                 ?>
        		<form action="proses.php" method="post">
        			<div class="form-group">
        				<label for="nama">Nama Guru</label>
                        <input type="hidden" name="id" value="<?=$data['id_guru']?>">
        				<input type="text" name="nama" id="nama" value="<?=$data['nama_guru']?> "class="form-control" required autofocus>
        			</div>
        			<div class="form-group">
        				<label for="mapel">Mapel</label>
        				<textarea name="mapel" id="mapel" class="form-control" required><?=$data['mapel']?></textarea>
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