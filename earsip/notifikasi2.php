<?php
session_start();
if($_SESSION['admin']=="admit") {

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
    <a class="nav-link active" href="#"><h6><b>Cari Dokumen</b></h6></a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="upload1.php"><h6>Upload Dokumen</h6></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="menudelete.php"><h6>Edit Dokumen</h6></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="folder1.php"><h6>Folder Dokumen</h6></a>
  </li>
 
  <li class="nav-item">
    <a class="nav-link" href="notifikasi1.php"><h6>Notifikasi</h6></a>
  </li>  
  <li class="nav-item">
    <a class="nav-link" href="monitor.php"><h6>Monitor Disk</h5></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php"><h6>Logout</h6></a>
  </li>
</ul>
<nav class="navbar navbar-light bg-light">


 <?php
          //echo $hitung;
          $m = new mongoClient();
          $db=$m->earsip;
          $collection=$db->documents;
          // $regex = new MongoRegex("/^$search/i");
          $cursor = $collection->find(array('tglupload'=>"2018-10-18"));

           foreach ($cursor as $doc) {
            //$nopol=strtoupper($nopol);
            //echo count($cursor)
             
                                //$nopol=strtoupper('nopol');
                                echo "Jenis Dokumen       : ".$doc['jenisdok']."<br>";
                              
                                echo "Tanggal Upload      : ".$doc['tglupload']."<br>";
                                echo "Dokumen ID      : ".$doc['kode'];
                            

                              // echo $tahun =  (substr($doc['tglupload'],0,4))-date("Y");
                              $date1=date_create($doc['tglupload']);
                // $date2=date_create(date("Y-m-d"));
                $date2 = date_create("2020-10-18");
                $diff=date_diff($date1,$date2);

                // echo $diff->format("%R% days");
                echo $days = $diff->format("%a");

                                //echo "Nama file: ".$doc['namafile']."<br>";
                                //echo $doc['lokasi'];



                switch (true) {
                      case ($days==366) :

                              echo "<br>"."Dokumen dengan id".$doc['kode']." sudah berusia setahun"."<br>";
                              break;
                      case ($days==731 ) :
                              echo "<br>"."Dokumen dengan id".$doc['kode']." sudah berusia 2 tahun"."<br>";
                              break;
                      case ($days==1096):
                              echo "<br>"."Dokumen dengan id".$doc['kode']." sudah berusia 3 tahun"."<br>";
                              break;
                        case ($days==1461):
                              echo "<br>"."Dokumen dengan id".$doc['kode']." sudah berusia 3 tahun"."<br>";
                              break;
                        case ($days==1826):
                              echo "<br>"."Dokumen dengan id".$doc['kode']." sudah berusia 4 tahun"."<br>";
                              break;
                      default:

                    
                    }
                                echo "<br>";

                            
                                ?>
                              
                                            
                           
                              
                                <?php
                               
           }
         
          
         
            
           
       
        
      ?>



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