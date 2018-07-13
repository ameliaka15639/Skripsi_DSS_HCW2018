<html>
	<head>
		<title>Upload</title>
	</head>
	<body>
	
		<?php 
		include 'config/koneksi.php';
		if($_POST['upload']){
			$ekstensi_diperbolehkan	= array('csv');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
				//	move_uploaded_file($file_tmp, 'file/'.$nama);
				$handle = fopen($file_tmp, 'r');
				while (($myData	= fgetcsv($handle, 1000, ';')) !== false){
					$jenis = $myData[0];
					$jumlah = $myData[1];
					$tanggal = $myData[2];
					$gedung = $myData[3];

					$queryy = "insert into transaksi_limbah (id_jenis_limbah, jumlah, tanggal, gedung) values ('".$jenis."','".$jumlah."','".$tanggal."','".$gedung."')";
			
					$query = mysqli_query($con,$queryy);
					if($query){
						echo "<script>alert('Data Berhasil di ekstrak')</script>";
						echo "<script>window.location.href='index.php?module=datalimbah'</script>";
					//	echo 'Data berhasil di ekstrak';
					}else{
						echo 'GAGAL MENGUPLOAD FILE';
					}
				}
			}else{
					echo 'Ukuran File Terlalu Besar';
			}

			}else{
				echo 'Gagal mengekstrak data, kesalahan format';
			}
		}
		?>
 
		<br/>
		<br/> 
		<a href="index.php?module=datalimbah">Upload Lagi</a>
		<br/>
		<br/>
 
		<table>
			<?php 
			$data = mysqli_query($con, "select * from transaksi_limbah");
			while($d = mysqli_fetch_array($data)){
				
			?>
			<tr>
				<td>
					<file src="<?php echo "file/".$d['nama_file']; ?>">
				</td>		
			</tr>
			<?php } ?>
		</table>
	</body>
</html>