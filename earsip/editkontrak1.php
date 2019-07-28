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
    <a class="nav-link active" href="menudelete.php"><h6><b>Edit Dokumen</b></h6></a>
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
<form id="formkontrak" action="backeditkontrak.php"  method="POST" enctype="multipart/form-data">
              <div class="form-group">
                  <br/>
                  <label class="col-sm-3 control-label">Jenis Dokumen:</label>
                <div class="col-sm-9">
                  <value="kontrak"><b>Kontrak Rental</b></value="kontrak">
                  
                </div><br/>
                <label class="col-sm-3 control-label">Nomor Kontrak:</label>
                <div class="col-sm-9">
                  <input type="text"  class="form-control" name="nokontrak" id='nokontrak' placeholder="" value="<?php echo $_SESSION['kontrak_nokontrak'];?>" required>
                </div><br/>
                <label class="col-sm-3 control-label">Nama Perusahaan Pelanggan:</label>
                <div class="col-sm-9">
                  <input type="text"  class="form-control" name="namapt" id='namapt' placeholder="" value="<?php echo $_SESSION['kontrak_namapt'];?>" required>
                </div><br/>
                <label class="col-sm-3 control-label">Penandatangan Kontrak:</label>
                <div class="col-sm-9">
                  <input type="text"  class="form-control" name="namattd" id='namattd' placeholder="" value="<?php echo $_SESSION['kontrak_namattd'];?>" required>
                </div><br/>
                <label class="col-sm-3 control-label">Addendum ke-:</label>
                <div class="col-sm-9">
                  <input type="text"  class="form-control" name="addendum" id='addendum' placeholder="" value="<?php echo $_SESSION['kontrak_addendum'];?>" required>
                </div><br/>
                <label class="col-sm-3 control-label">Tanggal Kontrak:</label>
                <div class="col-sm-9">
                  <input type="date"  class="form-control" name="tglkontrak" id='tglkontrak' placeholder="" value="<?php echo $_SESSION['kontrak_tglkontrak'];?>" required>
                </div><br/>
              
             

              <!--<form id="filebastk" class="form-horizontal " role="form" action="filekontrak.php"  method="POST" >-->
                  <label class="col-sm-3 control-label">Masukkan Dokumen Kontrak:</label>
                  <div class="col-sm-9">
                    <input type="file" name="filekontrak" required>
                  </div><br/>
              <div class="col-sm-9">
                  <a class="btn btn-success" data-toggle="modal" href="#myModal-2">Upload</a>
                </div>
    </div>
<section-id="upload">
  <section class="wrapper">
    <!--<form id="confirmupload" name="confirmupload">-->
       <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-2" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h6 class="modal-title">Konfirmasi Edit</h6>
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">X</button>                
              </div>
              <!--<form id="confirmdelete" action="delete.php">-->
              <div class="modal-body">
                <div class="form-group">
                  <div class="col-sm-12">
                      Data sudah benar semua dan lanjut upload?
                  </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-8">
                      <button class="btn btn-info" type="submit">Ya</button>
                    </div>                     
                </div>
            <!--</form> -->
            </div>
            </div>
          </div>
      </div>
    <!--</form>-->
  </section>
</section-id="upload">
 </form>            

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