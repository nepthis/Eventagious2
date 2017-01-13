    <div class="jumbotron p" style="position:absolute;z-index:1001;text-align: center;background-color: transparent;width: 100%">
        <div class="container">
          <h1>Register to Eventagious</h1>
        </div>
      </div>

      <center>
        <div class="input-group" style="position:absolute;z-index:1001;padding-top: 175;width: 100% ">
          <div class="container" >
            <form action="index.php?action=register" method="POST">
              <div class="input-group input-group-lg" style="width:50%; ">
                <span class="input-group-addon" id="sizing-addon1">@</span>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" aria-describedby="sizing-addon1">
              </div>
              <div class="input-group input-group-lg" style="width:50%;">
                <span class="input-group-addon" id="sizing-addon2">@</span>
                <input type="text" class="form-control" name="email" id="email" placeholder="E-mail" aria-describedby="sizing-addon1">
              </div>
              <div class="input-group input-group-lg" style=" width:50%;">
                <span class="input-group-addon" id="sizing-addon2">@</span>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" aria-describedby="sizing-addon1">
              </div>
              <div class="input-group input-group-lg" style=" width:50%;">
                <span class="input-group-addon" id="sizing-addon2">@</span>
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First name" aria-describedby="sizing-addon1">
              </div>
              <div class="input-group input-group-lg" style=" width:50%;">
                <span class="input-group-addon" id="sizing-addon2">@</span>
                <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname" aria-describedby="sizing-addon1">
              </div>
              <div class="input-group input-group-lg" style=" width:50%;">
                <span class="input-group-addon" id="sizing-addon2">@</span>
                <input type="text" class="form-control" name="adress" id="adress" placeholder="Adress" aria-describedby="sizing-addon1">
              </div>
              <div class="input-group input-group-lg" style=" width:50%;">
                <span class="input-group-addon" id="sizing-addon2">@</span>
                <input type="text" class="form-control" name="section" id="section" placeholder="Section" aria-describedby="sizing-addon1">
              </div>
              <input class="btn btn-primary" id="button" type="submit" name="submit" value="Submit">
            </form>
          </div>
        </div>
      </center>

  <div style="position:absolute;z-index:1000;">
      <img src="/assets/img/festivalgirl.png" alt="/assets/img/bg_4.png" style="width:100%;height: 94%">
  </div>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){

  /*
  Gör om felhantering
  */

  //$error_msg = "";
  //if(isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['firstname'], $_POST['surname'], $_POST['adress'], $_POST['section'])) {
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
    
  }
}
?>