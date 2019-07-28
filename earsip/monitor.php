<?php 
session_start();
if($_SESSION['admin']=="admit"){

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">
  <title>PT. Autorent Lancar Sejahtera</title>
	<img src="logopolos.png" / align="center" >
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme_portal.css" rel="stylesheet">
    <!--external css-->
   
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>
<body>
<div class="col-sm-12">
  <font face="tahoma" size="2"><align="right">Hello <?php { echo $_SESSION['admin']; } ?> :)</text></align="right">
</div>
<br/>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="menu1.php"><h6>Cari Dokumen</h6></a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="upload1.php"><h6>Upload Dokumen</h6></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="menudelete.php"><h6>Hapus Dokumen</h6></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="histori.php"><h6>Histori/Log</h6></a>
  </li>
 
  <li class="nav-item">
    <a class="nav-link" href="notifikasi1.php"><h6>Notifikasi<?php echo "(".$_SESSION['notifikasi'].")";?></h6></a>
  </li> 
  <li class="nav-item">
    <a class="nav-link active" href="monitor.php"><h6><b>Monitor Disk</b></h6></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php"><h6>Logout</h5></a>
  </li>
</ul>
<br/>
<?php

	/*Untuk mengambil size folder */
	function folderSize ($dir)
	{
    	$size = 0;
    	foreach (glob(rtrim($dir, '/').'/*', GLOB_NOSORT) as $each) {
        	$size += is_file($each) ? filesize($each) : folderSize($each);
    	}
    	return $size;
	}
	/* Untuk mengatur Format */
	function formatBytes($bytes, $precision = 2) { 
    	$units = array('B', 'KB', 'MB', 'GB', 'TB'); 

    	$bytes = max($bytes, 0); 
    	$pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
    	$pow = min($pow, count($units) - 1); 

    	// Uncomment one of the following alternatives
    	$bytes /= pow(1024, $pow);
  

    	return round($bytes, $precision) . ' ' . $units[$pow]; 
	}

	$bastk_dir = "C:/xampp/htdocs/earsip/file/bastk/";
	$stnk_dir="C:/xampp/htdocs/earsip/file/stnk/";
	$polis_dir = "C:/xampp/htdocs/earsip/file/polis/";
	$kontrak_dir = "C:/xampp/htdocs/earsip/file/kontrak/";
	$po_dir = "C:/xampp/htdocs/earsip/file/po/";
	$semua_dir = "C:/xampp/htdocs/earsip/file/";
	$ss = folderSize($semua_dir);
	$bastk = folderSize($bastk_dir);
	$stnk = folderSize($stnk_dir);
	$polis = folderSize($polis_dir);
	$kontrak = folderSize($kontrak_dir);
	$po = folderSize($po_dir);
	$ds = formatBytes($ss,2);
	$persen = ($ds/400000)*100;
	$date = strtotime('Y-m-d H:i:s');

		if ($persen<50) { ?>
			<div class="col-sm-12">
 			<div class="jumbotron" style="position:relative; display:inline-block; background-color:rgb(115, 255, 216)">
 			<?php
			echo "REKAP PENGGUNAAN DISK SERVER E-ARSIP";echo "<br>";
			echo "=================================";echo "<br>";
			echo "Dokumen BASTK   : ".formatBytes($bastk,2);echo "<br>";
			echo "Dokumen STNK    : ".formatBytes($stnk,2);echo "<br>";
			echo "Dokumen Polis   : ".formatBytes($polis,2);echo "<br>";
			echo "Dokumen Kontrak : ".formatBytes($kontrak,2);echo "<br>";
			echo "Dokumen PO      : ".formatBytes($po,2);echo "<br>";
			echo "================================="; echo "<br>";
			echo "Penggunaan Untuk Semua Dokumen : " .$ds; echo "<br>";
			echo "Kapasitas Disk Untuk E-Arsip : 400 GB"; echo "<br>";
			echo "================================="; echo "<br>";
			echo "Presentasi Total Penggunaan Disk : ".$persen."%";echo "<br>";
			echo "================================="; echo "<br>"; 
		}
  		elseif ($persen>=50 && $persen<80) { ?>
			<div class="col-sm-12">
 			<div class="jumbotron" style="position:relative; display:inline-block; background-color:rgb(255, 255, 0)">
 			<?php
 			echo "REKAP PENGGUNAAN DISK SERVER E-ARSIP";echo "<br>";
			echo "=================================";echo "<br>";
			echo "Dokumen BASTK   : ".formatBytes($bastk,2);echo "<br>";
			echo "Dokumen STNK    : ".formatBytes($stnk,2);echo "<br>";
			echo "Dokumen Polis   : ".formatBytes($polis,2);echo "<br>";
			echo "Dokumen Kontrak : ".formatBytes($kontrak,2);echo "<br>";
			echo "Dokumen PO      : ".formatBytes($po,2);echo "<br>";
			echo "================================="; echo "<br>";
			echo "Penggunaan Untuk Semua Dokumen : " .$ds; echo "<br>";
			echo "Kapasitas Disk Untuk E-Arsip : 400 GB"; echo "<br>";
			echo "================================="; echo "<br>";
			echo "Presentasi Total Penggunaan Disk : ".$persen."%";echo "<br>";
			echo "================================="; echo "<br>";
		} 
  		elseif ($persen>=80) { ?>
			<div class="col-sm-12">
 			<div class="jumbotron" style="position:relative; display:inline-block; background-color:rgb(205, 92, 92)">
 			<?php
 			echo "REKAP PENGGUNAAN DISK SERVER E-ARSIP";echo "<br>";
			echo "=================================";echo "<br>";
			echo "Dokumen BASTK   : ".formatBytes($bastk,2);echo "<br>";
			echo "Dokumen STNK    : ".formatBytes($stnk,2);echo "<br>";
			echo "Dokumen Polis   : ".formatBytes($polis,2);echo "<br>";
			echo "Dokumen Kontrak : ".formatBytes($kontrak,2);echo "<br>";
			echo "Dokumen PO      : ".formatBytes($po,2);echo "<br>";
			echo "================================="; echo "<br>";
			echo "Penggunaan Untuk Semua Dokumen : " .$ds; echo "<br>";
			echo "Kapasitas Disk Untuk E-Arsip : 400 GB"; echo "<br>";
			echo "================================="; echo "<br>";
			echo "Presentasi Total Penggunaan Disk : ".$persen."%";echo "<br>";
			echo "================================="; echo "<br>";
		} ?> </div></div>

<?php
}
else {
  header("Location:notfound.php");
} 

?>