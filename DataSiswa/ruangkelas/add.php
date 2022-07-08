<?php include_once('../_header.php');

?>

	<div class="box">
		<h1>Ruang Kelas</h1>
        <h4>
            <small>Tambah Ruang Kelas</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
        <div class="row">
        	<div class="col-lg-8 col-lg-offset-3">
        		<form action="proses.php" method="post">
        			<div class="form-group">
        				<label for="nama">Nama Kelas</label>
        				<input type="text" name="nama" id="nama"class="form-control" required autofocus>
        			</div>
        			<div class="form-group">
        				<label for="ket">Kelas</label>
        				<textarea name="ket" id="ket" class="form-control" required></textarea>
        			</div>
        			<div class="form-group pull-right">
        				<input type="submit" name="add" value="Simpan" class="btn btn-success">
        			</div>
        		</form>
        		
        	</div>
        	
        </div>
	</div>

	<?php include_once('../_header.php');