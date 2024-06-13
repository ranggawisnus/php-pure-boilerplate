<?php

$env = file_get_contents(__DIR__."/.env");
$lines = explode("\n",$env);

foreach($lines as $line){
  preg_match("/([^#]+)\=(.*)/",$line,$matches);
  if(isset($matches[2])){
    putenv(trim($line));
  }
} 

$db_host = "127.0.0.1";
$db_user = trim(trim(getenv('DB_USER'), '"'), "'");
$db_pass = trim(trim(getenv('DB_PASS'), '"'), "'");
$db_name = trim(trim(getenv('DB_NAME'), '"'), "'");

try {    
    //create PDO connection 
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch(PDOException $e) {
    //show error
    die("Terjadi masalah: " . $e->getMessage());
}