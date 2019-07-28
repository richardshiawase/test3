<?php 
include 'connects.php';
mongoConnect();
session_start();
if($_SESSION['admin']== "admit"){

	$m = new mongoClient();

	$nokontrak=$_POST['nokontrak'];	
	$namapt1=$_POST['namapt'];
	$namapt=str_replace(" ", "", trim($namapt1));
	$namattd=$_POST['namattd'];
	$tglkontrak=$_POST['tglkontrak'];
	$tglkontrak1=date('Y-m-d', strtotime($tglkontrak));
	$time=date('Y-m-d');
	$addendum=$_POST['addendum'];
	$kode=uniqid();
	$kodeawal=$_SESSION['kode'];

	$cari=array("kontrak", $nokontrak, $namapt, $namattd, $addendum, $tglkontrak1, $_SESSION['admin'], $time, $kode);

	$namaFile2 = $_FILES['filekontrak']['name'];
	$namaSementara2 = $_FILES['filekontrak']['tmp_name'];
	$dirUpload2 = "C:/xampp/htdocs/earsip/file/kontrak/";
	$folderName2="C:/xampp/htdocs/earsip/file/kontrak/".$time."/";
	$newfilename = "kontrak"."_".$namapt."_".$addendum."_edited.pdf";
	if(!is_dir($dirUpload2)){
		echo "bikin folder";
		mkdir("C:/xampp/htdocs/earsip/file/kontrak");

	}else {

		if(!is_dir($folderName2)){
			echo "bikin tanggal";
			mkdir("C:/xampp/htdocs/earsip/file/kontrak/".$time);
			$terupload2 = move_uploaded_file($namaSementara2, $folderName2.$newfilename);
		}
		else {
			$terupload2 = move_uploaded_file($namaSementara2, $folderName2.$newfilename);
			if ($terupload2) {
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
	$collection->insert(array("jenisdok"=>"kontrak", "nokontrak"=>$nokontrak, "namapt"=>$namapt, "namattd"=>$namattd, "addendum"=>$addendum, "tglkontrak"=>$tglkontrak1, "uploadby"=>$_SESSION['admin'], "tglupload"=>$time, "namafile"=>$newfilename, "lokasi"=>$folderName2, "kode"=>$kode, "cari"=>$cari));

	/*if ($_SESSION['admin']=="admsales") {
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