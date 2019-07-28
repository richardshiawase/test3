<?php 
include 'connects.php';
mongoConnect();
session_start();
if(($_SESSION['admin']=="admsales") || ($_SESSION['admin']== "admstock")){

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
  <img src="logomobirentkecil.jpg" / align="center" >
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" type="text/css" href="jquery-easyui-1.6.4/themes/default/easyui.css">
  <link rel="stylesheet" type="text/css" href="jquery-easyui-1.6.4/themes/icon.css">
  <script type="text/javascript" src="jquery-easyui-1.6.4/jquery.min.js"></script>
  <script type="text/javascript" src="jquery-easyui-1.6.4/jquery.easyui.min.js"></script>
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
    <a class="nav-link active" href="menu.php"><h6><b>Cari Dokumen</b></h6></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="upload.php"><h6>Upload Dokumen</h6></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="folder.php"><h6>Folder Dokumen</h6></a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="notifikasi.php"><h6>Notifikasi</h6></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php"><h6>Logout</h6></a>
  </li>

</ul>
<nav class="navbar navbar-light bg-light">
<form class="form-inline" action="hasilcari.php" action="editbastk.php"  method="POST">
      <input class="form-control mr-sm-2" type="text" aria-label="Search" placeholder="<keyword>" name="searchTxt" id="searchTxt">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
    </form>
</nav>
<!--<nav class="navbar navbar-light bg-light">
  <form class="form-inline" > 
      </form> -->
  <nav class="navbar navbar-light bg-light">
        <?php

        if($_SERVER["REQUEST_METHOD"] == "POST"){
          $search=$_POST['searchTxt'];
          
          $elements = explode(" ", $search);
          $hitung=count($elements);
          //echo $hitung;
          $m = new mongoClient();
          $db=$m->earsip;
          $collection=$db->documents;
          $regex = new MongoRegex("/^$search/i");
          $searchdoc = array('cari' => $regex);
          if ($search==null) {
            echo "Masukkan keyword terlebih dahulu!";
          }
          elseif ($search!=null) {
          if ($hitung===1) {
              $cursor = $collection->find($searchdoc);
            }
          elseif ($hitung===2) {
            $param1=$elements[0];
            $param2=$elements[1]; 
            //if ($jenisdok==="PO" || $jenisdok==="kontrak") {
                $searchQuery = array(
                    '$and' => array(
                      array(
                        'cari' =>new MongoRegex("/^$elements[0]/i"),
                        ),
                      array(
                        'cari' => new MongoRegex("/^$elements[1]/i"),
                        ),
                      )
                    );
                 $cursor = $collection->find($searchQuery);
           }
           elseif ($hitung===3) {
            $param1=$elements[0];
            $param2=$elements[1]; 
            $param3=$elements[2];
            //if ($jenisdok==="PO" || $jenisdok==="kontrak") {
                $searchQuery = array(
                    '$and' => array(
                      array(
                        'cari' =>new MongoRegex("/^$elements[0]/i"),
                        ),
                      array(
                        'cari' => new MongoRegex("/^$elements[1]/i"),
                        ),
                      array(
                        'cari' => new MongoRegex("/^$elements[2]/i"),
                        ),
                      )
                    );
                 $cursor = $collection->find($searchQuery);
           }
           elseif ($hitung===4) {
            $param1=$elements[0];
            $param2=$elements[1]; 
            $param3=$elements[2];
            $param4=$elements[3];
            //if ($jenisdok==="PO" || $jenisdok==="kontrak") {
                $searchQuery = array(
                    '$and' => array(
                      array(
                        'cari' =>new MongoRegex("/^$elements[0]/i"),
                        ),
                      array(
                        'cari' => new MongoRegex("/^$elements[1]/i"),
                        ),
                      array(
                        'cari' => new MongoRegex("/^$elements[2]/i"),
                        ),
                      array(
                        'cari' => new MongoRegex("/^$elements[3]/i"),
                        ),
                      )
                    );
                 $cursor = $collection->find($searchQuery);
           }
           elseif ($hitung===5) {
            $param1=$elements[0];
            $param2=$elements[1]; 
            $param3=$elements[2];
            $param4=$elements[3];
            $param5=$elements[4];
            //if ($jenisdok==="PO" || $jenisdok==="kontrak") {
                $searchQuery = array(
                    '$and' => array(
                      array(
                        'cari' =>new MongoRegex("/^$elements[0]/i"),
                        ),
                      array(
                        'cari' => new MongoRegex("/^$elements[1]/i"),
                        ),
                      array(
                        'cari' => new MongoRegex("/^$elements[2]/i"),
                        ),
                      array(
                        'cari' => new MongoRegex("/^$elements[3]/i"),
                        ),
                      array(
                        'cari' => new MongoRegex("/^$elements[4]/i"),
                        ),
                      )
                    );
                 $cursor = $collection->find($searchQuery);
           }
           elseif ($hitung===6) {
            $param1=$elements[0];
            $param2=$elements[1]; 
            $param3=$elements[2];
            $param4=$elements[3];
            $param5=$elements[4];
            $param5=$elements[5];
            //if ($jenisdok==="PO" || $jenisdok==="kontrak") {
                $searchQuery = array(
                    '$and' => array(
                      array(
                        'cari' =>new MongoRegex("/^$elements[0]/i"),
                        ),
                      array(
                        'cari' => new MongoRegex("/^$elements[1]/i"),
                        ),
                      array(
                        'cari' => new MongoRegex("/^$elements[2]/i"),
                        ),
                      array(
                        'cari' => new MongoRegex("/^$elements[3]/i"),
                        ),
                      array(
                        'cari' => new MongoRegex("/^$elements[4]/i"),
                        ),
                      array(
                        'cari' => new MongoRegex("/^$elements[5]/i"),
                        ),
                      )
                    );
                 $cursor = $collection->find($searchQuery);
           }
          
          //json_encode($cursor);
          foreach ($cursor as $doc) {
            //$nopol=strtoupper($nopol);
            if($doc['jenisdok']=="bastk"){
                                //$_SESSION['bastk_id'] = $doc['_id'];

                                $_SESSION['bastk_jenisdok'] = $doc['jenisdok'];
                                $_SESSION['bastk_nopol'] = $doc['nopol'];
                                $_SESSION['bastk_tipemobil'] = $doc['tipemobil'];
                                $_SESSION['bastk_km'] = $doc['km'];
                                $_SESSION['bastk_namapt'] = $doc['namapt'];
                                $_SESSION['bastk_namauser']= $doc['namauser'];
                                $_SESSION['bastk_tglserahterima'] = $doc['tglserahterima'];
                                $_SESSION['bastk_driver'] = $doc['driver'];
                                $_SESSION['bastk_body'] = $doc['body'];
                                $_SESSION['bastk_status'] = $doc['status'];
                                $_SESSION['bastk_uploadby'] = $doc['uploadby'];
                                $_SESSION['bastk_tglupload'] = $doc['tglupload'];
                                $_SESSION['bastk_kode'] = $doc['kode'];
                                ?>
                                <div class="jumbotron" style="position:relative; display:inline-block; background-color:lightblue">
                                <?php
                                //$nopol=strtoupper('nopol');
                                echo "Jenis Dokumen       : ".$doc['jenisdok']."<br>";
                                echo "Nomor Polisi        : ".$doc['nopol']."<br>";
                                echo "Tipe Mobil          : ".$doc['tipemobil']."<br>";
                                echo "KM                  : ".$doc['km']."<br>";
                                echo "Nama PT             : ".$doc['namapt']."<br>";
                                echo "Nama User           : ".$doc['namauser']."<br>";
                                echo "Tanggal Serah Terima: ".$doc['tglserahterima']."<br>";
                                echo "Nama Driver ALS     : ".$doc['driver']."<br>";
                                echo "Status              : ".$doc['status']."<br>";
                                echo "Kondisi Body        : ".$doc['body']."<br>";
                                echo "Upload by           : ".$doc['uploadby']."<br>";
                                echo "Tanggal Upload      : ".$doc['tglupload']."<br>";
                                echo "Kode Dokumen : ".$doc['kode']."<br>";
                                //echo "Nama file: ".$doc['namafile']."<br>";
                                //echo $doc['lokasi'];
                                ?>
                                <br />
                                <br />
                                <a class="btn btn-info" href="/earsip/file/bastk/<?php echo $doc['tglupload'];?>/<?php echo $doc['namafile']; ?>" download>Download</a>
                           
                                <!-- <a class="btn btn-info" href="/earsip/editbastk.php" >Edit</a></form> -->
                                 <a class="btn btn-outline-success my-2 my-sm-0" href="editbastk.php">Edit</a>
                                <!-- <a href="C:/file/bastk/2018-10-01/testdownload_1.txt" download>Download file ini</a> -->
                                </div>
                                <?php
           }
           else if($doc['jenisdok']=="PO"){
                                $_SESSION['PO_jenisdok'] = $doc['jenisdok'];
                                $_SESSION['PO_namapt'] = $doc['namapt'];
                                $_SESSION['PO_nopo'] = $doc['nopo'];
                                $_SESSION['PO_tglPO'] = $doc['tglPO'];
                                $_SESSION['PO_ttdpo'] = $doc['ttdpo'];
                                $_SESSION['PO_tipemobil']= $doc['tipemobil'];
                                $_SESSION['PO_tahun'] = $doc['tahun'];
                                $_SESSION['PO_jmlunit'] = $doc['jmlunit'];
                                $_SESSION['PO_tgldelivery'] = $doc['tgldelivery'];
                                $_SESSION['PO_biaya'] = $doc['biaya'];
                                $_SESSION['PO_detail'] = $doc['detail'];
                                $_SESSION['PO_uploadby'] = $doc['uploadby'];
                                $_SESSION['PO_tglupload'] = $doc['tglupload'];
                                $_SESSION['PO_kode'] = $doc['kode'];
            ?><div class="jumbotron" style="position:relative; display:inline-block; background-color:rgb(115, 255, 216)"><?php
                                echo "Jenis Dokumen    : ".$doc['jenisdok']."<br>";
                                echo "Nama PT          : ".$doc['namapt']."<br>";
                                echo "Nomor PO         : ".$doc['nopo']."<br>";
                                echo "Tanggal PO       : ".$doc['tglPO']."<br>";
                                echo "Penandatangan PO : ".$doc['ttdpo']."<br>";
                                echo "Tipe Mobil       : ".$doc['tipemobil']."<br>";
                                echo "Tahun Mobil      : ".$doc['tahun']."<br>";
                                echo "Jumlah Unit      : ".$doc['jmlunit']."<br>";
                                echo "Tanggal Delivery : ".$doc['tgldelivery']."<br>";
                                echo "Biaya Rental/bln : ".$doc['biaya']."<br>";
                                echo "Detail Order     : ".$doc['detail']."<br>";
                                echo "Upload by        : ".$doc['uploadby']."<br>";
                                echo "Tanggal Upload   : ".$doc['tglupload']."<br>";
                                echo "Kode Dokumen     : ".$doc['kode']."<br>";  ?>
                                <br />
                                <br />
                                <a class="btn btn-info" href="/earsip/file/po/<?php echo $doc['tglupload'];?>/<?php echo $doc['namafile']; ?>" download>Download</a>
                                <a class="btn btn-outline-success my-2 my-sm-0" href="editpo.php">Edit</a>
                                </div>
                                <?php

              }
              else if ($doc['jenisdok']=="stnk") {
                                $_SESSION['stnk_jenisdok'] = $doc['jenisdok'];
                                $_SESSION['stnk_nopol'] = $doc['nopol'];
                                $_SESSION['stnk_tipemobil'] = $doc['tipemobil'];
                                $_SESSION['stnk_masaberlaku']=$doc['masaberlaku'];
                                $_SESSION['stnk_uploadby'] = $doc['uploadby'];
                                $_SESSION['stnk_tglupload'] = $doc['tglupload'];
                                $_SESSION['stnk_kode'] = $doc['kode'];
                 ?><div class="jumbotron" style="position:relative; display:inline-block; background-color:rgb(252, 182, 193)"><?php
                                echo "Jenis Dokumen : ".$doc['jenisdok']."<br>";
                                echo "Nomor Polisi : ".$doc['nopol']."<br>";
                                echo "Tipe Mobil : ".$doc['tipemobil']."<br>";
                                echo "Masa Berlaku s/d : ".$doc['masaberlaku']."<br>";
                                echo "Upload by : ".$doc['uploadby']."<br>";
                                echo "Tanggal Upload : ".$doc['tglupload']."<br>";
                                echo "Kode Dokumen : ".$doc['kode']."<br>"; ?>
                                <br />
                                <br />
                                <a class="btn btn-info" href="/earsip/file/stnk/<?php echo $doc['tglupload'];?>/<?php echo $doc['namafile']; ?>" download>Download</a>
                                <a class="btn btn-outline-success my-2 my-sm-0" href="editstnk.php">Edit</a>
                </div><?php
              }
              else if($doc['jenisdok']=="polis"){
                                $_SESSION['polis_jenisdok'] = $doc['jenisdok'];
                                $_SESSION['polis_nopol'] = $doc['nopol'];
                                $_SESSION['polis_tipemobil'] = $doc['tipemobil'];
                                $_SESSION['polis_masaberlaku']=$doc['masaberlaku'];
                                $_SESSION['polis_namaasuransi']=$doc['namaasuransi'];
                                $_SESSION['polis_nopolis']=$doc['nopolis'];
                                $_SESSION['polis_premi']=$doc['premi'];
                                $_SESSION['polis_uploadby'] = $doc['uploadby'];
                                $_SESSION['polis_tglupload'] = $doc['tglupload'];
                                $_SESSION['polis_kode'] = $doc['kode'];
                ?><div class="jumbotron" style="position:relative; display:inline-block; background-color:rgb(240, 230, 140)"><?php
                                echo "Jenis Dokumen : ". $doc['jenisdok']."<br>";
                                echo "Nomor Polisi : ".$doc['nopol']."<br>";
                                echo "Tipe Mobil : ".$doc['tipemobil']."<br>";
                                echo "Nama Asuransi : ".$doc['namaasuransi']."<br>";
                                echo "Nomor Polis : ".$doc['nopolis']."<br>";
                                echo "Premi Asuransi : ".$doc['premi']."<br>";
                                echo "Masa Berlaku s/d : ".$doc['masaberlaku']."<br>";
                                echo "Upload by : ".$doc['uploadby']."<br>";
                                echo "Tanggal Upload : ".$doc['tglupload']."<br>";
                                echo "Kode Dokumen : ".$doc['kode']."<br>";
                                ?>
                                <br />
                                <br />
                                <a class="btn btn-info" href="/earsip/file/polis/<?php echo $doc['tglupload'];?>/<?php echo $doc['namafile']; ?>" download>Download</a>
                                <a class="btn btn-outline-success my-2 my-sm-0" href="editpolis.php">Edit</a>
                  </div><?php
              }
              else if($doc['jenisdok']=="kontrak"){
                                $_SESSION['kontrak_jenisdok'] = $doc['jenisdok'];
                                $_SESSION['kontrak_nokontrak'] = $doc['nokontrak'];
                                $_SESSION['kontrak_namapt']=$doc['namapt'];
                                $_SESSION['kontrak_namattd']=$doc['namattd'];
                                $_SESSION['kontrak_addendum']=$doc['addendum'];
                                $_SESSION['kontrak_tglkontrak']=$doc['tglkontrak'];
                                $_SESSION['kontrak_uploadby']=$doc['uploadby'];
                                $_SESSION['kontrak_tglupload'] = $doc['tglupload'];
                                $_SESSION['kontrak_kode'] = $doc['kode'];
                ?><div class="jumbotron" style="position:relative; display:inline-block; background-color:rgb(254, 228, 225)"><?php

                                echo "Jenis Dokumen : ". $doc['jenisdok']."<br>";
                                echo "Nomor Kontrak : ".$doc['nokontrak']."<br>";
                                echo "Nama PT : ".$doc['namapt']."<br>";
                                echo "Nama Penandatangan : ".$doc['namattd']."<br>";
                                echo "Addendum ke- : ".$doc['addendum']."<br>";
                                echo "Tanggal Kontrak : ".$doc['tglkontrak']."<br>";
                                echo "Upload by : ".$doc['uploadby']."<br>";
                                echo "Tanggal Upload : ".$doc['tglupload']."<br>";
                                echo "Kode Dokumen : ".$doc['kode']."<br>";?>
                                <br />
                                <br />
                                <a class="btn btn-info" href="/earsip/file/kontrak/<?php echo $doc['tglupload'];?>/<?php echo $doc['namafile']; ?>" download>Download</a>
                                <a class="btn btn-outline-success my-2 my-sm-0" href="editkontrak.php">Edit</a>
                  </div>
  </nav>

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

<!-- 
 ?>
            <pre>
              <?php
                //print_r($doc);

              ?>
            </pre>
            <?php //-->