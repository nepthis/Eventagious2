<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  //$error_msg = "";
    //Funkar inte riktigt som den ska... den gå in i if satsen fast den inte borde göra detta.
  if (isset($_POST['Description'], $_POST['Adress'], $_POST['Longitude'], $_POST['Latitude'], $_POST['Eventname'], $_POST['EventDate'], $_POST['Section'])) {
    //$Username=$_SESSION["username"];
    $UserID=$_POST["UserID"];
    $Description=$_POST["Description"];
    $Adress=$_POST["Adress"];
    $Longitude=$_POST["Longitude"];
    $Latitude=$_POST["Latitude"];
    $Eventname=$_POST["Eventname"];
    $EventDate=$_POST["EventDate"];
    $Section=$_POST["Section"];

    $data=array(
    'UserID' => $UserID,
    'Longitude' => $Longitude,
    'Latitude' => $Latitude,
    'Adress' => $Adress,
    'Description' => $Description,
    'Eventname' => $Eventname,
    'EventDate' => $EventDate,
    'Section' => $Section,
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
        $_SESSION['errorEvent'] = "wrong in event";
        header('Location: index.php?action=createevent');
        exit;
    }
  }else{
    echo "Allt är inte ifyllt";
  }
}