<?php 
                         include('koneksi.php');

                    if($_POST) {
                       $jenis  = $_POST['jenis'];
                       $volume = $_POST['volume']; 
                       $tanggal = $_POST['tanggal'];
                       $gedung = $_POST['gedung'];
                       $lantai = $_POST['lantai'];

                       $sql  = "INSERT INTO transaksi_limbah (id_jenis_limbah, jumlah, tanggal,id_gedung,lantai) values ('$jenis', '$volume', '$tanggal','$gedung','$lantai')";

                        echo $sql;