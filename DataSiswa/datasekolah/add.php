<?php include_once('../_header.php');

?>

	<div class="box">
		<h1>DATA SEKOLAH</h1>
        <h4>
            <small>Tambah Data Sekolah</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
        <div class="row">
        	<div class="col-lg-8 col-lg-offset-3">
        		<form action="proses.php" method="post">
        			<div class="form-group">
        				<label for="siswa">Nama Siswa</label>
        				<select name="siswa" id="siswa" class="form-control" required autofocus>
                              <option value="">- Pilih -</option>     
                              <?php 
                                $sql_siswa = mysqli_query($con, "SELECT * FROM tb_siswa") or die (mysqli_error($con));
                                while($data_siswa = mysqli_fetch_array($sql_siswa)){
                                    echo '<option value="'.$data_siswa['nama_sws'].'">'.$data_siswa['nama_sws'].'</option>';
                                }
                               ?>         
                        </select>
        			</div>
                     <div class="form-group">
                        <label for="mpl">Nama Mapel</label>
                        <select multiple name="mpl" id="mpl" class="form-control" required autofocus>   
                              <?php 
                                $sql_mpl = mysqli_query($con, "SELECT * FROM tb_mapel ORDER BY nama_mapel ") or die (mysqli_error($con));
                                while($data_mpl = mysqli_fetch_array($sql_mpl)){
                                    echo '<option value="'.$data_mpl['nama_mapel'].'">'.$data_mpl['nama_mapel'].'</option>';
                                }
                               ?>         
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="guru">Nama Guru</label>
                        <select name="guru" id="guru" class="form-control" required autofocus>
                              <option value="">- Pilih -</option>     
                              <?php 
                                $sql_guru = mysqli_query($con, "SELECT * FROM tb_guru") or die (mysqli_error($con));
                                while($data_guru = mysqli_fetch_array($sql_guru)){
                                    echo '<option value="'.$data_guru['nama_guru'].'">'.$data_guru['nama_guru'].'</option>';
                                }
                               ?>         
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kls">Nama Kelas</label>
                        <select name="kls" id="kls" class="form-control" required autofocus>
                              <option value="">- Pilih -</option>     
                              <?php 
                                $sql_kls = mysqli_query($con, "SELECT * FROM tb_ruangkls ORDER BY nama_kelas ASC") or die (mysqli_error($con));
                                while($data_kls = mysqli_fetch_array($sql_kls)){
                                    echo '<option value="'.$data_kls['nama_kelas'].'">'.$data_kls['nama_kelas'].'</option>';
                                }
                               ?>         
                        </select>
                    </div>
                    <div class="form-group">
        				<label for="tgl">Tanggal Jadwal</label>
        				<input type="date" name="tgl" id="tgl" value="<?=date('Y-m-d')?>" class="form-control" required>
        			</div>
        			<div class="form-group pull-right">
        				<input type="submit" name="add" value="Simpan" class="btn btn-success">
						<input type="reset" name="reset" value="Reset" class="btn btn-default">
        			</div>
        		</form>
        		
        	</div>
        	
        </div>
	</div>

	<?php include_once('../_header.php');