<?php include_once('../_header.php');

?>

	<div class="box">
		<h1>Mata Pelajaran</h1>
        <h4>
            <small>Edit Data Mapel</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
        <div class="row">
        	<div class="col-lg-6 col-lg-offset-3">
                <?php 
                    $id = @$_GET['id'];
                    $sql_mapel = mysqli_query($con, "SELECT * FROM tb_mapel WHERE id_mapel = '$id'") or die (mysqli_error($con));
                    $data = mysqli_fetch_array($sql_mapel);
                 ?>
        		<form action="proses.php" method="post">
        			<div class="form-group">
        				<label for="nama">Nama Mapel</label>
                        <input type="hidden" name="id" value="<?=$data['id_mapel']?>">
        				<input type="text" name="nama" id="nama" value="<?=$data['nama_mapel']?> "class="form-control" required autofocus>
        			</div>
        			<div class="form-group">
        				<label for="ket">Keterangan</label>
        				<textarea name="ket" id="ket" class="form-control" required><?=$data['ket_mapel']?></textarea>
        			</div>
        			<div class="form-group pull-right">
        				<input type="submit" name="edit" value="Simpan" class="btn btn-success">
        			</div>
        		</form>
        		
        	</div>
        	
        </div>
	</div>

	<?php include_once('../_header.php');