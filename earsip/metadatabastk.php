<?php 
include 'connects.php';
mongoConnect();
session_start();
if(($_SESSION['admin']== "admstock" ) || ($_SESSION['admin']== "admit")){

	$m = new mongoClient();

	$nopol2=$_POST['nopol'];
	$nopol=str_replace(" ", "", trim($nopol2));
	//$nopol=strtolower($nopol1);
	$tipemobil=$_POST['tipemobil'];
	$km=$_POST['km'];
	$namapt=$_POST['namapt'];
	$namauser=$_POST['namauser'];
	$tglst=$_POST['tglst'];
	$tglserahterima=date('Y-m-d', strtotime($tglst));
	$driver=$_POST['driver'];
	$body=$_POST['body'];
	$time=date('Y-m-d');
	$status=$_POST['status'];
	$kode=uniqid();
	//$namafile="bastk_".$nopol."_".$tglserahterima;
	$cari=array("bastk", $nopol, $tipemobil, $km, $namapt, $namauser, $tglserahterima, $driver, $status, $body, $_SESSION['admin'], $time, $kode);

	$namaFile1 = $_FILES['filebastk']['name'];
	$namaSementara1 = $_FILES['filebastk']['tmp_name'];
	$dirUpload1 = "C:/xampp/htdocs/earsip/file/bastk/";
	$folderName1="C:/xampp/htdocs/earsip/file/bastk/".$time."/";
	$newfilename = "bastk"."_".$nopol."_".$tglserahterima.".pdf";
	if(!is_dir($dirUpload1)){
		echo "bikin folder";
		mkdir("C:/xampp/htdocs/earsip/file/bastk/");

	}else {

		if(!is_dir($folderName1)){
			echo "bikin tanggal";
			mkdir("C:/xampp/htdocs/earsip/file/bastk/".$time);
			$terupload1 = move_uploaded_file($namaSementara1, $folderName1.$newfilename);

		}
		else {
			$terupload1 = move_uploaded_file($namaSementara1, $folderName1.$newfilename);
			if ($terupload1) {
	    		echo "Upload berhasil!<br/>";
    			//echo "Link: <a href='".$dirUpload.$namaFile..$namaFile."</a>";
			} else {
    			echo "Upload Gagal!";
				}	
		}			
	}
	//$namafile=rename("C:/xampp/htdocs/earsip/file/bastk/".$time.$namaFile1, "test");
	/*echo $nopol; 
	echo $tipemobil; 
	echo $km; 
	echo $namapt; 
	echo $namauser; 
	echo $tglst;
	echo $driver;
	echo $body; */
	$db=$m->earsip;
	$collection=$db->documents;
	$collection->insert(array("jenisdok"=>"bastk", "nopol"=>$nopol, "tipemobil"=>$tipemobil, "km"=>$km, "namapt"=>$namapt, "namauser"=>$namauser, "tglserahterima"=>$tglserahterima, "driver"=>$driver, "status"=>$status, "body"=>$body, "uploadby"=>$_SESSION['admin'], "tglupload"=>$time,"namafile"=>$newfilename, "lokasi"=>$folderName1, "kode"=>$kode, "cari"=>$cari));

	/*if ($_SESSION['admin']== "admstock") {
		echo "Upload Berhasil!";
		header("Location:upload.php");
	}
	else if ($_SESSION['admin']== "admit" ) {
		header("Location:upload1.php");
	}*/
	header("Location:uploadsukses.php");
}

//$filebastk=$_POST['filebastk'];

else {
  header("Location:notfound.php");
}
?>