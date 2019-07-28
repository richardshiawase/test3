<?php 
session_start();
if(($_SESSION['admin']=="admit")){

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
    <a class="nav-link active" href="#"><h6><b>Upload Dokumen</b></h6></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="menudelete.php"><h6>Edit Dokumen</h6></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="histori.php"><h6>Histori/Log</h6></a>
  </li>
 <li class="nav-item">
    <a class="nav-link" href="notifikasi1.php"><h6>Notifikasi<?php echo "(".$_SESSION['notifikasi'].")";?></h6></a>
  </li> 
   <li class="nav-item">
    <a class="nav-link" href="monitor.php"><h6>Monitor Disk</h6></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php"><h6>Logout</h6></a>
  </li>
</ul>
                <br />
                <label class="col-sm-7 control-label"><h7><b>Pilih Jenis Dokumen:</b></h7></label>
                <!--<div class="col-sm-9">
                  <select class="form-control m-bot15" name="posisi" id='posisi'>
                    <option value="">--Pilih Salah Satu--</option>
                    <option value="bastk">Berita Acara Serah Terima Kendaraan</option>
                    <option value="stnk">STNK Mobil</option>
                    <option value="kontrak">Kontrak Rental</option>
                    <option value="polis">Polis Asuransi</option>
                    <option value="po">Purchase Order</option>
                  </select>
                </div>-->
                <!--<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Berita Acara Serah Terima Kendaraan</a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-danger">STNK Mobil</a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-success">Kontrak Rental</a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-warning">Polis Asuransi</a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-info">Purchase Order</a>

</div>-->
              <div class="list-group">
                <a href="uploadbastk1.php" class="list-group-item list-group-item-action"><h7>Berita Acara Serah Terima Kendaraan (BASTK)</h7></a>
                <a href="uploadstnk1.php" class="list-group-item list-group-item-action"><h7>STNK Mobil</h7></a>
                <a href="uploadkontrak1.php" class="list-group-item list-group-item-action"><h7>Kontrak Rental</h7></a>
                <a href="uploadpolis1.php" class="list-group-item list-group-item-action"><h7>Polis Asuransi</h7></a>
                <a href="uploadpo1.php" class="list-group-item list-group-item-action"><h7>Purchase Order (PO)</h7></a>
              </div>
    <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
<script src="js/bootstrap.min.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>
</body>
</html>
<?php
}
else {
  header("Location:notfound.php");
}
?>