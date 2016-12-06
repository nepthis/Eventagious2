<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){

      if (isset($_POST['userfile[]'],$_POST['EventID'] )) {
      	$tmpfile = $_FILES['userfile']['tmp_name'];
		$filename = basename($_FILES['userfile']['name']);
		$filetype=$_FILES['userfile']['type']
		$EventID = $_POST['EventID'];

		$cfile = curl_file_create($_FILES['userfile']['tmp_name'],$_FILES['userfile']['type'],$_FILES['userfile']['name']);

	    $data=array(
	    'EventID' => $EventID,
	    'file' => $cfile
	    );

		$url = 'https://eventagious3.appspot.com/api/?insert_img=1';
	    $ch = curl_init($url);
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $response_json = curl_exec($ch);
	    curl_close($ch);
	    $response=json_decode($response_json, true);

	    if ($response['status']==1){
	        header('Location: index.php?action=myPage');
	        exit;
	    }else if ($response['status']==0){
	        echo "Det gick fel någonstans! försök igen";
	    }
	  	}else{
	    	echo "Allt är inte ifyllt";
	  	}


    }