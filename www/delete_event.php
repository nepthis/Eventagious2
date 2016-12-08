<?php 
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		echo "Test!";
	$EventID=$_POST["EventID"];


	$url = 'https://eventagious3.appspot.com/api/?event_id='.$EventID.;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $responseEvent=json_decode($response_json, true);

    if ($response['status']==1){
        header('Location: index.php?action=admin');
        exit;
    }else if ($response['status']==0){
        echo "Det gick fel någonstans! försök igen";
    }
  	}else{
    	echo "Allt är inte ifyllt";
  	}



















}

?>