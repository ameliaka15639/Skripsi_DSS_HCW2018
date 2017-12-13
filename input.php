

        <!--start container-->
        <div class="container">
          <div class="section">

            <p class="caption">DSS (gua gatau ini dss apa)</p>
          <!--Form Advance-->          
          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <h4 class="header2">Input Data</h4>
                <div class="row">
                  <form class="col s12" method="POST" action="index.php?url=form">
                  
                    <div class="row">
                      <div class="input-field col s6">
                        <select name="jenis">
                          <option value="" disabled selected>Pilih Jenis</option>
                          <option value="jarumsuntik">Jarum Suntik</option>
                          <option value="botolkaca">Botol Kaca</option>
                          <option value="infuskateter">Infus Kateter</option>
                        </select>
                      </div>                        
                      <div class="input-field col s6">
                        <input type="text" class="" name="volume">
                        <label for="dob">Input Volume</label>
                      </div>
                      
                    </div>
                    
                    <div class="row">
                   
                      <div class="row">
                        <div class="input-field col s12">
                          <input type="hidden" name="proses" value="1">
                          <button class="btn cyan waves-effect waves-light right" type="submit" name="submit">Submit
                            <i class="mdi-content-send right"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>


<?php 
error_reporting(0);
if(@$_POST['proses'] == '1'){
$insinetor_emisi = (float) "30,0";
$landfill_emisi = (float) "45,0";
$autoclave_emisi = (float) "83,0";



$insinetor_lokasi = (float) "27,0";
$landfill_lokasi = (float) "35,0";
$autoclave_lokasi = (float) "90,0";



$insinetor_efektivitas = (float) "100,0";
$landfill_efektivitas = (float) "33,30";
$autoclave_efektivitas = (float) "83,30";



$insinetor_biaya = (float) "67,70";
$landfill_biaya = (float) "100,00";
$autoclave_biaya = (float) "90,20";


$jenis = $_POST['jenis'];
if($jenis == 'jarumsuntik'){



$insinetor_jenis = (float) "100,00";
$landfill_jenis = (float) "50,00";
$autoclave_jenis = (float) "69,4";


}else if($jenis == 'botolkaca'){


$insinetor_jenis = (float) "50,00";
$landfill_jenis = (float) "58,30";
$autoclave_jenis = (float) "100,0";


}else if($jenis == 'infuskateter'){


$insinetor_jenis = (float) "83,30";
$landfill_jenis = (float) "50,00";
$autoclave_jenis = (float) "100,00";


}


$volume = $_POST['volume'];
//echo $volume;
  if($volume >= 0 AND $volume <= 100){
    $x = $volume;
    $y = (($x - 0) * (0 - 1)) / ((400 - 0) + 1);
    $yaksen = $y * 100;
    $d = ($y * 400) / $y;
    $rv_min = (100 / $d) *100;


  }else if($volume >=  101 AND $volume <= 399){

    $xa = $volume;
    $x1a = 0;
    $y1a = 1;
    $y2a = 0;
    $x2a = 400;

    //315 * 9-1

    $ya = (($xa - $x1a) * ($y2a - $y1a) / ($x2a - $x1a)) + $y1a;

   // echo "Hasil Y Atas ".$ya."<br />";
    $x_bawah = $volume;
    $x1  = 100; 
    $y1  = 0;
    $x2 = 500;
    $y2 = 1;
      $y_bawah = (($x_bawah - $x1) * ($y2 - $y1) / ($x2 - $x1)) + $y1;

    //  echo "Hasl Y Bawah ".$y_bawah."<br />";

      $d = ($ya * $x1a) + ($y_bawah * $x2) / ($ya + $y_bawah);
  
      $rv_min = (100 / $d) * 100;
  //    echo "Hasil RV ".$rv_min;
//      exit;

  }else if($volume >= 400 AND $volume <= 499){

    
    $x = $volume;
    $x1 = 100;
    $x2 = 500;
    $y1 = 0;
    $y2 = 1;

    $y = (($x - $x1) * ($y2 - $y1)) / (($x2 - $x1) + 1);
    $yaksen = $y * 100;
    $d = ($y * 400) / $y;
    $rv_min = (100 / $d) *100;

  }else if($volume >= 500 AND $volume <= 600){


  }else if($volume >= 601 AND $volume <= 899){



  }else if($volume >= 900 AND $volume <= 1000){



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

<h3> Hasil Perhitungan dengan Jenis : <?php echo $_POST['jenis'] ?> Volume <?php echo $_POST['volume']; ?> </h3>
<canvas id="myChart"> </canvas>

<script>
 var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Insinerator", "Landfill", "AutoClave"],
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
                    }
                }
            });
        </script>


<?php 


}
?>  

