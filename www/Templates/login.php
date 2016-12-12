<?php
        if (!empty($error_msg)) {
            //echo $error_msg;
        }
    ?>
  <center>
  <div class="jumbotron p" style="position:absolute;z-index:1001;text-align: center;background-color: transparent;">
      <div class="container">
        <h1>Login to Eventagious</h1>
      </div>
    </div>
  <div class="input-group" style="position:absolute;z-index:1001; ">
      <!--<div class="media-left">
        <a href="#">
         <img class="media-object" style="height: 50px" src="assets/img/google.jpg" alt="">
        </a>
      </div>-->

      <!--<form action="login" method="post" name="login_form">                      
            username: <input type="text" name="username" id="username"/>
            Password: <input type="password" name="password" id="password"/>
            <input type="button" 
                   value="Login" 
                   onclick="form.submit();" /> 
        </form>-->


    <div class="container">
      <form action="login" method="post">
        <div class="input-group input-group-lg" style="width:50%; padding-top: 175">
          <span class="input-group-addon" id="sizing-addon1">@</span>
          <input type="text" class="form-control" name="username" id="username" placeholder="username" aria-describedby="sizing-addon1">
        </div>
        <div class="input-group input-group-lg" style="width:50%">
          <span class="input-group-addon" id="sizing-addon2">@</span>
          <input type="password" class="form-control" name="password" id="password" placeholder="password" aria-describedby="sizing-addon1">
        </div>

        <input class="btn btn-primary"
          type="button" 
                     value="Login" 
                     onclick="form.submit();" /> 
      </form>
    </div>
  </div>
</center>

  <div style="position:absolute;z-index:1000;">
      <img src="/assets/img/bg_4.png" alt="/assets/img/bg_4.png" style="width:100%;height: 94%">
  </div>
  
