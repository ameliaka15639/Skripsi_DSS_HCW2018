<?php include 'partial/head.php'; ?>
	
	<body>
        <?php include 'partial/sidebar.php'; ?>
    <div id="right-panel" class="right-panel">
        <?php include 'partial/header.php'; ?> 

        <?php 
        $module = @$_GET['module'];
        if($module == ''){
            include 'pages/home.php';
        }else{
			if($module == 'datalimbah'){
                include 'pages/data_limbah.php';
            }else if($module == 'jenislimbah'){
                include 'pages/jenislimbah.php';
            }else if($module == 'ujikeputusan'){
                include 'pages/ujikeputusan.php';
            }else if($module == 'tambahlimbah'){
                include 'pages/tambahdata.php'; 
            }else if($module == 'laporan'){
                include 'pages/laporan_chart.php';
			}else if($module == 'parameterizing'){
                include 'pages/parameterizing.php';
            }
        }
        ?>
    </div>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
