<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){

      //if (isset($_POST['file[]'],$_POST['EventID'])) {

		$EventID = $_POST['EventID'];



		$url = 'https://eventagious3.appspot.com/api/?insert_img=1';
		$header = array('Content-Type: multipart/form-data');
		$fields = array('EventID' => $EventID,'file' => '@' . $_FILES['file']['tmp_name'][0]);
		 
		$resource = curl_init();
		curl_setopt($resource, CURLOPT_URL, $url);
		curl_setopt($resource, CURLOPT_HTTPHEADER, $header);
		curl_setopt($resource, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($resource, CURLOPT_POST, 1);
		curl_setopt($resource, CURLOPT_POSTFIELDS, $fields);
		$response_json = json_decode(curl_exec($resource));
		curl_close($resource);

		$response=json_decode($response_json, true);
		echo $response['original'];
		print_r($response);






		//$cfile = curl_file_create($_FILES['file']['tmp_name'][0],$_FILES['file']['type'][0],$_FILES['file']['name'][0]);
		/*$data = array('EventID' => 'EventID', 'file' => '@/home/user/test.png');


		$url = 'https://eventagious3.appspot.com/api/?insert_img=1';
	    $ch = curl_init($url);
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $response_json = curl_exec($ch);
	    curl_close($ch);*/
	    
	    /*$response=json_decode($response_json, true);

	    if ($response['status']==1){
	        header('Location: index.php?action=myPage');
	        exit;
	    }else if ($response['status']==0){
	        echo "Det gick fel någonstans! försök igen";
	    }
	  	/*}else{
	    	echo "Allt är inte ifyllt";
	  	}*/


    }