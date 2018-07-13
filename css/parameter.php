<?php

        include 'config/koneksi.php';

        $jenis = $_GET['jenis'];


        $dampak_lingkungan = $_POST['dampak_lingkungan'];
        $kebutuhan_lahan = $_POST['kebutuhan_lahan'];
        $efektifitas_treatment = $_POST['efektifitas_treatment'];
        $limbah_tajam = $_POST['limbah_tajam'];
        $limbah_infeksius =  $_POST['limbah_infeksius'];
        $id_expert = $_POST['id_expert'];


        $query = "DELETE FROM $jenis WHERE id_expert = '$id_expert'";
        $run = mysqli_query($con,$query);

        $query = "INSERT INTO $jenis (dampak_lingkungan,kebutuhan_lahan,efektifitas_treatment,limbah_tajam,limbah_infeksius,id_expert) VALUES ('$dampak_lingkungan','$kebutuhan_lahan','$efektifitas_treatment','$limbah_tajam','$limbah_infeksius','$id_expert')";
        $run = mysqli_query($con,$query);
        if($run){
            echo "<script>alert('Data Berhasil Disimpan')</script>";
            echo "<script>window.location.href='index.php?module=parameterizing'</script>";
        }else{
            echo 'gagal menyimpan';
              echo("Error description: " . mysqli_error($con));

        }

        ?>