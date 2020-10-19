<html>
<head>
   <!--Let browser know website is optimized for mobile-->
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <!-- Compiled and minified CSS --> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<!-- Materialize jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> 
<!-- Compiled and minified JavaScript --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<!-- Google Font API --> 
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<script src="js.js"></script>
</head>
<body>
  <div class="container">
    <header>
        <nav>
          <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large" id="hamburger"><i class="material-icons">menu</i></a>
          <img id="logo" src="cosplay_queue_logo-removebg-preview.png">
        </nav>

        <ul id="slide-out" class="sidenav">
        <li><img id="logo-menu" src="cosplay queue logo.png"></li>
        <li><a href="index.php"><i class="material-icons">home</i>Home</a></li>
        <li><a href="joinForm.php"><i class="material-icons">photo_camera</i>Join the Queue</a></li>
        <li><a href="loginForm.php"><i class="material-icons">login</i>Log in</a></li>
        <li><a href="signUpForm.php"><i class="material-icons">create</i>Sign Up</a></li>
      </ul>
    </header>

    <div class="page-title">
      Join the Queue
    </div>
    <div id=form action="#" method="POST"> 
      <div class="row">
            <form class="col s12 m12">
                <div class="input-field col offset-s1 s10" id="name">
                  <i class="material-icons prefix">account_circle</i>
                  <input class="icon_prefix" type="text" id="namei" placeholder="Full Name">
                  <!-- <label for="icon_prefix">Name</label> -->
                </div>

                <div class="input-field col offset-s1 s10" id="username">
                    <i class="material-icons prefix">account_circle</i>
                    <input class="icon_prefix" type="text" id="usernamei" placeholder="Username">
                    <!-- <label for="icon_prefix">Cosplay Name/Username</label> -->
                </div>

                <div class="input-field col offset-s1 s10" id="facebook">
                    <i class="material-icons prefix">facebook</i>
                    <input class="icon_prefix" type="text" id="facebooki" placeholder="Facebook Page (if applicable)">
                  <!-- <label for="icon_prefix">Facebook Page (if applicable)</label>  -->
                </div>

                  <div class="input-field col offset-s1 s10" id="instagram">
                    <i class="material-icons prefix"><img src="https://img.icons8.com/material/24/000000/instagram-new--v1.png"/></i>
                    <input class="icon_prefix" type="text" id="instagrami" placeholder="Instagram Account (if applicable)">
                  <!-- <label for="icon_prefix">Instagram Account (if applicable)</label> -->
                </div>

                <div class="input-field col offset-s1 s10" id="phone">
                    <i class="material-icons prefix">phone</i>
                    <input class="icon_prefix" type="tel" id="phonei" placeholder="Mobile Number">
                  <!-- <label for="icon_prefix">Mobile Number</label> -->
                </div>

                <div class="input-field col offset-s1 s10" id="email">
                    <i class="material-icons prefix">email</i>
                    <input class="icon_prefix" type="text" id="emaili" placeholder="Email Address">
                  <!-- <label for="icon_prefix">Email Address</label> -->
                </div>

                <div class="input-field col offset-s1 s10" id="character">
                    <i class="material-icons prefix">palette</i>
                    <input class="icon_prefix" type="text" id="characterr" placeholder="Character">
                  <!-- <label for="icon_prefix">Character</label> -->
                </div>

                <div class="input-field col offset-s1 s10" id="series">
                    <i class="material-icons prefix">book</i>
                    <input class="icon_prefix" type="text" id="seriesr" placeholder="Series">
                  <!-- <label for="icon_prefix">Series</label> -->
                </div>

                <div class="input-field col offset-s1 s10" id="genre">
                    <i class="material-icons prefix">brush</i>
                    <input class="icon_prefix" type="text" id="genrer" placeholder="Genre">
                  <!-- <label for="icon_prefix">Genre</label> -->
                </div>

                <div class="input-field col offset-s1 s10" id="group">
                    <i class="material-icons prefix">group</i>
                    <input class="icon_prefix" type="text" id="groupr" placeholder="Are you part of a group?">
                  <!-- <label for="icon_prefix">Are you part of a group</label> -->
                </div>

                <form action="" method="post">
                    <div class="file-field input-field col offset-m1 m10">
                      <div class="btn">
                        <span>Upload</span>
                        <input type="file">
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Photo of your costume">
                        <label for ="file-path-wrapper">(This can be a selfie or an image of your character)</label>                      
                      </div>
                    </div>
                  </form>
                  <div class="col s12"></div>
                <button class="btn waves-effect waves-light col offset-s1 m4 modal-trigger" type="submit" name="action" id="submit-btn" href="#modal1">Submit
                  <i class="material-icons right">send</i>
                </button>
              </div>
            </form>
            <div class="divider" ></div>
            <div id="bottom-buttons" class="col s12">
            <a class="waves-effect waves-light btn col s4 m4" id="login-btn" href="loginForm.php"><i class="material-icons left">login</i>Login</a>
            <a class="waves-effect waves-light btn col s4 m4" id="signup-btn" href="signUpForm.php"><i class="material-icons left">create</i>Sign Up</a>
          </div>

          </div>
          </div>
    </div>
  <!-- Modal-->
  <div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>You have successfully joined the queue</h4>
      <p>You are now number 1 in the queue</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
  </div>     
  </div>
</body>
</html>