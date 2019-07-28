<?php

include 'connects.php';
mongoConnect();
session_start();
if(($_SESSION['admin']=="admsales") || ($_SESSION['admin']== "admstock" || ($_SESSION['admin']== "admmit")){

echo $_SESSION['admin'];
}
else {
	header("Location:notfound.php");
}
?>