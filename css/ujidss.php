<?php include 'partial/head.php'; ?>
<body>


        <!-- Left Panel -->

        <?php include 'partial/sidebar.php'; ?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
            <?php include 'partial/header.php'; ?> 
        <!-- Header-->

      
          <!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Skripsi Amel </title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
</head>

  <?php 

  include 'config/koneksi.php';
  //if(!$_POST){
    ?>

<!-- 
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>


           <div class="col-sm-6 col-lg-12">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                      
                        <p class="text-light">Anda Belum Mengisi Data</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>

                    </div>

                </div>
            </div>

            

         




        </div> <!-- --> 

    <?php
 // }else{
    ?>


    <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">

                </div>
                <div class="panel-body">
<?php 
    $jenis_limbah = $_POST['jenis_limbah'];
    $tanggal_dari = $_POST['tanggal_dari'];
    $tanggal_tujuan = $_POST['tanggal_tujuan'];
   
          $iniquery = "SELECT id_transaksi, transaksi_limbah.id_jenis_limbah, jenis_limbah, SUM(jumlah) as jumlah_limbah, tanggal FROM transaksi_limbah LEFT JOIN jenis_limbah on transaksi_limbah.id_jenis_limbah = jenis_limbah.id_jenis_limbah WHERE transaksi_limbah.id_jenis_limbah = '$jenis_limbah' and tanggal BETWEEN '$tanggal_dari' and '$tanggal_tujuan'";
          
          $iniquery = mysqli_query($con,$iniquery);
          $count = mysqli_num_rows($iniquery);
        
            $data = mysqli_fetch_array($iniquery);
  if($data['jumlah_limbah'] == 0 OR $data['jumlah_limbah'] == NULL){
		echo "<script type='text/javascript'>alert('failed!')</script>";
	  
            //echo "<script>alert('Maaf Data tidak ada pada tanggal tersebut')</script>";
            //echo "<script>window.location.href='index.php?module=ujikeputusan'</script>";
          //  exit;
          }

  // $insinetor_emisi = (float) "25,33";
 // $query = "SELECT * FROM master_fuzzy ORDER BY id_tipe";
  // $run = mysqli_query($con,$query);

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

    $jenis = $jenis_limbah;
    $expert_1_tipe_1 = array();
    $expert_1_tipe_2 = array();
    $expert_1_tipe_3 = array();
    $expert_2_tipe_1 = array();
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
	
