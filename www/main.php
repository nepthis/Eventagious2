<?php  
include_once "PHPscript.php";
sec_session_start();

echo $_SESSION['username'];
echo "Test";
if (empty($_SESSION['username'])){
	echo "empty";
}else{
	echo "Den ar inte tomm";
}
if (isset($_SESSION['username'])) {
	echo "isset";
	# code...
}else{
	echo "Den ar inte issset";
}


if (!isset($_SESSION['username'])) {
		include("Templates/header_login.php"); 
    }else{
    	include("Templates/header.php"); 
    }


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





 
