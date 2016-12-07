<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  //$error_msg = "";
    //Funkar inte riktigt som den ska... den gå in i if satsen fast den inte borde göra detta.
  if (isset($_POST['UserID'], $_POST['Eventname'], $_POST['Description'], $_POST['Adress'], $_POST['Longitude'], $_POST['Latitude'], $_POST['Section'], $_POST['EventDate'])) {
    //$Username=$_SESSION["username"];
    $UserID=$_POST["UserID"];
    $Eventname=$_POST["Eventname"];
    $Description=$_POST["Description"];
    $Adress=$_POST["Adress"];
    $Longitude=$_POST["Longitude"];
    $Latitude=$_POST["Latitude"];
    $Section=$_POST["Section"];
    $EventDate=$_POST["EventDate"];

    $data=array(
    'UserID' => $UserID,
    'Longitude' => $Longitude,
    'Latitude' => $Latitude,
    'Adress' => $Adress,
    'Description' => $Description,
    'Section' => $Section,
    'Eventname' => $Eventname,
    'EventDate' => $EventDate,
    );
    $url = 'https://eventagious3.appspot.com/api/?event=1';
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