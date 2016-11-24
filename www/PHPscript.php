<?php
    include_once "database.php";

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


      function login($email, $password, $database) {
    // Using prepared statements means that SQL injection is not possible. 
      $mail = $email;
      $sth = $database->prepare('SELECT id, username, password
          FROM members
          WHERE email = :mail');
      $sth->bindParam(':mail',$mail);
      $sth->execute();

      //bara test om de går att skriva ut eler inte

/*
    $stmt = $database->prepare('SELECT id, username, password
          FROM members
          WHERE email = :mail')
    $stmt->bindParam(':mail', $mail);  // Bind "$email" to parameter.
    $stmt->execute();    // Execute the prepared query.

        echo "innan utskrift ";
        foreach($stmt as $row) {
        echo 'row';
        print_r($row);
      }*/

    $user_id = mysql_result($sth, 0);
    $username = mysql_result($sth, 1);
    $db_password = mysql_result($sth, 2);
    echo $user_id;
    echo $username;
    echo $db_password;
      //Storar värderna 
    //$sth->store_result();
        // get variables from result.
    //$sth->bind_result($user_id, $username, $db_password);
    //$sth->fetch();



        if ($stmt->num_rows == 1) {
            // If the user exists we check if the account is locked
            // from too many login attempts 
 
            if (checkbrute($user_id) == true) {
                // Account is locked 
                // Send an email to user saying their account is locked
                echo "kollar brute";
                return false;
            } else {
                // Check if the password in the database matches
                // the password the user submitted. We are using
                // the password_verify function to avoid timing attacks.'
                echo "kollar om password";
                if (password_verify($password, $db_password)) {
                    
                    echo "Login funkar!";
                    return true;


/*
                    // Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS protection as we might print this value
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    // XSS protection as we might print this value
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", 
                                                                "", 
                                                                $username);
                    $_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha512', 
                              $db_password . $user_browser);
                    $_SESSION['adress'] = $adress;
                    $_SESSION['section'] = $section;
                    // Login successful.
*//*
                    return true;
                } else {
                    // Password is not correct
                    // We record this attempt in the database
                    $now = time();
                    $db->query("INSERT INTO login_attempts(user_id, time)
                                    VALUES ('$user_id', '$now')");
                    return false;*/
                }
            }
        

    }else{
        echo "fel atal rader";
        //return false;
    }
}



function checkbrute($user_id, $database) {
    // Get timestamp of current time 
    $now = time();
 
    // All login attempts are counted from the past 2 hours. 
    $valid_attempts = $now - (2 * 60 * 60);
 
    if ($stmt = $database->prepare("SELECT time 
                             FROM login_attempts 
                             WHERE user_id = :userid 
                            AND time > '$valid_attempts'")) {
        $stmt->bind_param(':userid', $user_id);
 
        // Execute the prepared query. 
        $stmt->execute();
        $stmt->store_result();
 
        // If there have been more than 5 failed logins 
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    }
}



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


//Oklart
/*
function esc_url($url) {
 
    if ('' == $url) {
        return $url;
    }
 
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
 
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
 
    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }
 
    $url = str_replace(';//', '://', $url);
 
    $url = htmlentities($url);
 
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
 
    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}
*/



