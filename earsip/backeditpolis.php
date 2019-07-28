<?php 
include 'connects.php';
mongoConnect();
session_start();
if($_SESSION['admin']== "admit"){

	$m = new mongoClient();
	//$filepolis=$_POST['filepolis'];
	$time=date('Y-m-d');
	$nopol2=$_POST['nopol'];
	$nopol=str_replace(" ", "", trim($nopol2));
	//$nopol=strtolower($nopol1);
	$tipemobil=$_POST['tipemobil'];
	$namaasuransi=$_POST['namaasuransi'];
	$nopolis=$_POST['nopolis'];
	$premi=$_POST['premi'];
	$tglashabis=$_POST['tglashabis'];
	$masaberlaku = date('Y-m-d', strtotime($tglashabis));
	$kode=uniqid();
	$kodeawal=$_SESSION['kode'];

	$cari=array("polis", $nopol, $tipemobil, $namaasuransi, $nopolis, $premi, $masaberlaku, $_SESSION['admin'], $time, $kode);

	//$counter = 0; 
	$namaFile = $_FILES['filepolis']['name'];
	$namaSementara = $_FILES['filepolis']['tmp_name'];
	$dirUpload = "C:/xampp/htdocs/earsip/file/polis/";
	$folderName="C:/xampp/htdocs/earsip/file/polis/".$time."/";
	$newfilename = "polis"."_".$nopol."_edited.pdf";
	if(!is_dir($dirUpload)){
		echo "bikin folder";
		mkdir("C:/xampp/htdocs/earsip/file/polis/");

	}else {

		if(!is_dir($folderName)){
			echo "bikin tanggal";
			mkdir("C:/xampp/htdocs/earsip/file/polis/".$time);
			$terupload = move_uploaded_file($namaSementara, $folderName.$newfilename);
		}
		else {	
			$terupload = move_uploaded_file($namaSementara, $folderName.$newfilename);
			if ($terupload) {
	    		echo "Upload berhasil!<br/>";
    			//echo "Link: <a href='".$dirUpload.$namaFile..$namaFile."</a>";
			} else {
    			echo "Upload Gagal!";
				}	
		}		
		
	}

	/*if (!file_exists($file)) {
		$targetdir = 'C:/file/polis/'+$time;
		if (move_uploaded_file($file, $targetdir)){
	 		}
	}

	/*$targetdir = "C:/file/polis/";
	$targetfile = $targetdir.$_FILES[$file][$nopol];
  	if (move_uploaded_file($_FILES[$file][$nopol], $targetfile)) {
    	// file uploaded succeeded
  	} else { 
    	// file upload failed
  	}*/

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
	$collection->insert(array("jenisdok"=>"polis", "nopol"=>$nopol, "tipemobil"=>$tipemobil, "namaasuransi"=>$namaasuransi, "nopolis"=>$nopolis, "premi"=>$premi, "masaberlaku"=>$masaberlaku, "uploadby"=>$_SESSION['admin'], "tglupload"=>$time, "namafile"=>$newfilename, "lokasi"=>$folderName, "kode"=>$kode, "cari"=>$cari));

	/*if (($_SESSION['admin']== "admstock")) {
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