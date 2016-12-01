<?php

/*$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($path == '/help') {
  echo 'This is some help text.';
  exit;
};
*/


// Connect to database
  $dsn = 'mysql:unix_socket=/cloudsql/eventagious3:us-central1:mysql;dbname=EventagiousProject';
  $user = 'root';
  $pass = 'root123';

  $connection = new PDO($dsn,$user,$pass);

  $request_method=$_SERVER["REQUEST_METHOD"];
  switch($request_method)
  {
    case 'GET':
      //Retrive User Id
      if(!empty($_GET["user_id"]))
      {
        $user_id=intval($_GET["user_id"]);
        get_user($user_id);
      }
      //Get the username and password
      else if(!empty($_GET["user_id_password"]))
      {
        $username=intval($_GET["user_id_username"]);
        get_user_password($username);
      }
      // Retrive event
      else if(!empty($_GET["event_id"]))
      {
        $event_id=intval($_GET["event_id"]);
        get_event($event_id);
      }
      else if(!empty($_GET["user_id_events"]))
      {
        $user_id=intval($_GET["user_id_events"]);
        get_All_events($user_id);
      }      
      else
      {
        echo json_encode("fel i GET");
      }
      break;
    case 'POST':
      //Insert Event to event table
      if(!empty($_GET["event"]))
      {
          insert_Event();
      }
      //Insert User to User table
       else if(!empty($_GET["user"]))
      {
        insert_User();
      }else{
        echo json_encode("fel i POST");
      }
      break;
    case 'PUT':
      //update event
      if(!empty($_GET["event_id"]))
      {
          $event_id=intval($_GET["event_id"]);
          update_Event($event_id);
      }
      else if(!empty($_GET["eventLocation_id"]))
      {
        $eventLocation_id=intval($_GET["eventLocation_id"]);
        update_EventLocation($eventLocation_id);
      }
      //update User to User table
       else if(!empty($_GET["user_id"]))
      {
        $user_id=intval($_GET["user_id"]);
        update_User($user_id);
      }
      else
      {
        echo json_encode("fel i PUT");
      }
      break;
    case 'DELETE':
      //delete event
      if(!empty($_GET["event_id"]))
      {
          $event_id=intval($_GET["event_id"]);
          delete_Event($event_id);
      }
      //delete User to User table
       else if(!empty($_GET["user_id"]))
      {
        $user_id=intval($_GET["user_id"]);
        delete_User($user_id);
      }else
      {
        echo json_encode("fel i DELETE");
      }
      break;

    default:
      // Invalid Request Method
      header("HTTP/1.0 405 Method Not Allowed");
      break;
  }

  function insert_Event()
  {
    global $connection;
    //$EventID=$_POST["EventID"];
    $UserID=$_POST["UserID"];
    $Longitude=$_POST["Longitude"];
    $Latitude=$_POST["Latitude"];
    $Adress=$_POST["Adress"];
    $Description=$_POST["Description"];
    $Section=$_POST["Section"];
    $Eventname=$_POST["Eventname"];

    $sth = $connection->prepare('INSERT INTO Event
          SET UserID=:UserID,Longitude=:Longitude,Latitude=:Latitude,Adress=:Adress,Description=:Description,Section=:Section,Eventname=:Eventname');
    //$sth->bindParam(':EventID',$EventID);
    $sth->bindParam(':UserID',$UserID);
    $sth->bindParam(':Longitude',$Longitude);
    $sth->bindParam(':Latitude',$Latitude);
    $sth->bindParam(':Adress',$Adress);
    $sth->bindParam(':Description',$Description);
    $sth->bindParam(':Section',$Section);
    $sth->bindParam(':Eventname',$Eventname);

    if($sth->execute())
    {
      $response=array(
        'status' => 1,
        'status_message' =>'Product Added Successfully.'
      );
    }
    else
    {
      $response=array(
        'status' => 0,
        'status_message' =>'Product Addition Failed.'
      );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }

  function insert_User()
  {
    global $connection;
    //$id=$_POST["id"];
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $firstname=$_POST["firstname"];
    $surname=$_POST["surname"];
    $adress=$_POST["adress"];
    $section=$_POST["section"];

    $sth = $connection->prepare('INSERT INTO members
          SET username=:username,email=:email,password=:password,firstname=:firstname,surname=:surname,adress=:adress,section=:section');
    //$sth->bindParam(':id',$id);
    $sth->bindParam(':username',$username);
    $sth->bindParam(':email',$email);
    $sth->bindParam(':password',$password);
    $sth->bindParam(':firstname',$firstname);
    $sth->bindParam(':surname',$surname);
    $sth->bindParam(':adress',$adress);
    $sth->bindParam(':section',$section);

    if($sth->execute())
    {
      $response=array(
        'status' => 1,
        'status_message' =>'Product Added Successfully.'
      );
    }
    else
    {
      $response=array(
        'status' => 0,
        'status_message' =>'Product Addition Failed.'
      );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }


  // get function for events
  function get_All_events($product_id=0){ 
    $UserID = $product_id;
    global $connection;
    //$query="SELECT * FROM events";
    if($UserID != 0)
    {
      $sth = $connection->prepare('SELECT *
          FROM Event
          WHERE UserID = :id');
      $sth->bindParam(':id',$UserID);
      
    }else{
      $sth = $connection->prepare('SELECT *
          FROM Event');
    }
    
    $response=array();
    $sth->execute();

    while($r = $sth->fetch())
    {
      $response[]=$r;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }

  // get function for events
  function get_event($product_id=0){ 
    $EventID = $product_id;
    global $connection;
    //$query="SELECT * FROM events";
    if($EventID != 0)
    {
      $sth = $connection->prepare('SELECT *
          FROM Event
          WHERE EventID = :id');
      $sth->bindParam(':id',$EventID);
      
    }else{
      $sth = $connection->prepare('SELECT *
          FROM Event');
    }
    
    $response=array();
    $sth->execute();

    while($r = $sth->fetch())
    {
      $response[]=$r;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }


  // get function for user
  function get_user($product_id=0)
  { 
    $UserID = $product_id;
    global $connection;
    //$query="SELECT * FROM events";
    if($UserID != 0)
    {
      $sth = $connection->prepare('SELECT *
          FROM members
          WHERE id = :id');
      $sth->bindParam(':id',$UserID);
      
    }else{
      $sth = $connection->prepare('SELECT *
          FROM members');
    }
    
    $response=array();
    $sth->execute();

    while($r = $sth->fetch())
    {
      $response[]=$r;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }
  //Get the password and username
  function get_user_password($product_id=0)
  { 
    $username = $product_id;
    global $connection;
    //$query="SELECT * FROM events";
    if($UserID != 0)
    {
      $sth = $connection->prepare('SELECT id, password
          FROM members
          WHERE username = :username');
      $sth->bindParam(':username',$username);
      
    }else{
      echo json_encode("Fel i passorden");
    }
    
    $response=array();
    $sth->execute();

    while($r = $sth->fetch())
    {
      $response[]=$r;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }



  function delete_User($product_id)
  {
    global $connection;
    $id = $product_id;

    $sth = $connection->prepare('DELETE FROM members
          Where id=:id');
    $sth->bindParam(':id',$id);
    if($sth->execute())
    {
      $response=array(
        'status' => 1,
        'status_message' =>'Product Deleted Successfully.'
      );
    }
    else
    {
      $response=array(
        'status' => 0,
        'status_message' =>'Product Deletion Failed.'
      );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }




  function delete_Event($product_id)
  {
    global $connection;
    $EventID = $product_id;

    $sth = $connection->prepare('DELETE FROM Event
          Where EventID=:id');
    $sth->bindParam(':id',$EventID);
    if($sth->execute())
    {
      $response=array(
        'status' => 1,
        'status_message' =>'Event Deleted Successfully.'
      );
    }
    else
    {
      $response=array(
        'status' => 0,
        'status_message' =>'Event Deletion Failed.'
      );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }


function update_Event($product_id)
  {
    global $connection;
    $EventID = $product_id;

    parse_str(file_get_contents("php://input"),$post_vars);

    $UserID=$post_vars["UserID"];
    $Longitude=$post_vars["Longitude"];
    $Latitude=$post_vars["Latitude"];
    $Adress=$post_vars["Adress"];
    $Description=$post_vars["Description"];
    $Section=$post_vars["Section"];

    $sth = $connection->prepare('UPDATE Event
          SET UserID=:UserID,Longitude=:Longitude,Latitude=:Latitude,Adress=:Adress,Description=:Description,Section=:Section
          WHERE EventID=:EventID');

    $sth->bindParam(':EventID',$EventID);
    $sth->bindParam(':UserID',$UserID);
    $sth->bindParam(':Longitude',$Longitude);
    $sth->bindParam(':Latitude',$Latitude);
    $sth->bindParam(':Adress',$Adress);
    $sth->bindParam(':Description',$Description);
    $sth->bindParam(':Section',$Section);

    if($sth->execute())
    {
      $response=array(
        'status' => 1,
        'status_message' =>'Product Updated Successfully Event.'
      );
    }
    else
    {
      $response=array(
        'status' => 0,
        'status_message' =>'Product Updation Failed.'
      );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }



  function update_User($product_id)
  {
    global $connection;
    $id = $product_id;

    parse_str(file_get_contents("php://input"),$post_vars);

    $username=$post_vars["username"];
    $email=$post_vars["email"];
    $password=$post_vars["password"];
    $firstname=$post_vars["firstname"];
    $surname=$post_vars["surname"];
    $adress=$post_vars["adress"];
    $section=$post_vars["section"];

    $sth = $connection->prepare('UPDATE members
          SET username=:username,email=:email,password=:password,firstname=:firstname,surname=:surname,adress=:adress,section=:section
          WHERE id=:id');
    $sth->bindParam(':id',$id);
    $sth->bindParam(':username',$username);
    $sth->bindParam(':email',$email);
    $sth->bindParam(':password',$password);
    $sth->bindParam(':firstname',$firstname);
    $sth->bindParam(':surname',$surname);
    $sth->bindParam(':adress',$adress);
    $sth->bindParam(':section',$section);

    if($sth->execute())
    {
      $response=array(
        'status' => 1,
        'status_message' =>'User Updated Successfully.'
      );
    }
    else
    {
      $response=array(
        'status' => 0,
        'status_message' =>'User Updated Failed.'
      );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }

  function update_EventLocation($product_id)
  {
    global $connection;
    $EventID=$product_id;

    parse_str(file_get_contents("php://input"),$post_vars);

    $Longitude=$post_vars["Longitude"];
    $Latitude=$post_vars["Latitude"];


    $sth = $connection->prepare('UPDATE Event
          SET Longitude=:Longitude,Latitude=:Latitude
          WHERE EventID=:EventID');

    $sth->bindParam(':EventID',$EventID);
    $sth->bindParam(':Longitude',$Longitude);
    $sth->bindParam(':Latitude',$Latitude);


    if($sth->execute())
    {
      $response=array(
        'status' => 1,
        'status_message' =>'Event Loc Updated Successfully.'
      );
    }
    else
    {
      $response=array(
        'status' => 0,
        'status_message' =>'Event Loc Updation Failed.'
      );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }

  // Close database connection
  mysqli_close($connection);