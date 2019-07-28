<?php
$mongo = new MongoDB\Client('mongodb://my_server_does_not_exist_here:27017');
$dbs = $mongo->listDatabases();
?>