<?php
include 'connects.php';
mongoConnect();
session_start();

$m = new mongoClient();
$db=$m->earsip;
$collection=$db->documents;

if($_SESSION['admin']=="admit") {
	$collection->remove(array("kode"=>$_SESSION['kode'])); 
	header("Location:deletesukses.php");
}
else {
	header("Location:notfound.php");
}
?>
