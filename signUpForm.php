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
          Sign Up
        </div>
        <div id=details action="#" method="POST"> 
          <div class="row">
                <form class="col s12 m12">
                    <div class="input-field col offset-s1 s10" id="name">
                      <i class="material-icons prefix">account_circle</i>
                      <input class="icon_prefix" type="text" id="names" placeholder="Name">
                      <!-- <label for="icon_prefix">Name</label> -->
                    </div>
    
                    <div class="input-field col offset-s1 s10" id="username">
                        <i class="material-icons prefix">account_circle</i>
                        <input class="icon_prefix" type="text" is="usernames" placeholder="Cosplay Name/Username">
                        <!-- <label for="icon_prefix">Cosplay Name/Username</label> -->
                    </div>
    
                    <div class="input-field col offset-s1 s10" id="facebook">
                        <i class="material-icons prefix">facebook</i>
                        <input class="icon_prefix" type="text" id="facebooks" placeholder="Facebook Page (if applicable)">
                      <!-- <label for="icon_prefix">Facebook Page (if applicable)</label>  -->
                    </div>
    
                      <div class="input-field col offset-s1 s10" id="instagram">
                        <i class="material-icons prefix"><img src="https://img.icons8.com/material/24/000000/instagram-new--v1.png"/></i>
                        <input class="icon_prefix" type="text" id="instagrams" placeholder="Instagram Account (if applicable)">
                      <!-- <label for="icon_prefix">Instagram Account (if applicable)</label> -->
                    </div>
    
                    <div class="input-field col offset-s1 s10" id="phone">
                        <i class="material-icons prefix">phone</i>
                        <input class="icon_prefix" type="tel" is="phones" placeholder="Mobile Number">
                      <!-- <label for="icon_prefix">Mobile Number</label> -->
                    </div>
    
                    <div class="input-field col offset-s1 s10" id="email">
                        <i class="material-icons prefix">email</i>
                        <input class="icon_prefix" type="text" id="emails" placeholder="Email Address">
                      <!-- <label for="icon_prefix">Email Address</label> -->
                    </div>

                    <div class="input-field col offset-s1 s10" id="password">
                        <i class="material-icons prefix">lock</i>
                        <input class="icon_prefix" type="text" id="passwords" placeholder="Password">
                      <!-- <label for="icon_prefix">Password</label> -->
                    </div>
                    <div class="input-field col offset-s1 s10" id="password-re">
                        <i class="material-icons prefix">lock</i>
                        <input class="icon_prefix" type="text" id="password2s" placeholder="Re-enter Password">
                        <!-- <label for="icon_prefix">Re-enter Password</label> -->
                      </div>
    
                      </form>
                      <div class="col s12"></div>
                      <button class="btn waves-effect waves-light col offset-s1 s4 modal-trigger" type="submit" name="action" id="submit-btn" href="#modal1">Submit
                        <i class="material-icons right">send</i>
                    </button>
                  </div>
                </form>
                <div class="divider" ></div>
                <div id="bottom-buttons" class="col s12 m12">
                <a class="waves-effect waves-light btn col m4" id="login-btn" href="loginForm.php"><i class="material-icons left">login</i>Already a member? Login</a>
              </div>
              </div>
              </div>
        </div>
        <div id="modal1" class="modal bottom-sheet">
          <div class="modal-content" id="login-modal">
            <h4>You have successfully signed up for The Cosplay Queue</h4>
          <div><a class="waves-effect waves-light btn col offset-s2 s4" id="index-btn" href="joinForm.php"><i class="material-icons left">create</i>Join the Queue</a></div>
          <div> <a class="waves-effect waves-light btn col offset-s2 s4 modal-trigger" id="details-btn" href="#modal2"><i class="material-icons left">create</i>Edit Your Details</a></div>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
          </div>
        </div>
    
        <div id="modal2" class="modal bottom-sheet">
          <div class="modal-content">
            <h4>Update your details</h4>
            <div id=details-form action="#" method="POST"> 
              <div class="row">
                    <form class="col s12 m12">
                        <div class="input-field col offset-s1 s10" id="name">
                          <i class="material-icons prefix">account_circle</i>
                          <input class="icon_prefix" type="text" id="namer" onblur="save()" placeholder="Name">
                          <!-- <label for="icon_prefix">Name</label> -->
                        </div>
        
                        <div class="input-field col offset-s1 s10" id="username">
                            <i class="material-icons prefix">account_circle</i>
                            <input class="icon_prefix" type="text" id="usernamer" placeholder="Username" >
                            <!-- <label for="icon_prefix">Cosplay Name/Username</label> -->
                        </div>
        
                        <div class="input-field col offset-s1 s10" id="facebook">
                            <i class="material-icons prefix">facebook</i>
                            <input class="icon_prefix" type="text" id="facebookr" onblur="savefacebookr()" placeholder="Facebook Page (if applicable)">
                          <!-- <label for="icon_prefix">Facebook Page (if applicable)</label>  -->
                        </div>
        
                          <div class="input-field col offset-s1 s10" id="instagram">
                            <i class="material-icons prefix"><img src="https://img.icons8.com/material/24/000000/instagram-new--v1.png"/></i>
                            <input class="icon_prefix" type="text" id="instagramr" placeholder="Instagram Account (if applicable)" onblur= "saveinstagramr()">
                          <!-- <label for="icon_prefix">Instagram Account (if applicable)</label> -->
                        </div>
        
                        <div class="input-field col offset-s1 s10" id="phone">
                            <i class="material-icons prefix">phone</i>
                            <input class="icon_prefix" type="tel" id="phoner" placeholder="Mobile Number" onblur="savephoner()">
                          <!-- <label for="icon_prefix">Mobile Number</label> -->
                        </div>
        
                        <div class="input-field col offset-s1 s10" id="email">
                            <i class="material-icons prefix">email</i>
                            <input class="icon_prefix" type="text" id="emailr" onblur="saveemailr()" placeholder="Email Address">
                          <!-- <label for="icon_prefix">Email Address</label> -->
                        </div>
    
                        <div class="input-field col offset-s1 s10" id="password">
                            <i class="material-icons prefix">lock</i>
                            <input class="icon_prefix" type="text" id="passwordr" placeholder="Password" onblur="savepasswordr()">
                          <!-- <label for="icon_prefix">Password</label> -->
                        </div>
                        <div class="input-field col offset-s1 s10" id="password-re">
                            <i class="material-icons prefix">lock</i>
                            <input class="icon_prefix" type="text" id="password2r" placeholder="Re-enter Password" onblur="savepassword2r()">
                            <!-- <label for="icon_prefix">Re-enter Password</label> -->
                          </div>
                        <div action="#" id="checkbox">
                          <p>
                            <label>
                              <input type="checkbox" id="checkboxr" onchange="test()"/>
                              <span>Save</span>
                            </label>
                            </p>
                      </div>
                    </form>
                    </div>
                      </form>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
          </div>
        </div>
      </div>
    </body>
    </html>