	  <center>

      <div id="Registration">
      <fieldset style="width:30%"><legend>Registration Form</legend>
      <table border="0">
        <tr>
        <form method="POST" action="register">
        <td>Username</td><td> <input type="text" name="username"></td>
        </tr>
        <tr>
        <td>Email</td><td> <input type="text" name="email"></td>
        </tr>
        <tr>
        <td>Password</td><td> <input type="password" name="password"></td>
        </tr>
        <tr>
        <td>First name</td><td> <input type="text" name="firstname"></td>
        </tr>
        <tr>
        <td>Surname</td><td><input type="text" name="surname"></td>
        </tr>
        <tr>
        <td>Adress</td><td><input type="text" name="adress"></td>
        </tr>
        <tr>
        <td>Section</td><td><input type="text" name="section"></td>
        </tr>
        <tr>
        <td><input id="button" type="submit" name="submit" value="Submit"></td>
        </tr>
      </form>
      </table>
      </fieldset>
    </div>
	  </center>
      <div class="container">
    <form action="register.php" method="POST">
      <div class="input-group input-group-lg">
        <span class="input-group-addon" id="sizing-addon1">@</span>
        <input type="text" class="form-control" name="username" id="username" placeholder="username" aria-describedby="sizing-addon1">
      </div>
      <div class="input-group input-group-lg" style="padding-top: 5px">
        <span class="input-group-addon" id="sizing-addon2">@</span>
        <input type="text" class="form-control" name="email" id="email" placeholder="E-mail" aria-describedby="sizing-addon1">
      </div>
      <div class="input-group input-group-lg" style="padding-top: 5px">
        <span class="input-group-addon" id="sizing-addon2">@</span>
        <input type="password" class="form-control" name="password" id="password" placeholder="password" aria-describedby="sizing-addon1">
      </div>
      <div class="input-group input-group-lg" style="padding-top: 5px">
        <span class="input-group-addon" id="sizing-addon2">@</span>
        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" aria-describedby="sizing-addon1">
      </div>
      <div class="input-group input-group-lg" style="padding-top: 5px">
        <span class="input-group-addon" id="sizing-addon2">@</span>
        <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname" aria-describedby="sizing-addon1">
      </div>
      <div class="input-group input-group-lg" style="padding-top: 5px">
        <span class="input-group-addon" id="sizing-addon2">@</span>
        <input type="text" class="form-control" name="adress" id="adress" placeholder="Adress" aria-describedby="sizing-addon1">
      </div>
      <div class="input-group input-group-lg" style="padding-top: 5px">
        <span class="input-group-addon" id="sizing-addon2">@</span>
        <input type="text" class="form-control" name="section" id="section" placeholder="Section" aria-describedby="sizing-addon1">
      </div>

      <input id="button" type="submit" name="submit" value="submit">
    </form>
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
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
//}
?>