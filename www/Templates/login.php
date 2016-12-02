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

      <!--<form action="login" method="post" name="login_form">                      
            username: <input type="text" name="username" id="username"/>
            Password: <input type="password" name="password" id="password"/>
            <input type="button" 
                   value="Login" 
                   onclick="form.submit();" /> 
        </form>-->
  
  <div class="container">
    <form action="event/login" method="post">
      <div class="input-group input-group-lg">
        <span class="input-group-addon" id="sizing-addon1">@</span>
        <input type="text" class="form-control" name="username" id="username" placeholder="username" aria-describedby="sizing-addon1">
      </div>
      <div class="input-group input-group-lg" style="padding-top: 5px">
        <span class="input-group-addon" id="sizing-addon2">@</span>
        <input type="text" class="form-control" name="password" id="password" placeholder="password" aria-describedby="sizing-addon1">
      </div>

      <input type="button" 
                   value="login" 
                   onclick="form.submit();" /> 
    </form>
  </div>

      <a class="btn btn-primary" href="http://localhost:8080/register" role="button">Register</a>
      
  </div>
  </center>
