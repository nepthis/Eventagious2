<?php
        if (!empty($error_msg)) {
            //echo $error_msg;
        }
    ?>
  <center>
  <div class="input-group" style="content: ">
      <div class="media-left">
        <a href="#">
         <img class="media-object" style="height: 50px" src="assets/img/facebook.png" alt="">
        </a>
        <a href="#">
         <img class="media-object" style="height: 50px" src="assets/img/google.jpg" alt="">
        </a>
      </div>

      <form action="event/login" method="post" name="login_form">                      
            username: <input type="text" name="username" id="username"/>
            Password: <input type="password" name="password" id="password"/>
            <input type="button" 
                   value="Login" 
                   onclick="form.submit();" /> 
      </form>



      <div class="input-group input-group-lg">
        <span class="input-group-addon" id="sizing-addon1">@</span>
        <input type="text" class="form-control" placeholder="email" aria-describedby="sizing-addon1">
      </div>
      <div class="input-group input-group-lg" style="padding-top: 5px">
        <span class="input-group-addon" id="sizing-addon2">@</span>
        <input type="text" class="form-control" placeholder="p" aria-describedby="sizing-addon1">
      </div>

      <a class="btn btn-primary" href="index.php?action=register" role="button">Register</a>
      
  </div>
  </center>
