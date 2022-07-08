<?php 
	//Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "db_tugasakhir";

	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

	//Jika tombol simpan di klik
	if(isset($_POST['bsimpan']))
	{
		//Pengujian apakah data akan diedit atau disimpan baru
		if($_GET['hal'] == "edit")
		{
			//Data akan diedit
			$edit = mysqli_query($koneksi, "UPDATE tb_org set
											nis = '$_POST[tnis]',
											nama = '$_POST[tnama]',
											jurusan = '$_POST[tjurusan]',
											organisasi = '$_POST[torganisasi]'
											WHERE id_sws = '$_GET[id]'
											");
			if($edit)  //Jika sedit sukses
			{
				echo "<script>
						alert('Edit data sukses!!');
						document.location='index.php';
					</script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='index.php';
					</script>";
			}
		}else
		{
			//Data akan disimpan baru
			$simpan = mysqli_query($koneksi, "INSERT INTO tb_org (nis, nama, jurusan, organisasi)
											VALUES ('$_POST[tnis]',
													'$_POST[tnama]',
													'$_POST[tjurusan]',
													'$_POST[torganisasi]')
			");
			if($simpan)  //Jika simpan sukses
			{
				echo "<script>
						alert('Simpan data sukses!!');
						document.location='index.php';
					</script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='index.php';
					</script>";
			}
		}


		
	}

	//Pengujian Jika Tombol Edit / Hapus diklik
	if(isset($_GET['hal']))
	{
		//Pengujian jika edit data
		if($_GET['hal'] == "edit")
		{
			//Tampilkan data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM tb_org WHERE id_sws = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung dulu ke dalam variabel
				$vnis = $data['nis'];
				$vnama = $data['nama'];
				$vjurusan = $data['jurusan'];
				$vorganisasi = $data['organisasi'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query ($koneksi, "DELETE FROM tb_org WHERE id_sws = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data SUKSES!!');
						document.location='index.php';
					</script>";
			}
		}
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DATABASE ORGANISASI KELOMPOK 11</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">


	<h1 class="text-center">DATABASE ORGANISASI </h1>
	<h2 class="text-center">OLEH KELOMPOK 11</h2>

	<!-- Awal untuk card form -->
	<div class="card mt-3">
	  <div class="card-header bg-dark text-white">
	    Form Input Data Organisasi
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>NIS</label>
	    		<input type="text" name="tnis" value="<?=@$vnis?>" class="form-control" placeholder="Input NIM anda disini" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Nama</label>
	    		<input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Input Nama anda disini" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Jurusan</label>
	    		<select class="form-control" name="tjurusan">
	    			<option value="<?=@$vjurusan?>"><?=@$vjurusan?></option>
	    			<option value="IPA">IPA</option>
	    			<option value="IPS">IPS</option>
	    			<option value="Bahasa">Bahasa</option>
	    		</select>
	    	<div class="form-group">
	    		<label>Organisasi yang dipilih</label>
	    		<select class="form-control" name="torganisasi">
	    			<option value="<?=@$vorganisasi?>"><?=@$vorganisasi?></option>
	    			<option value="OSIS">OSIS</option>
	    			<option value="MPK">MPK</option>
	    		</select>
	    	</div>

	    	<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
	    	<button type="reset" class="btn btn-danger" name="bsimpan">Kosongkan</button>
	    </form>
	  </div>
	</div>
	<!-- Akhir untuk card form -->

	<!-- Awal untuk card Tabel -->
	<div class="card mt-3">
	  <div class="card-header bg-success text-white">
	    Daftar Organisasi
	  </div>
	  <div class="card-body">

	  	<table class="table table-bordered table-striped">
	  		<tr>
	  			<th>No</th>
	  			<th>NIS</th>
	  			<th>Nama</th>
	  			<th>Jurusan</th>
	  			<th>Organisasi yang dipilih</th>
	  			<th>Aksi</th>
	  		</tr>
	  		<?php 
	  		$no = 1;
	  			$tampil = mysqli_query($koneksi, "SELECT * from tb_org order by id_sws desc");
	  			while($data = mysqli_fetch_array($tampil)) :

	  		?>
	  		<tr>
	  			<td><?=$no++?></td>
	  			<td><?=$data['nis']?></td>
	  			<td><?=$data['nama']?></td>
	  			<td><?=$data['jurusan']?></td>
	  			<td><?=$data['organisasi']?></td>
	  			<td>
	  				<a href="index.php?hal=edit&id=<?=$data['id_sws']?>" class="btn btn-success">Edit</a>
	  				<a href="index.php?hal=hapus&id=<?=$data['id_sws']?>" 
	  					onclick="return confirm ('Apakah yakin ingin menghapus data ini ?') "class="btn btn-danger">Hapus</a>
	  			</td>
	  		</tr>
	  	<?php  endwhile; //penutup perulangan while?>
	  	</table>
	    
	  </div>
	</div>
	<!-- Akhir untuk card Tabel -->

</div>
<script type="text/javascript" src="js/bootstrap.min.css"></script>
</body>
</html>