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
    <a class="nav-link active" href="menudelete.php"><h6><b>Hapus Dokumen</b></h6></a>
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
    <a class="nav-link" href="index.php"><h6>Logout</h5></a>
  </li>
</ul>
<form id="formpo" action="backeditpo.php"  method="POST" enctype="multipart/form-data">
              <div class="form-group">
                  <br/>
                  <label class="col-sm-3 control-label">Jenis Dokumen:</label>
                <div class="col-sm-9">
                  <id="po"><b>Purchase Order (PO)</b></id="po">
                  
                </div><br/>
                
                <label class="col-sm-3 control-label">Nama Perusahaan Pelanggan:</label>
                <div class="col-sm-9">
                  <input type="text"  class="form-control" name="namapt" id='namapt' placeholder="" value="<?php echo $_SESSION['PO_namapt'];?>" required>
                </div><br/>
                <label class="col-sm-3 control-label">Nomor PO:</label>
                <div class="col-sm-9">
                  <input type="text"  class="form-control" name="nopo" id='nopo' placeholder="" value="<?php echo $_SESSION['PO_nopo'];?>" required>
                </div><br/>
                <label class="col-sm-3 control-label">Tanggal PO:</label>
                <div class="col-sm-9">
                  <input type="date"  class="form-control" name="tglpo" id='tglpo' placeholder="" value="<?php echo $_SESSION['PO_tglPO'];?>" required>
                </div><br/>
                <label class="col-sm-3 control-label">Penandatangan PO:</label>
                <div class="col-sm-9">
                  <input type="text"  class="form-control" name="ttdpo" id='ttdpo' placeholder="" value="<?php echo $_SESSION['PO_ttdpo'];?>" required>
                </div><br/>
                <label class="col-sm-3 control-label">Tipe Mobil yang Dipesan:</label>
                <div class="col-sm-9">
                  <select class="form-control m-bot15" name="tipemobil" id='tipemobil' required>
                    <option value="">--Pilih Salah Satu--</option>
                    <option value="Toyota Avanza 1.3 G M/T">Toyota Avanza 1.3 G M/T</option>
                    <option value="Toyota Avanza 1.3 G A/T">Toyota Avanza 1.3 G A/T</option>
                    <option value="Toyota Avanza Veloz 1.5 G M/T">Toyota Avanza Veloz 1.5 G M/T</option>
                    <option value="Toyota Avanza Veloz 1.5 G A/T">Toyota Avanza Veloz 1.5 G A/T</option>
                    <option value="Toyota Innova M/T">Toyota Innova M/T</option>
                    <option value="Toyota Innova A/T">Toyota Innova A/T</option>
                    <option value="Honda Mobilio M/T">Honda Mobilio M/T</option>
                    <option value="Honda Mobilio A/T">Honda Mobilio A/T</option>
                    <option value="Daihatsu Terios M/T">Daihatsu Terios M/T</option>
                    <option value="Daihatsu Terios A/T">Daihatsu Terios A/T</option>
                  </select>
                </div><br/>
                <label class="col-sm-3 control-label">Tahun Pembuatan Mobil:</label>
                <div class="col-sm-9">
                  <select class="form-control m-bot15" name="tahun" id='tahun' required>
                    <option value="">--Pilih Salah Satu--</option>
                    <option value="brand new">Brand New</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                  </select>
                </div><br/>
                <label class="col-sm-3 control-label">Jumlah Unit Mobil:</label>
                <div class="col-sm-9">
                  <input type="text"  class="form-control" name="jmlunit" id='jmlunit' placeholder="" value="<?php echo $_SESSION['PO_jmlunit'];?>" required>
                </div><br/>
                <label class="col-sm-3 control-label">Tanggal Pengiriman Mobil:</label>
                <div class="col-sm-9">
                  <input type="date"  class="form-control" name="tglkirim" id='tglkirim' placeholder="" value="<?php echo $_SESSION['PO_tglkirim'];?>" required>
                </div><br/>
                <label class="col-sm-3 control-label">Biaya Rental per Bulan:</label>
                <div class="col-sm-9">
                  <input type="text"  class="form-control" name="biaya" id='biaya' placeholder="" value="<?php echo $_SESSION['PO_biaya'];?>" required>
                </div><br/>
                <label class="col-sm-3 control-label">Detail Pesanan:</label>
                <div class="col-sm-9">
                  <input type="text"  class="form-control" name="detail" id='detail' placeholder="" value="<?php echo $_SESSION['PO_detail'];?>" required>
                </div><br/>
               </div>
                
               <!--<form id="filebastk" class="form-horizontal " role="form" action="filepo.php"  method="POST" >-->
                  <label class="col-sm-3 control-label">Masukkan Dokumen PO:</label>
                  <div class="col-sm-9">
                    <input type="file" name="filepo" required>
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