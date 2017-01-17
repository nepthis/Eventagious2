<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if($_REQUEST['username']==''){
      echo "Please fill the username field.";
    }
    else if($_REQUEST['email']==''){
      echo "Please fill the email field.";
    }
    else if($_REQUEST['password']==''){
      echo "Please fill the password field.";
    }
    else if($_REQUEST['firstname']==''){
      echo "Please fill the first name field.";
    }
    else if($_REQUEST['surname']==''){
      echo "Please fill the surname field.";
    }
    else if($_REQUEST['adress']==''){
      echo "Please fill the adress field.";
    }
    else if($_REQUEST['section']==''){
      echo "Please fill the section field.";
    }
    else{
    $username=$_REQUEST["username"];
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];
    $password = password_hash($password, PASSWORD_BCRYPT);
    $firstname=$_REQUEST["firstname"];
    $surname=$_REQUEST["surname"];
    $adress=$_REQUEST["adress"];
    $section=$_REQUEST["section"];

    $data=array(
    'username' => $username,
    'email' => $email,
    'password' => $password,
    'firstname' => $firstname,
    'surname' => $surname,
    'adress' => $adress,
    'section' => $section,
    );

    $url = 'https://eventagious3.appspot.com/api/?user=1';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response=json_decode($response_json, true);

    if($response['status']=1 ){
      header('Location: index.php?action=login',true, 303);
      exit;
    }
    if($response['status']=0 ){
      header('Location: index.php?action=register',true, 303);
      exit;
    }
  }
}
?>