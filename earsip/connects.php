<?php

// function connect(){
// 	$server = 'localhost';
// 	$user = 'root';
// 	$pass = '';
// 	$db = 'earsip';
// $conn = mysqli_connect($server,$user,$pass,$db);
// 	if (!$conn){
// 		mysqli_connect_error(die());
// 	} else return $conn;
// }
// function checklogin($conn,$username,$password){ //to check login authenticity
// 	$salt = 'richard12';
// 	$salting = SHA1($salt.$password);
// 	$query = "db.users.find({'admit'})";
// 	$result = mysqli_query($conn,$query);
// 		if(!$result){
// 			die();
// 		} else
// 		{
// 			if(mysqli_num_rows($result)>0) {
// 				while ($row = mysqli_fetch_assoc($result)){
// 					if($row['username'] == $username && $row['password'] == $salting){
// 						$_SESSION['username'] = $row['username'];
// 						return true;
// 					}
// 				} 
// 			} else { //tambahin di sini
// 				return false;
// 			}
// 		}
// }
// function insertQuery($conn,$article){
// 	$date = date("Y-m-d");
// 	$query = "INSERT INTO article (article,date)  VALUES ('$article','$date')";
// 	$result = mysqli_query($conn,$query);
// 	if(!$result) {
// 		die();
// 		print '<script>alert("Query gagal")</script>';
// 	} else 
// 	{
// 		print '<script>alert("Insert berhasil")</script>';
// 	}
// }

function mongoConnect(){
	$server = "mongodb://localhost:27017/earsip";
 
    try{
        // Connecting to server
        $c = new MongoClient( $server);
    }catch(MongoConnectionException $connectionException){
        print $connectionException;
        exit;
    }
}

// function mongoInsert($artikel){
// 	 $server = "mongodb://localhost:27017/earsip";
 
//     try{
//         // Connecting to server
//         $c = new MongoClient( $server );
//     }catch(MongoConnectionException $connectionException){
//         print $connectionException;
//         exit;
//     }
 
//     // Data to be inserted
//     $data = array(
//         "isiArtikel"=>$artikel
        
//     );
 
//     try{
//         // Geting MongoDB
//         $db = $c->uas_dot;
 
//         // Getting MongoCollection
//         $collection = $db->dataArtikel;
//     }catch(MongoException $mongoException){
//         print $mongoException;
//         exit;
//     }
 
//     try{
//         // Inserting data into students collection
//         $ret = $collection->insert($data);
//     }catch(MongoCursorException $mongoCursorException){
//         echo $mongoCursorException;
//         exit;
//     }
 
//     if(is_array($ret)) {
//         if($ret["ok"])
//             echo "Document is inserted successfully";
//         else
//             echo "document insertion failed";
//     }else {
//         if($ret)
//             echo "Document is inserted successfully";
//         else
//             echo "document insertion failed";
//     }
 
//     // Array of data to be inserted
   
    	
        

// }

/*function mongoKomenInsert($artikel){
     $server = "mongodb://localhost:27017/earsip";
 
    try{
        // Connecting to server
        $c = new MongoClient( $server );
    }catch(MongoConnectionException $connectionException){
        print $connectionException;
        exit;
    }
 
    // Data to be inserted
    $data = array(
        "komentar"=>$artikel
        
    );
 
    try{
        // Geting MongoDB
        $db = $c->uas_dot;
 
        // Getting MongoCollection
        $collection = $db->dataArtikel;
    }catch(MongoException $mongoException){
        print $mongoException;
        exit;
    }
 
    try{
        // Inserting data into students collection
        $ret = $collection->insert($data);
    }catch(MongoCursorException $mongoCursorException){
        echo $mongoCursorException;
        exit;
    }
 
    if(is_array($ret)) {
        if($ret["ok"])
            echo "Document is inserted successfully";
        else
            echo "document insertion failed";
    }else {
        if($ret)
            echo "Document is inserted successfully";
        else 
            echo "document insertion failed";
        }
    }*/
 
    // Array of data to be inserted
   
        
        

function tampilUserMongo(){
	$server = "mongodb://localhost:27017/earsip";
 
    try{
        // Connecting to server
        $c = new MongoClient($server);
    }catch(MongoConnectionException $connectionException){
        print $connectionException;
        exit;
    }
 
    $data  = "<table style='border:1px solid red;";
    $data .= "border-collapse:collapse' border='1px'>";
    $data .= "<thead>";
    $data .= "<tr>";
    $data .= "<th>Nama</th>";
   $data .= "<th>Email</th>";
   $data .="<th>Userlevel</th>";
    $data .= "</tr>";
   $data .= "</thead>";
    $data .= "<tbody>";
 
    try{
        $db = $c->earsip;
        $collection = $db->users;
        $cursor = $collection->find();
        foreach($cursor as $document){
            $data .= "<tr>";
           $data .= "<td>" . $document["username"] . "</td>";
            $data .= "<td>" . $document["password"]."</td>";
            $data .= "<td>" . $document["userlevel"]."</td>";
           $data .= "</tr>";
      
        }
        $data .= "</tbody>";
        $data .= "</table>";
        echo $data;
 
    }catch(MongoException $mongoException){
        print $mongoException;
        exit;
    }
}