$insinetor_biaya = 0;
$microwave_biaya = 0;
$autoclave_biaya = 0;

    // $autoclave_query = mysqli_query($con,"SELECT SUM(dampak_lingkungan) as total_dampak_lingkungan, SUM(kebutuhan_lahan) as total_kebutuhan_lahan, SUM(efektifitas_treatment) as total_efektifitas_treatment FROM autoclave");
    // $data_autoclave = mysqli_fetch_assoc($autoclave_query);

    // $autoclave_dampak_lingkungan = $data_autoclave['total_dampak_lingkungan'] / 3;
    // $autoclave_kebutuhan_lahan = $data_autoclave['total_kebutuhan_lahan'] / 3;
    // $autocl
 $autoclave_query = mysqli_query($con,"SELECT * FROM autoclave");
 while($c_auto = mysqli_fetch_array($autoclave_query)){
    $dampak_lingkungan = $c_auto['dampak_lingkungan'];
	$inputcrisp_limbah = $c_auto['limbah_infeksius'];
	//echo " infeksius di autoclave <br />".$inputcrisp_limbah."<hr />";
    $dampak_lingkungan_val = get_fuzzy($dampak_lingkungan);
    $kebutuhan_lahan_val = get_fuzzy($c_auto['kebutuhan_lahan']);
    $efektivitas_treatment_val = get_fuzzy($c_auto['efektifitas_treatment']);

    if($jenis_limbah == 1){
        $sisa_val = get_fuzzy($c_auto['limbah_tajam']);
    }else{
        $sisa_val = get_fuzzy($c_auto['limbah_infeksius']);
    }

    array_push($autoclave_dampak_lingkungan,$dampak_lingkungan_val);
    array_push($autoclave_kebutuhan_lahan,$kebutuhan_lahan_val);
    array_push($autoclave_efektivitas,$efektivitas_treatment_val);
    array_push($autoclave_sisa,$sisa_val);
 }


 $microwave_query = mysqli_query($con,"SELECT * FROM microwave");
 while($c_auto = mysqli_fetch_array($microwave_query)){
    $dampak_lingkungan = $c_auto['dampak_lingkungan'];
    $dampak_lingkungan_val = get_fuzzy($dampak_lingkungan);
    $kebutuhan_lahan_val = get_fuzzy($c_auto['kebutuhan_lahan']);
    $efektivitas_treatment_val = get_fuzzy($c_auto['efektifitas_treatment']);

     if($jenis_limbah == 1){
        $sisa_val = get_fuzzy($c_auto['limbah_tajam']);
   }else{
        $sisa_val = get_fuzzy($c_auto['limbah_infeksius']);
    }


    array_push($microwave_dampak_lingkungan,$dampak_lingkungan_val);
    array_push($microwave_kebutuhan_lahan,$kebutuhan_lahan_val);
    array_push($microwave_efektivitas,$efektivitas_treatment_val);
    array_push($microwave_sisa,$sisa_val);
 }

 $insinerator_query = mysqli_query($con,"SELECT * FROM insinerator");
 while($c_auto = mysqli_fetch_array($insinerator_query)){
    $dampak_lingkungan = $c_auto['dampak_lingkungan'];
	$inputcrisp_limbah = $c_auto['limbah_infeksius'];
	//echo " infeksius di insinerator<br />".$inputcrisp_limbah."<hr />";
    $dampak_lingkungan_val = get_fuzzy($dampak_lingkungan);
    $kebutuhan_lahan_val = get_fuzzy($c_auto['kebutuhan_lahan']);
    $efektivitas_treatment_val = get_fuzzy($c_auto['efektifitas_treatment']);
     if($jenis_limbah == 1){
        $sisa_val = get_fuzzy($c_auto['limbah_tajam']);
   }else{	
        $sisa_val = get_fuzzy($c_auto['limbah_infeksius']);
    }

    array_push($insinerator_dampak_lingkungan,$dampak_lingkungan_val);
    array_push($insinerator_kebutuhan_lahan,$kebutuhan_lahan_val);
    array_push($insinerator_efektivitas,$efektivitas_treatment_val);
    array_push($insinerator_sisa,$sisa_val);
	
}


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
        $yb = ((($x-$x1b)*($y2b-$y1b))/($x2b-$x1b))+$y1b;
        $wm = (($ya*$x1a)+($yb*$x2b))/$ya+$yb;
    }else if($biaya >= 12501 AND $biaya <= 15000){  
        $x1 = 5000;
        $y1 = 0;
         $x2 = 15000;
        $y2 = 1;
        $y  = ((($x-$x1)*($y2-$y1))/($x2-$x1))+$y1;
        $wm = ($y*$x2)/$y;
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
        $yb = ((($x-$x1b)*($y2b-$y1b))/($x2b-$x1b))+$y1b;
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
    $microwave_biaya = $wm;
  }else if($tipe == 3){
    $insinetor_biaya = $wm;
  }
}


$autoclave_biaya  = 12500;
$microwave_biaya = 10156;
$insinerator_biaya = 15000;

$rvmin_autoclave_biaya = (10156 / $autoclave_biaya) * 100;
$rvmin_insinerator_biaya = (10156 / $insinerator_biaya) * 100;
$rvmin_microwave_biaya = (10156 / $microwave_biaya) * 100;

//    echo "Autoclave Biaya ".$autoclave_biaya."<br />";
  //  echo "Microwave Biaya ".$microwave_biaya."<br />";
    //echo "Insinerator Biaya ".$insinerator_biaya."<br />";


//echo "<pre>";

//echo "Insinerator Emisi ".print_r($insinerator_dampak_lingkungan);
//echo "AutoClave Emisi ".print_r($autoclave_dampak_lingkungan);
//echo "microwave Emisi ".print_r($microwave_dampak_lingkungan);


$insinetor_emisi = get_rata($insinerator_dampak_lingkungan);
$autoclave_emisi = get_rata($autoclave_dampak_lingkungan);
$microwave_emisi = get_rata($microwave_dampak_lingkungan);

//echo "<hr />";

//echo "Rata-Rata dampak lingkungan insinerator ".$insinetor_emisi."<br />"; 
//echo "Rata Rata dampak lingkungan autoclave ".$autoclave_emisi."<br />";
//echo "Rata Rata dampak lingkungan microwave ".$microwave_emisi."<br />";

//echo "<hr />";
//echo "Insinerator kebutuhan_lahan";
//print_r($insinerator_kebutuhan_lahan);
//echo "AautoCalve kebutuhan_lahan";
//print_r($autoclave_kebutuhan_lahan);
//echo "Microwave kebutuhan_lahan";
//print_r($microwave_kebutuhan_lahan);

