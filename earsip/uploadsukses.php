<?php
include 'connects.php';
mongoConnect();
session_start();
if($_SESSION['admin']=="admit") {
	echo "<h2> Upload dokumen berhasil! </h2>";
	header("refresh:3;upload1.php");
}
else {
	echo "<h2> Upload dokumen berhasil! </h2>";
	header("refresh:3;upload.php");
}
?>