<?php 


$insinetor_emisi = (float) "30,0";
$landfil_emisi = (float) "45,0";
$autoclave_emisi = (float) "83,0";



$insinetor_lokasi = (float) "27,0";
$landfil_lokasi = (float) "35,0";
$autoclave_lokasi = (float) "90,0";



$insinetor_efektivitas = (float) "100,0";
$landfil_efektivitas = (float) "33,30";
$autoclave_efektivitas = (float) "83,30";



$insinetor_biaya = (float) "67,70";
$landfil_biaya = (float) "100,00";
$autoclave_biaya = (float) "90,20";


$jenis = $_POST['jenis'];
if($jenis == 'jarumsuntik'){



$insinetor_jenis = (float) "100,00";
$landfil_jenis = (float) "50,00";
$autoclave_jenis = (float) "69,4";


}else if($jenis == 'botolkaca'){


$insinetor_jenis = (float) "50,00";
$landfil_jenis = (float) "58,30";
$autoclave_jenis = (float) "100,0";


}else if($jenis == 'infuskateter'){


$insinetor_jenis = (float) "83,30";
$landfil_jenis = (float) "50,00";
$autoclave_jenis = (float) "100,00";


}


$volume = $_POST['volume'];

	if($volume >= 0 AND $volume <= 100){
		$x = 100;
		$y = (($x - 0) * (0 - 1)) / ((400 - 0) + 1);
		$yaksen = $y * 100;
		$d = ($y * 400) / $y;
		$rv_min = (100 / $d) *100;
	}


?>	