$insinetor_lokasi = get_rata($insinerator_kebutuhan_lahan);
$microwave_lokasi = get_rata($microwave_kebutuhan_lahan);
$autoclave_lokasi = get_rata($autoclave_kebutuhan_lahan);

//echo "<hr />";

//echo "Rata Insinerator Lokasi ".$insinetor_lokasi."<br />";
//echo "Rata Autoclave Lokasi ".$autoclave_lokasi."<br />";
//echo "Rata Microwave_lokasi  ".$microwave_lokasi."<br />";

//echo "<hr />";
//echo "Insinertor Efektvitas ";
//print_r($insinerator_efektivitas);
//echo "AutoClave Efektvitas";
//print_r($autoclave_efektivitas);
//echo "Microwave Efektvitas";
//print_r($microwave_efektivitas);


$insinetor_efektivitas = get_rata($insinerator_efektivitas);
 $microwave_efektivitas = get_rata($microwave_efektivitas);
 $autoclave_efektivitas = get_rata($autoclave_efektivitas);


//echo "Rata Insinerator Efektvitas ".$insinetor_efektivitas."<br />";
//echo "Rata Autoclave Efektvitas ".$autoclave_efektivitas."<br />";
//echo "Rata Microwave Efektvitas  ".$microwave_efektivitas."<br />";

"<br>";

//echo "<pre>";
//echo "Insinerator limbah Tajam";
//print_r($insinerator_sisa);
//echo "Autoclave limbah Tajam";
//print_r($autoclave_sisa);
//echo "Microwave Tajam";
//print_r($microwave_sisa);


//echo "<hr />";

$insinetor_jenis = get_rata($insinerator_sisa);
$microwave_jenis = get_rata($microwave_sisa);
$autoclave_jenis = get_rata($autoclave_sisa);

//echo "hr />";
//echo "Insinerator jenis limbah = " .$jenis_limbah." Rata Rata ".$insinetor_jenis."<br />";
//echo "Autoclave Tajam Rata Rata ".$autoclave_jenis."<br />";
//echo "Microwave Tajam Rata Rata ".$microwave_jenis."<br />";

$insinetor_biaya = 0;
$microwave_biaya = 0;
$autoclave_biaya = 0;



