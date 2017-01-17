    <div class="blackOut">
    <div class="jumbotron p" style="position:absolute;z-index:1001;text-align: center;background-color: transparent;width: 100%">
      <div class="container">
        <h1>Welcome to Eventagious</h1>
        <h4>
          We want to reach out to both people who would like to 
          create events as well as those who want to attend events. On this site, users will be able to make an event and specify what
          kind of event it is, where it's located, make a description of the event and put a cool picture to lure people.
        </h4>
        <p>
        
        <?php if(!empty($_SESSION['user_id'])){
          echo ("<a class=\"btn btn-secondary btn-lg\" href=\"index.php?action=map\" role=\"button\">Map &raquo;</a>");
          echo ("<a class=\"btn btn-secondary btn-lg\" href=\"index.php?action=myPage\" role=\"button\">My Page &raquo;</a>");
          echo ("<a class=\"btn btn-secondary btn-lg\" href=\"index.php?action=createevent\" role=\"button\">Create an event &raquo;</a>");
        }else{
          echo ("<a class=\"btn btn-secondary btn-lg\" href=\"index.php?action=map\" role=\"button\">Map &raquo;</a>");
          echo ("<a class=\"btn btn-secondary btn-lg\" href=\"index.php?action=login\" role=\"button\">Login &raquo;</a>");
          echo ("<a class=\"btn btn-secondary btn-lg\" href=\"index.php?action=register\" role=\"button\">Register &raquo;</a>");
        }
        ?>
        </p>

      </div>
    </div>

    
    <div style="position:absolute;z-index:1000;">
        <img src="/assets/img/bg_1.png" alt="/assets/img/bg_1.png" style="width:100%;height: 100%">
    </div>
    </div>
      <div class="container">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->


    <!-- Maps scrips -->

   
  </div>