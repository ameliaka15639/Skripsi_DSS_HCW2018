
<?php 

	include 'config/koneksi.php';

   $jenis_limbah = $_POST['jenis_limbah'];
    $tanggal_dari = $_POST['tanggal_dari'];
    $tanggal_tujuan = $_POST['tanggal_tujuan'];
    
    //$jenis_limbah = 1;
    //$tanggal_tujuan = '2018-04-22';
    //$tanggal_dari = '2018-04-22';


          $iniquery = "SELECT id_transaksi, transaksi_limbah.id_jenis_limbah, jenis_limbah, SUM(jumlah) as jumlah_limbah, tanggal FROM transaksi_limbah LEFT JOIN jenis_limbah on transaksi_limbah.id_jenis_limbah = jenis_limbah.id_jenis_limbah WHERE transaksi_limbah.id_jenis_limbah = '$jenis_limbah' and tanggal BETWEEN '$tanggal_dari' and '$tanggal_tujuan'";
         // echo $iniquery;

		  
          $iniquery = mysqli_query($con,$iniquery);
          $count = mysqli_num_rows($iniquery);
        
            $data = mysqli_fetch_array($iniquery);
  if($data['jumlah_limbah'] == 0 OR $data['jumlah_limbah'] == NULL){
            echo "0";
          }else{
          	echo "1";
          }
	?>