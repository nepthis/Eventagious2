<?php
    //include_once "database.php";
    //$init = parse_ini_file('configUrl.ini');


    //https://www.apptha.com/blog/how-to-build-a-rest-api-using-php/

    function sec_session_start() {
    $session_name = 'sec_session_id';   // Set a custom session name
    /*Sets the session name. 
     *This must come before session_set_cookie_params due to an undocumented bug/feature in PHP. 
     */
    session_name($session_name);
 
    $secure = true;
    // This stops JavaScript being able to access the session id.
    $httponly = true;
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
 
    session_start();            // Start the PHP session 
    session_regenerate_id(true);    // regenerated the session, delete the old one. 
    }


      function login($username, $password) {
    // Using prepared statements means that SQL injection is not possible. 
      $username = $username;
      //$HashAndSalt = password_hash($password, PASSWORD_BCRYPT);
      $url = 'https://eventagious3.appspot.com/api/?user_id_username='.$username.'';
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_HTTPGET, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response_json = curl_exec($ch);
      curl_close($ch);
      $response=json_decode($response_json, true);

      $user_id = $response[0]['id']; //Or do what ever instead of echo
      $db_password = $response[0]['password'];
      $db_isAdmin = $response[0]['isAdmin'];

      /*$sth = $database->prepare('SELECT id, password
          FROM members
          WHERE username = :username');
      $sth->bindParam(':username',$username);
      $sth->execute();

    while($r = $sth->fetch()){
    $user_id = $r['id']; //Or do what ever instead of echo
    $db_password = $r['password'];
    }*/
        if (sizeof($response) == 1) {
            // If the user exists we check if the account is locked
            // from too many login attempts 
            if(false){
            //if (checkbrute($user_id,$database) == true) {
                // Account is locked 
                // Send an email to user saying their account is locked
                $_SESSION['errorGard'] = "brutforcGard";
                return false;
            } else {
                // Check if the password in the database matches
                // the password the user submitted. We are using
                // the password_verify function to avoid timing attacks.'

                //if (password_verify($password, $db_password)) {
                if (password_verify($password, $db_password)){
                //if ($password === $db_password) {
                    
                    // Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS protection as we might print this value
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);

                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['isAdmin'] = $db_isAdmin;

                    // XSS protection as we might print this value
                    //$username = preg_replace("/[^a-zA-Z0-9_\-]+/","",$username);

                    //$_SESSION['username'] = $username;
                    //$_SESSION['login_string'] = hash('sha512',$db_password . $user_browser);

                    // Login successful.
                    return true;
                } else {

                    $_SESSION['errorPassword'] = "wrong password";
                    // Password is not correct
                    // We record this attempt in the database
                    $now = time();
                    //Måste fixa
                    /*$database->query("INSERT INTO login_attempts(user_id, time)
                                    VALUES ('$user_id', '$now')");*/
                    return false;
                }
            }
        

    }else{
        $_SESSION['errorUser'] = "no user";
        return false;
    }
}


/*

function checkbrute($user_id, $database) {
    // Get timestamp of current time 
    $now = time();
 
    // All login attempts are counted from the past 2 hours. 
    $valid_attempts = $now - (2 * 60 * 60);
 
    if ($stmt = $database->prepare("SELECT time 
                             FROM login_attempts 
                             WHERE user_id = :userid 
                            AND time > '$valid_attempts'")) {
        $stmt->bindParam(':userid', $user_id);
 
        // Execute the prepared query. 
        $stmt->execute();
 
        // If there have been more than 5 failed logins 
        if ($stmt->rowCount() > 5) {
            return true;
        } else {
            return false;
        }
    }
}
*/

/*
function login_check($database) {
    // Check if all session variables are set 
    if (isset($_SESSION['user_id'], 
                        $_SESSION['username'], 
                        $_SESSION['login_string'])) {
 
        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];
 
        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
 
        if ($stmt = $database->prepare("SELECT password 
                                      FROM members 
                                      WHERE id = :userid  LIMIT 1")) {
            // Bind "$user_id" to parameter. 
            $stmt->bind_param(':userid', $user_id);
            $stmt->execute();   // Execute the prepared query.
            $stmt->store_result();
 
            if ($stmt->num_rows == 1) {
                // If the user exists get variables from result.
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);
 
                if (hash_equals($login_check, $login_string) ){
                    // Logged In!!!! 
                    return true;
                } else {
                    // Not logged in 
                    return false;
                }
            } else {
                // Not logged in 
                return false;
            }
        } else {
            // Not logged in 
            return false;
        }
    } else {
        // Not logged in 
        return false;
    }
}

*/




