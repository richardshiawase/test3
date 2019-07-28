<?php

// mkdir("testfolder");

// if(!is_dir($folderName)){
// 	mkdir($folderName,0755);
// }

$time=date('d-m-Y');
$counter = 0; 

// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";
$filepolis=$_POST['filepolis'];
$namaFile = $_FILES['filepolis']['name'];
$namaSementara = $_FILES['filepolis']['tmp_name'];
// tentukan lokasi file akan dipindahkan
$dirUpload = "C:/file/polis/";
$folderName="C:/file/polis/".$time."/";

if(!is_dir($dirUpload)){
	echo "bikin folder";
	mkdir("C:/file/polis");

}else {

	if(!is_dir($folderName)){
		echo "bikin tanggal";
		mkdir("C:/file/polis/".$time);
	}
	do{
		$counter+=1;
		$terupload = move_uploaded_file($namaSementara, $folderName.$namaFile."_".$counter++);
		if ($terupload) {
	    echo "Upload berhasil!<br/>";
    	// echo "Link: <a href='".$dirUpload.$namaFile..$namaFile."</a>";
		} else {
    		echo "Upload Gagal!";
				}	
				
	}while(file_exists($folderName));
		
}



// if(file_exists($folderName)){
// 		//$counter.="duplicate";
// 		echo "ada file di dalam bosss";
// 		$terupload = move_uploaded_file($namaSementara, $folderName.$namaFile.$counter);
	
		
// 	} 
	// $targetdir = $folderName;
	// $terupload = move_uploaded_file($namaSementara, $folderName.$namaFile.$counter);
	
		


?>