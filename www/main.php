<?php  
include "PHPscript.php";

sec_session_start();


if (!isset($_SESSION['login'])) {
      //header('Location: https://eventagious3.appspot.com/login');
      //exit;
    }


include("Templates/header.php");   
// Set the default name 
$action = 'index';

// Specify some disallowed paths 
$disallowed_paths = array('header', 'footer'); 
if (!empty($_GET['action'])) { 
    $tmp_action = basename($_GET['action']); 
    // If it's not a disallowed path, and if the file exists, update $action 
    if (!in_array($tmp_action, $disallowed_paths) && file_exists("Templates/{$tmp_action}.php")){
        $action = $tmp_action; 
      }
} 
// Include $action 
$tempString = "Templates/" .$action . ".php"; 
include($tempString); 

include("Templates/footer.php");






 
