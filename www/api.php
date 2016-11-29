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
      // Retrive Products
      if(!empty($_GET["event_id"]))
      {
        $event_id=intval($_GET["event_id"]);
        get_events($event_id);
      }
      else
      {
        echo json_encode("fel i get");
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
      }
      break;
    case 'PUT':
      //update event
      if(!empty($_GET["event"]))
      {
          update_Event();
      }
      //update User to User table
       else if(!empty($_GET["user"]))
      {
        update_User();
      }
      break;
    case 'DELETE':
      //delete event
      if(!empty($_GET["event"]))
      {
          $event_id=intval($_GET["event_id"]);
          delete_Event($event);
      }
      //delete User to User table
       else if(!empty($_GET["user"]))
      {
        $user=intval($_GET["user"]);
        delete_User($user);
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

    $sth = $connection->prepare('INSERT INTO Event
          SET UserID=:UserID,Longitude=:Longitude,Latitude=:Latitude,Adress=:Adress,Description=:Description,Section=:Section');
    //$sth->bindParam(':EventID',$EventID);
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
  function get_events($product_id=0){ 
    $eventID = $product_id;
    global $connection;
    //$query="SELECT * FROM events";
    if($eventID != 0)
    {
      $sth = $connection->prepare('SELECT *
          FROM Events
          WHERE EventID = :id');
    }else{
      $sth = $connection->prepare('SELECT *
          FROM events');
    }
    $response=array();
    $sth->bindParam(':id',$eventID);
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
          WHERE userid = :id');
      
    }else{
      $sth = $connection->prepare('SELECT *
          FROM members');
    }
    $sth->bindParam(':id',$UserID);
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
          Where EventID=:EventID');
    $sth->bindParam(':EventID',$EventID);
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


function update_Event($product_id)
  {
    global $connection;
    parse_str(file_get_contents("php://input"),$post_vars);
    $EventID=$_POST["EventID"];
    $UserID=$_POST["UserID"];
    $Longitude=$_POST["Longitude"];
    $Latitude=$_POST["Latitude"];
    $Adress=$_POST["Adress"];
    $Description=$_POST["Description"];
    $Section=$_POST["Section"];

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
        'status_message' =>'Product Updated Successfully.'
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
    parse_str(file_get_contents("php://input"),$post_vars);
    $id=$_POST["id"];
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $firstname=$_POST["firstname"];
    $surname=$_POST["surname"];
    $adress=$_POST["adress"];
    $section=$_POST["section"];

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
        'status_message' =>'Product Updated Successfully.'
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
  function update_EventLocation($product_id)
  {
    global $connection;
    parse_str(file_get_contents("php://input"),$post_vars);
    $EventID=$_POST["EventID"];
    $Longitude=$_POST["Longitude"];
    $Latitude=$_POST["Latitude"];
    $sth = $connection->prepare('UPDATE Event
          SET UserID=:UserID,Longitude=:Longitude,Latitude=:Latitude
          WHERE EventID=:EventID');

    $sth->bindParam(':EventID',$EventID);
    $sth->bindParam(':Longitude',$Longitude);
    $sth->bindParam(':Latitude',$Latitude);

    if($sth->execute())
    {
      $response=array(
        'status' => 1,
        'status_message' =>'Product Updated Successfully.'
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

  // Close database connection
  mysqli_close($connection);