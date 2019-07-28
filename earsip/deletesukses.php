<?php
include 'connects.php';
mongoConnect();
session_start();
if($_SESSION['admin']=="admit") {
	echo "<h2> Dokumen berhasil dihapus! </h2>";
	header("refresh:3;menudelete.php");
}
else {
	header("Location:notfound.php");
}
?>