$volume = $data['jumlah_limbah'];
  if($volume >= 0 AND $volume <= 100){
  //  echo "<h3> 0-100 </h3>";
    $x  = $volume;
    $x1 = 100;
    $y1 = 1;
    $y2 = 0;
    $x2 = 400;  
    $y  = (($x - $x1) * ($y2 - $y1)) / (($x2 - $x1) + $y1);;
   
    $d = ($y * $x1) / $y;
    $rv_min = (100 / $d) *100;


  }else if($volume >=  101 AND $volume <= 399){

    //  echo "<h3> 101-299 volume </h3>";

    $xa  = $volume;
    $x1a = 100;
    $y1a = 1;
    $y2a = 0;
    $x2a = 400;
    $ya = (($xa - $x1a) * ($y2a - $y1a) / ($x2a - $x1a)) + $y1a;
	$ya = number_format($ya,3);
    
    //echo "Hasil Y Atas ".$ya."<br />";
    $xb = $volume;
    $x1b = 100; 
    $y1b = 0;
    $x2b = 500;
    $y2b = 1;
    $yb = (($xb - $x1b) * ($y2b - $y1b) / ($x2b - $x1b)) + $y1b;
   
    //echo "Hasil Y Bawah ".$yb."<br />";

    $d = ($ya * $x1a) + ($yb * $x2b) / ($ya + $yb);
	$dd = floatval($d);
    $rv_min = (100 / ceil($dd)) * 100;
	//echo "Hasil RV ".$rv_min. "<br/>";

  }else if($volume >= 400 AND $volume <= 499){


  //echo "<h3> 400 volume </h3>";

    
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
    //  echo "<h3> 500-600 </h3>";

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

      //echo "<h3> 601 - 899 </h3>";


    $xa  = $volume;
    $x1a = 500;
    $y1a = 1;
    $y2a = 0;
    $x2a = 900;
    $ya  = (($xa - $x1a) * ($y2a - $y1a) / ($x2a - $x1a)) + $y1a;
    $yatasaksen = $ya*100;
    //echo "Hasil Y Atas ".$yatasaksen."<br />";

    $xb  = $volume;
    $x1b = 600; 
    $y1b = 0;
    $x2b = 1000;
    $y2b = 1;
    $yb  = (($xb - $x1b) * ($y2b - $y1b)) / ($x2b - $x1b) + $y1b;
    $ybawahaksen = $yb*100;
   // echo "Hasil Y bawah ".$yb."<br />";
    $d = (($yatasaksen * $x1a) + ($ybawahaksen * $x2b)) / ($yatasaksen + $ybawahaksen);
    //echo "Hasil defuzi bawah ".$d."<br />";
    $rv_min = (100 / $d) * 100;
    //echo "Hasil rv_min ".$rv_min."<br />";

  }else if($volume >= 900 AND $volume <= 1000){

      //echo "<h3> 900 - 1000 </h3>";


    $x  = $volume;
    $x1 = 600;
    $x2 = 1000;
    $y1 = 0;
    $y2 = 1;
    $y = (($x - $x1) * ($y2 - $y1)) / (($x2 - $x1) + $y1);;
    $yaksen = $y * 100;
    $d = ($yaksen * $x2) / $yaksen;
    $rv_min = (100 / $d) *100;

  }else{


  }
  "<br/>";
  
  $ins_rv1 = abs (floatval($insinetor_efektivitas - $rv_min));
  $ins_rv = ceil($ins_rv1);
  //echo "nilai rv min insinerator ".$ins_rv."<br />";
  
  $microwave_rv1 = abs(floatval($microwave_efektivitas - $rv_min));
  $microwave_rv = ceil($microwave_rv1);
  //echo "nilai rv min microwave ".$microwave_rv."<br />";
  
  $autoclave_rv = abs($autoclave_efektivitas - $rv_min);
  $microwave_rv = ceil($microwave_rv1);
  //echo "nilai rv min autoclave ".$autoclave_rv."<br />";
  $total_isinetor = 0;
  $total_microwave = 0;
  $total_autoclave = 0;

  $insinetor_biaya = $rvmin_insinerator_biaya;
  $microwave_biaya = $rvmin_microwave_biaya;
  $autoclave_biaya = $rvmin_autoclave_biaya;

  $total_isinetor = $insinetor_jenis + $insinetor_biaya + $insinetor_efektivitas + $insinetor_lokasi + $insinetor_emisi + $ins_rv;
  //echo "Hasil insinerator ".$total_isinetor."<br />";
  //echo "Hasil jenis insinerator ".$insinetor_jenis."<br />";
  //echo "Hasil biaya insinerator ".$insinetor_biaya."<br />";
  //echo "Hasil efektivitas insinerator ".$insinetor_efektivitas."<br />";
  //echo "Hasil lokasi insinerator ".$insinetor_lokasi."<br />";
  //echo "Hasil emisi insinerator ".$insinetor_emisi."<br />";
  //echo "Hasil jumlah insinerator ".$ins_rv."<br />";
  "<br>";
	
  $total_microwave = $microwave_jenis + $microwave_biaya + $microwave_efektivitas + $microwave_lokasi + $microwave_emisi + $microwave_rv;
//  echo "Hasil microwave ".$total_microwave."<br />";

  $total_autoclave = $autoclave_jenis + $autoclave_biaya + $autoclave_efektivitas + $autoclave_lokasi + $autoclave_emisi + $autoclave_rv;
 // echo "Hasil autoclave ".$total_autoclave."<br />";

  $total_isinetor = $total_isinetor / 6;  
  $total_microwave = $total_microwave / 6;
  $total_autoclave = $total_autoclave / 6;


?>
<h7 style='font-size: 18px;'>Hasil Perhitungan dengan Jenis :  <strong> <?php echo $data['jenis_limbah'] ?> </strong> <br>
Volume :<strong> <?php echo $data['jumlah_limbah']?> Kilogram </strong> <br>
Dari tanggal :<strong> <?php echo tgl_indo($tanggal_dari) ?> </strong> sampai dengan tanggal : 
<strong> <?php echo tgl_indo($tanggal_tujuan) ?> </strong> </h7>
<canvas id="myChart"> </canvas>
<a class="btn btn-primary" onclick="window.location.href='index.php?module=ujikeputusan'"> Coba Lagi </a>
<script>
 var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Insinerator", "Microwave", "AutoClave"],
                    
                    datasets: [{
                            data: [<?php echo $total_isinetor ?>, <?php echo $total_microwave ?>, <?php echo $total_autoclave ?>],
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
    </div>

    </div>

    <?php//  } //} ?>
        


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
     <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
        <!--  Chart js -->
    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

//         swal({
//   title: "Good job!",
//   text: "You clicked the button!",
//   icon: "success",
// })
    </script>

</body>
</html>
