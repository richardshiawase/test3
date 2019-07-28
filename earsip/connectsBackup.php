<?php
@session_start();

function connect(){
	$server = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'first_db';
$conn = mysqli_connect($server,$user,$pass,$db);
	if (!$conn){
		mysqli_connect_error(die());
	} else return $conn;
}

function checklogin($conn,$username){ //to check login authenticity
	$query = "SELECT * FROM users where username = '$username'";
	$result = mysqli_query($conn,$query);
		if(!$result){
			die();
		} else
		{
			if(mysqli_num_rows($result)>0) {
				while ($row = mysqli_fetch_assoc($result)){
					$_SESSION['username'] = $row['username'];
				}
				header('Location: index.php');
			} else {
				echo "login gagal";
			}
		}
}


function insertQuery($conn,$article){
	$date = date("Y-m-d");
	$query = "INSERT INTO article (article,date)  VALUES ('$article','$date')";
	$result = mysqli_query($conn,$query);
	if(!$result) {
		die();
		print '<script>alert("Query gagal")</script>';
	} else 
	{
		print '<script>alert("Insert berhasil")</script>';
		
	}
}
?>