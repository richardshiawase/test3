<?php 
include 'connects.php';
mongoConnect();
session_start();
if(($_SESSION['admin']=="admsales") || ($_SESSION['admin']== "admit")){

	$m = new mongoClient();

	$namapt1=$_POST['namapt'];
	$namapt=str_replace(" ", "", trim($namapt1));
	$nopo=$_POST['nopo'];
	$tglpo=$_POST['tglpo'];
	$tglPO=date('Y-m-d', strtotime($tglpo));
	$ttdpo=$_POST['ttdpo'];
	$tipemobil=$_POST['tipemobil'];
	$tahun=$_POST['tahun'];
	$jmlunit=$_POST['jmlunit'];
	$tglkirim=$_POST['tglkirim'];
	$tgldelivery=date('Y-m-d', strtotime($tglkirim));
	$biaya=$_POST['biaya'];
	$detail=$_POST['detail'];
	$time=date('Y-m-d');
	$kode=uniqid();
	$cari=array("PO", $namapt, $nopo, $tglPO, $ttdpo, $tipemobil, $tahun, $jmlunit, $tgldelivery, $biaya, $detail, $_SESSION['admin'], $time, $kode);

	$namaFile1 = $_FILES['filepo']['name'];
	$namaSementara1 = $_FILES['filepo']['tmp_name'];
	$dirUpload1 = "C:/xampp/htdocs/earsip/file/po/";
	$folderName1="C:/xampp/htdocs/earsip/file/po/".$time."/";
	$newfilename = "PO"."_".$namapt."_".$nopo.".pdf";
	if(!is_dir($dirUpload1)){
		echo "bikin folder";
		mkdir("C:/xampp/htdocs/earsip/file/po/");

	}else {

		if(!is_dir($folderName1)){
			echo "bikin tanggal";
			mkdir("C:/xampp/htdocs/earsip/file/po/".$time);
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
	$collection->insert(array("jenisdok"=>"PO", "namapt"=>$namapt, "nopo"=>$nopo, "tglPO"=>$tglPO, "ttdpo"=>$ttdpo, "tipemobil"=>$tipemobil, "tahun"=>$tahun, "jmlunit"=>$jmlunit, "tgldelivery"=>$tgldelivery, "biaya"=>$biaya, "detail"=>$detail, "uploadby"=>$_SESSION['admin'], "tglupload"=>$time, "namafile"=>$newfilename, "lokasi"=>$folderName1, "kode"=>$kode, "cari"=>$cari));

	/*if ($_SESSION['admin']=="admsales") {
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