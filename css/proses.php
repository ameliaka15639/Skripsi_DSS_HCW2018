  <?php 
  $module  = $_GET['module'];
  include 'config/koneksi.php';
if($module == 'tambahlimbah'){
  

   if(@$_POST['jenis_limbah'] != ''){
    $jenis_limbah = $_POST['jenis_limbah'];
    $gedung = $_POST['gedung'];
    $volume = $_POST['volume'];
    $lantai = $_POST['lantai'];
    $tanggal = $_POST['tanggal'];
    if($tanggal == ''){
      $tanggal = date('Y-m-d');
    }else{
      $tanggal = $tanggal;
    }


    $query = "INSERT INTO transaksi_limbah (id_jenis_limbah,jumlah,tanggal,lantai,gedung) VALUES ('$jenis_limbah','$volume','$tanggal','$lantai','$gedung')";
    $run = mysqli_query($con,$query);
    if($run){ 
      echo "<script>alert('Data Berhasil Ditambahkan')</script>";
      echo "<script>window.open('index.php?module=datalimbah')</script>";
//   echo "<script>setTime"
//   echo "<script>window.location.reload()</script>";
    }else{
      echo $query;
    }


  }else{



  }


}else if($module == 'ujidata'){

    $jenis_limbah = $_POST['jenis_limbah'];
    $tanggal_dari = $_POST['tanggal_dari'];
    $tanggal_tujuan = $_POST['tanggal_tujuan'];

          $iniquery = "SELECT id_transaksi, transaksi_limbah.id_jenis_limbah, nama_limbah, SUM(jumlah) as jumlah_limbah, tanggal FROM transaksi_limbah LEFT JOIN jenis_limbah on transaksi_limbah.id_jenis_limbah = jenis_limbah.id_jenis_limbah WHERE transaksi_limbah.id_jenis_limbah = '$jenis' and tanggal BETWEEN '$tanggal_dari' and '$tanggal_tujuan'";
            $data = mysqli_fetch_array($query);

if(@$_POST['proses'] == '1'){
  $insinetor_emisi = (float) "25,33";
  $query = "SELECT * FROM master_fuzzy ORDER BY id_tipe";
  $run = mysqli_query($con,$query);

  $insinerator_dampak_lingkungan = 0;
  $insinerator_kebutuhan_lahan = 0;
  $insinerator_efektivitas = 0;

  $autoclave_dampak_lingkungan = 0;
  $autoclave_kebutuhan_lahan = 0;
  $autoclave_efektivitas = 0;

  $microwave_dampak_lingkungan = 0;
  $microwave_kebutuhan_lahan = 0;
  $microwave_efektivitas = 0;
  
  $insinerator_biaya = 0;
  $autoclave_biaya = 0;
  $microwave_biaya = 0;

  $jenis = $_POST['jenis'];
  
    $expert_1_tipe_1 = array();
    $expert_1_tipe_2 = array();
    $expert_1_tipe_3 = array();

    $expert_2_tipe_1 =array();
    $expert_2_tipe_2 = array();
    $expert_2_tipe_3 = array();


    $expert_3_tipe_1 = array();
    $expert_3_tipe_2 = array();
    $expert_3_tipe_3 = array();

    $autoclave_dampak_lingkungan = array();
    $autoclave_kebutuhan_lahan = array();
    $autoclave_efektivitas = array();
    
        $microwave_dampak_lingkungan = array();
    $microwave_kebutuhan_lahan = array();
    $microwave_efektivitas = array();
    

        $insinerator_dampak_lingkungan = array();
    $insinerator_kebutuhan_lahan = array();
    $insinerator_efektivitas = array();
    
    $autoclave_sisa = array();
    $microwave_sisa = array();
    $insinerator_sisa = array();

  while($dt = mysqli_fetch_array($run)){

    $dampak_lingkungan = $dt['dampak_lingkungan'];
    $kebutuhan_lahan = $dt['kebutuhan_lahan'];
    $efektivitas_treatment = $dt['efektifitas_treatment'];
    if($jenis == 1){
          $sisa = $dt['tajam'];

        }else{
    $sisa = $dt['infeksius'];
  }

  $dampak_lingkungan_val = get_fuzzy($dampak_lingkungan);
  $kebutuhan_lahan_val = get_fuzzy($kebutuhan_lahan);
  $efektivitas_treatment_val = get_fuzzy($efektivitas_treatment);
  $sisa_val = get_fuzzy($sisa);

  if($dt['id_tipe'] == 1){

    array_push($autoclave_dampak_lingkungan,$dampak_lingkungan_val);
    array_push($autoclave_kebutuhan_lahan,$kebutuhan_lahan_val);
    array_push($autoclave_efektivitas,$efektivitas_treatment_val);
    array_push($autoclave_sisa,$sisa_val);


  }else if($dt['id_tipe'] == 2){
        array_push($microwave_dampak_lingkungan,$dampak_lingkungan_val);
    array_push($microwave_kebutuhan_lahan,$kebutuhan_lahan_val);
    array_push($microwave_efektivitas,$efektivitas_treatment_val);
    array_push($microwave_sisa,$sisa_val);


  }else if($dt['id_tipe'] == 3){

        array_push($insinerator_dampak_lingkungan,$dampak_lingkungan_val);
    array_push($insinerator_kebutuhan_lahan,$kebutuhan_lahan_val);
    array_push($insinerator_efektivitas,$efektivitas_treatment_val);
    array_push($insinerator_sisa,$sisa_val);


  }








  }

  // $landfill_emisi = (float) "76,77";
// $autoclave_emisi = (float) "93,43";

$insinetor_emisi = get_rata($insinerator_dampak_lingkungan);
$autoclave_emisi = get_rata($autoclave_dampak_lingkungan);
$landfill_emisi = get_rata($microwave_dampak_lingkungan);


$insinetor_lokasi = get_rata($insinerator_kebutuhan_lahan);
$landfill_lokasi = get_rata($microwave_kebutuhan_lahan);
$autoclave_lokasi = get_rata($autoclave_kebutuhan_lahan);

$insinetor_efektivitas = get_rata($insinerator_efektivitas);
 $landfill_efektivitas = get_rata($microwave_efektivitas);
 $autoclave_efektivitas = get_rata($autoclave_efektivitas);

$insinetor_jenis = get_rata($insinerator_sisa);
 $landfill_jenis = get_rata($microwave_sisa);
 $autoclave_jenis = get_rata($autoclave_sisa);

$insinetor_biaya = 0;
$landfill_biaya = 0;
$autoclave_biaya = 0;

  $bz = mysqli_query($con,"SELECT * FROM master_tipe");
  while($cz = mysqli_fetch_array($bz)){
    $biaya = $cz['biaya'];
    $x = $biaya;
    $tipe = $cz['id_tipe'];

    if($biaya == 0 AND $biaya <= 5000){
      $x1 = 0;
      $y1 = 1;
      $x2 = 12500;
      $y2 = 0;

        $y  = ((($x-$x1)*($y2-$y1))/($x2-$x1))+$y1;
$wm = ($y*$x1)/$y;


    }else if($biaya >= 5001 AND $biaya <= 12500){


    $x1a = 0;
    $y1a = 1;
    $x2a = 12500;
    $y2a = 0;
    $ya = ((($x-$x1a)*($y2a-$y1a))/($x2a-$x1a))+$y1a;

$x1b = 5000;
$y1b = 0;
$x2b = 15000;
$y2b = 1;
$yb = ((($x-$x1a)*($y2a-$y1a))/($x2a-$x1a))+$y1a;
$wm = (($ya*$x1a)+($yb*$x2b))/$ya+$yb;




    }else if($biaya >= 12501 AND $biaya <= 15000){
$x1 = 5000;
      $y1 = 1;
      $x2 = 15000;
      $y2 = 0;

        $y  = ((($x-$x1)*($y2-$y1))/($x2-$x1))+$y1;
$wm = ($y*$x1)/$y;

  }else if($biaya >= 15001 AND $biaya <= 17500){
      $x1 = 15000;
      $y1 = 1;
      $x2 = 25000;
      $y2 = 0;

       $y  = ((($x-$x1)*($y2-$y1))/($x2-$x1))+$y1;
$wm = ($y*$x1)/$y;

  }else if($biaya >= 17501 AND $biaya <= 25000){

    $x1a = 15000;
    $y1a = 1;
    $x2a = 25000;
    $y2a = 0;
    $ya = ((($x-$x1a)*($y2a-$y1a))/($x2a-$x1a))+$y1a;

$x1b = 17500;
$y1b = 0;
$x2b = 30000;
$y2b = 1;
$yb = ((($x-$x1a)*($y2a-$y1a))/($x2a-$x1a))+$y1a;
$wm = (($ya*$x1a)+($yb*$x2b))/$ya+$yb;





  }else if($biaya >= 25001 AND $biaya <= 30000){
$x1 = 17500;
      $y1 = 0;
      $x2 = 30000;
      $y2 = 1;

        $y  = ((($x-$x1)*($y2-$y1))/($x2-$x1))+$y1;
$wm = ($y*$x1)/$y;
  }

  if($tipe == 1){
    $autoclave_biaya = $wm;
  }else if($tipe == 2){
    $landfill_biaya = $wm;

  }else if($tipe == 3){
    $insinetor_biaya = $wm;
  }

}



$volume = $data['jumlah_limbah'];
  if($volume >= 0 AND $volume <= 100){
    $x  = $volume;
    $x1 = 100;
    $y1 = 1;
    $y2 = 0;
    $x2 = 400;  
    $y  = (($x - $x1) * ($y2 - $y1)) / (($x2 - $x1) + $y1);;
    $yaksen = $y * 100;
    $d = ($yaksen * $x1) / $yaksen;
    $rv_min = (100 / $d) *100;


  }else if($volume >=  101 AND $volume <= 399){

    $xa  = $volume;
    $x1a = 100;
    $y1a = 1;
    $y2a = 0;
    $x2a = 400;
    $ya = (($xa - $x1a) * ($y2a - $y1a) / ($x2a - $x1a)) + $y1a;
    $yatasaksen = $ya*100;
   // echo "Hasil Y Atas ".$ya."<br />";
    $xb = $volume;
    $x1b = 100; 
    $y1b = 0;
    $x2b = 500;
    $y2b = 1;
    $yb = (($xb - $x1b) * ($y2b - $y1b) / ($x2b - $x1b)) + $y1b;
    $ybawahaksen = $yb*100;

    $d = ($yatasaksen * $x1a) + ($ybawahaksen * $x2b) / ($yatasaksen + $ybawahaksen);
  
    $rv_min = (100 / $d) * 100;

  }else if($volume >= 400 AND $volume <= 499){

    
    $x  = $volume;
    $x1 = 100;
    $x2 = 500;
    $y1 = 0;
    $y2 = 1;
    $y  = (($x - $x1) * ($y2 - $y1)) / (($x2 - $x1) + $y1);;
    $yaksen = $y * 100;
    $d = ($yaksen * $x2) / $yaksen;
    $rv_min = (100 / $d) *100;

  }else if($volume >= 500 AND $volume <= 600){
    $x  = $volume;
    $x1 = 500;
    $x2 = 900;
    $y1 = 1;
    $y2 = 0;

    $y = (($x - $x1) * ($y2 - $y1)) / (($x2 - $x1) + $y1);;
    $yaksen = $y * 100;
    $d = ($yaksen * $x1) / $yaksen;
    $rv_min = (100 / $d) *100;

  }else if($volume >= 601 AND $volume <= 899){
    $xa  = $volume;
    $x1a = 500;
    $y1a = 1;
    $y2a = 0;
    $x2a = 900;
    $ya  = (($xa - $x1a) * ($y2a - $y1a) / ($x2a - $x1a)) + $y1a;
    $yatasaksen = $ya*100;

    $xb  = $volume;
    $x1b = 600; 
    $y1b = 0;
    $x2b = 1000;
    $y2b = 1;
    $yb  = (($xb - $x1b) * ($y2b - $y1b)) / ($x2b - $x1b) + $y1b;
    $ybawahaksen = $yb*100;

    $d = (($yatasaksen * $x1a) + ($ybawahaksen * $x2b)) / ($yatasaksen + $ybawahaksen);
    $rv_min = (100 / $d) * 100;

  }else if($volume >= 900 AND $volume <= 1000){
    $x  = $volume;
    $x1 = 600;
    $x2 = 1000;
    $y1 = 0;
    $y2 = 1;
    $y = (($x - $x1) * ($y2 - $y1)) / (($x2 - $x1) + $y1);;
    $yaksen = $y * 100;
    $d = ($yaksen * $x2) / $yaksen;
    $rv_min = (100 / $d) *100;

  }
  $ins_rv = abs($insinetor_efektivitas - $rv_min);
  $landfill_rv = abs( (float) $landfill_efektivitas - $rv_min);
  $autoclave_rv = abs($autoclave_efektivitas - $rv_min);
  $total_isinetor = 0;
  $total_landfill = 0;
  $total_autoclave = 0;

  $total_isinetor = $insinetor_jenis + $insinetor_biaya + $insinetor_efektivitas + $insinetor_lokasi + $insinetor_emisi + $ins_rv;

  $total_landfill = $landfill_jenis + $landfill_biaya + $landfill_efektivitas + $landfill_lokasi + $landfill_emisi + $landfill_rv;

  $total_autoclave = $autoclave_jenis + $autoclave_biaya + $autoclave_efektivitas + $autoclave_lokasi + $autoclave_emisi + $autoclave_rv;

  $total_isinetor = $total_isinetor / 6;  
  $total_landfill = $total_landfill / 6;
  $total_autoclave = $total_autoclave / 6;


?>
<h7> Hasil Perhitungan dengan Jenis : <?php echo $data['nama_limbah'] ?> <br>
Volume : <?php echo $data['jumlah_limbah']?> Kilogram <br>
Dari tanggal : <?php echo tgl_indo($daritanggal) ?> sampai dengan tanggal : <?php echo tgl_indo($sampaitanggal) ?>  </h7>
<canvas id="myChart"> </canvas>

<script>
 var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Insinerator", "Microwave", "AutoClave"],
                    
                    datasets: [{
                            data: [<?php echo $total_isinetor ?>, <?php echo $total_landfill ?>, <?php echo $total_autoclave ?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    },legend: {
                      display:false
                    }
                }
            });
        </script>


<?php 
}
}else{
  echo "disini";
}

  ?>
