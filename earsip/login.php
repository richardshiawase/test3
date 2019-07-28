<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST['username']) && isset($_POST['userPassword'])){
    $username = ($_POST['username']);
    $password = ($_POST['userPassword']);
    // $pass_hash = md5($password);
    if(empty($username)){
        header("Location:index1.php");
        //die("Empty or invalid email address");
    }
    if(empty($password)){
        header("Location:index1.php");
        //die("Enter your password");
    }
    $con = new MongoClient();
    // Select Database
    if($con){
        $db = $con->earsip;
        // Select Collection
        $collection = $db->users;   // you may use 'admin' instead of 'Admin'
        $qry = array("username" => $username, "password" => $password);
        $result = $collection->findOne($qry);
      
        if(!empty($result)){
             $_SESSION['admin'] = $result['username'];
            if($_SESSION['admin'] == "admit") {
                header("Location:menu1.php");
                // echo "You are logged with admit";
            } else if ($_SESSION['admin'] == "admstock") {
                     header("Location:menu.php");
            } else if ($_SESSION['admin'] == "admsales") {
                 header("Location:menu.php");
            }
        }else{
            header("Location:index1.php");
            //echo "Wrong combination of username and password";
        }
    }else{
        die("Mongo DB not connected!");
    }

    }
}
?>