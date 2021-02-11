<?php
// Remove blow comments from header If  you are making calls from another server
/*
header("Access-Control-Allow-Origin: *");
*/

session_start();
error_reporting(E_ERROR | E_PARSE);
include('conn.php');


 
header('Content-Type: application/json');
error_reporting(0);
//ini_set('display_errors',1);
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "hws";
$q = $_GET['q'];
//$q = $_GET['parent_cat'];
if(isset($q) || !empty($q)) {
    $con = mysqli_connect($hostname, $username, $password, $dbname);
   // SELECT * FROM pet WHERE name LIKE 'b%';
    //$query = "SELECT * FROM masterdate_update WHERE Empid LIKE '%$q%'";
    $query = "SELECT * FROM users WHERE role='Shipper' AND name LIKE '%$q%'";
    //$query = "SELECT * FROM masterdate_update WHERE Empid LIKE '%$q%'";
    $result = mysqli_query($con, $query);
    $res = array();
    while($resultSet = mysqli_fetch_assoc($result)) {
        
        $res[$resultSet['id']]['id'] = $resultSet['Experience']."|".$resultSet['id']."|".$resultSet['no_issue_resolved']."|".$resultSet['id'];
    	
     $res[$resultSet['id']]['value'] =  $resultSet['name'];
    
 
    }
   // if(!$res) {
   //     $res[0] = 'Not found!';
    	
   // }
    echo json_encode($res);
}
 
?>
