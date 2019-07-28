<?php 
include 'connects.php';
mongoConnect();
session_start();
if ($_SESSION['admin']== "admit"){

	$m = new mongoClient();

	$nopol2=$_POST['nopol'];
	$nopol=str_replace(" ", "", trim($nopol2));
	//$nopol=strtolower($nopol1);
	$tipemobil=$_POST['tipemobil'];
	$tglhabis=$_POST['tglhabis'];
	$masaberlaku = date('Y-m-d', strtotime($tglhabis));
	$time=date('Y-m-d');
	$kode=uniqid();
	$cari=array("stnk", $nopol, $tipemobil, $masaberlaku, $_SESSION['admin'], $time, $kode);
	$kodeawal=$_SESSION['kode'];

	$namaFile3 = $_FILES['filestnk']['name'];
	$namaSementara3 = $_FILES['filestnk']['tmp_name'];
	$dirUpload3 = "C:/xampp/htdocs/earsip/file/stnk/";
	$folderName3="C:/xampp/htdocs/earsip/file/stnk/".$time."/";
	$newfilename = "stnk"."_".$nopol."_edited.pdf";
	if(!is_dir($dirUpload3)){
		echo "bikin folder";
		mkdir("C:/xampp/htdocs/earsip/file/stnk/");

	}else {

		if(!is_dir($folderName3)){
			echo "bikin tanggal";
			mkdir("C:/xampp/htdocs/earsip/file/stnk/".$time);
			$terupload3 = move_uploaded_file($namaSementara3, $folderName3.$newfilename);
		}
		else {
			$terupload3 = move_uploaded_file($namaSementara3, $folderName3.$newfilename);
			if ($terupload3) {
	    		echo "Upload berhasil!<br/>";
    			//echo "Link: <a href='".$dirUpload.$namaFile..$namaFile."</a>";
			} else {
    			echo "Upload Gagal!";
				}	
		}			
	}
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
	$collection->insert(array("jenisdok"=>"stnk", "nopol"=>$nopol, "tipemobil"=>$tipemobil, "masaberlaku"=>$masaberlaku, "uploadby"=>$_SESSION['admin'], "tglupload"=>$time, "namafile"=>$newfilename, "lokasi"=>$folderName3, "kode"=>$kode,"cari"=>$cari));

	/*if ($_SESSION['admin']== "admstock") {
		header("Location:upload.php");
	}
	else if ($_SESSION['admin']== "admit" ) {
		header("Location:upload1.php");
	}*/
	$collection->remove(array("kode"=>$kodeawal));
	header("Location:editsukses.php");
}

//$filebastk=$_POST['filebastk'];

else {
  header("Location:notfound.php");
}

?>