<?php include_once('../_header.php');

?>

	<div class="box">
		<h1>GURU</h1>
        <h4>
            <small>Tambah Data Guru</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
        <div class="row">
        	<div class="col-lg-8 col-lg-offset-3">
        		<form action="proses.php" method="post">
        			<div class="form-group">
        				<label for="nama">Nama Guru</label>
        				<input type="text" name="nama" id="nama"class="form-control" required autofocus>
        			</div>
                    <div class="form-group">
        				<label for="mapel">Mapel</label>
        				<textarea name="mapel" id="mapel" class="form-control" required></textarea>
        			</div>
                    <div class="form-group">
        				<label for="almt">Alamat</label>
        				<textarea name="almt" id="almt" class="form-control" required></textarea>
        			</div>
                    <div class="form-group">
        				<label for="tlp">No Telpon</label>
        				<textarea name="tlp" id="tlp" class="form-control" required></textarea>
        			</div>
        			<div class="form-group pull-right">
        				<input type="submit" name="add" value="Simpan" class="btn btn-success">
        			</div>
        		</form>
        		
        	</div>
        	
        </div>
	</div>

	<?php include_once('../_header.php');