function loginMongo(){
    $server = "mongodb://localhost:27017/earsip";
 
    try{
        // Connecting to server
        $c = new MongoClient($server);
    }catch(MongoConnectionException $connectionException){
        print $connectionException;
        exit;
    }
 
 
    try{
        $db = $c->earsip;
        $collection = $db->users;
        $cursor = $collection->find();
        foreach($cursor as $document){
            echo $document['password']."<br>";
      
        }
        
 
    }catch(MongoException $mongoException){
        print $mongoException;
        exit;
    }
}

/*function tampilArtikelMongo(){
	$server = "mongodb://localhost:27017/uas_dot";
    $article = 'art00';
    try{
        // Connecting to server
        $c = new MongoClient( $server );
    }catch(MongoConnectionException $connectionException){
        print $connectionException;
        exit;
    }
 
    //$data  = "<table style='border:1px solid red;";
   // $data .= "border-collapse:collapse' border='1px'>";
//    $data .= "<thead>";
 //   $data .= "<tr>";
 //   $data .= "<th>Konten </th>";
   
   
   // $data .= "</tr>";
  //  $data .= "</thead>";
  //  $data .= "<tbody>";
 
    try{
        $db = $c->uas_dot;
        $collection = $db->dataArtikel;
        $cursor = $collection->find();
        $num = 0 ;
        $nom = 0 ; 

        foreach($cursor as $document){
            $num +=1;

            $articleNumber = $article.$num;
            $holder = tampilKomenMongo($articleNumber);
            $data ="<article class=posts>";
            $data.="<h2 class=title-post>Artikel ke-".$num."</h2>";
            $data.="<div class=meta-post></div>";
            $data.="<div class=content>";
            $data.=$document["isiArtikel"]."</div>";
            foreach($holder as $hasil){
            $data.="<div class=content><br>";
            $data.="<h5 class=title-post>Komentar dari ".$hasil["coba2"][0]["nama"]."</h5>";
  
            $data.="<div class=meta-post></div>";
            $data.=$hasil["komentar"]."<br>";

            }

            $data.="</article>";
            
            echo $data;
           $nom+=1;

            $data ="<article class=posts>";
            $data.="<h4 class=title-post>Masukkan komentar</h4>";
            $data.="<div class=content>";
            $data.="<form action=# method=POST>
            <textarea rows=2 cols=50 required=required autofocus=true name=komenTxt></textarea>
            <input type=submit value=submit></form>";
            $data.="</article>";
            echo $data;

            if($_SERVER['REQUEST_METHOD']=='POST') {
        
        $article = $_POST['komenTxt'];

        mongoKomenInsert($article);
    }
 else { 
        
    }

    

       //    print "<pre>";
       //    print_r($hasil);
       //  print "</pre>";
         //   $data .= "</tr>";
        }

     
      //  $data .= "</tbody>";
      //  $data .= "</table>";
        
 
    }catch(MongoException $mongoException){
        print $mongoException;
        exit;
    }
}*/

/*function tampilKomenMongo($articleNumber){
    $server = "mongodb://localhost:27017/uas_dot";
 
    try{
        // Connecting to server
        $c = new MongoClient( $server );
    }catch(MongoConnectionException $connectionException){
        print $connectionException;
        exit;
    }
 
    try{
        $db = $c->uas_dot;
        $collection = $db->dataKomentar;
        $cursor = $collection->aggregate(

            array(
            '$match'=>array('id_artikel'=>$articleNumber

            )),
             
             array(
            '$lookup'=>array(
            'from'=>'dataArtikel',
            'localField'=>'id_artikel',
            'foreignField'=>'id_artikel',
            'as'=>'user')),
        
           array(
            '$lookup'=>array(
                'from'=>'dataPengguna',
                'localField'=>'user_id',
                'foreignField'=>'user_id',
                'as'=>'coba2')  ));
        
        foreach($cursor as $document){
            
      //      $data .= "<tr>";
         //   $data .= "<td>" . $document["isiArtikel"] . "</td>";
        
         for($num=0;$num<count($document);$num++){
         //    $data ="<article class=posts>";
         
           
          //  $data.="<div class=meta-post></div>";
          //  $data.="<div class=content>";
       //       $data.=$document[$i]["komentar"];
       //       $data.=" ";

          //  $data.=$document[$num]["komentar"]."<br>";
          //  $data.=$document[$num]["coba2"][0]["nama"]."</div>";
          //  $data.="</article><br>";
          //  echo $data;
          
           
          //  var_dump($document);
          //  print "<pre>";
           // print_r($document);
          //print "</pre>";
        //   echo "ukuran array".count($document);
         //   echo $data; 
            }
         
         //   $data .= "</tr>";
            return $document;
        }
      //  $data .= "</tbody>";
      //  $data .= "</table>";
        
 
    }catch(MongoException $mongoException){
        print $mongoException;
        exit;
    }
}
?>*/