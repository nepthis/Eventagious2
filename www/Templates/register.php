    <div class="jumbotron p" style="position:absolute;z-index:1001;text-align: center;background-color: transparent;width: 100%">
        <div class="container">
          <h1>Register to Eventagious</h1>
        </div>
      </div>

      <center>
        <div class="input-group" style="position:absolute;z-index:1001;padding-top: 175;width: 100% ">
          <div class="container" >
            <form action="register" method="POST">
          <?php 
          if($_SESSION['errorUserReg'] == "User exist"){
            echo "<h3>The username already exist, Please try a new one</h3>";
            $_SESSION['errorUserReg'] = "";
          }
          ?>
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

