<html>
<head>
     <!--Let browser know website is optimized for mobile-->
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <div class="row">
            <form class="col s12 m12">
    <div>
        <a href="joinForm.php">
        <img id="join" src="join_the_queue-removebg-preview.png" alt="join the queue">
        </a>
        <div id=form>
                           <div class="row">
                              <form class="col s12 m12">
                                 <div class="input-field col offset-s1 s10" id="name">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input class="icon_prefix" type="text" id="namel" placeholder="Username">
                                 </div>
                                 <div class="input-field col offset-s1 s10" id="password">
                                    <i class="material-icons prefix">lock</i>
                                    <input class="icon_prefix" type="text" id="passwordl" placeholder="Password">
                                 </div>
                                 <div class="col s12"></div>
                                 <button class="btn waves-effect waves-light col offset-s1 s4 modal-trigger" type="submit" name="action" id="submit-btn" href="#modal2">Log In
                                 <i class="material-icons right">send</i>
                                 </button>
                              </form>
                           </div>
                        </div>
    </div>
    
</div>
</body>