
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
  
  $(document).ready(function(){
    $('.modal').modal();
  });

  function storage() {
    // var checkbox = document.getElementById("checkbox");
    //   localStorage.setItem("checkbox", checkbox.checked);
    if (checkboxr.checked == true) {
      localStorage.setItem("namer", namer.value);
      localStorage.setItem("emailr", emailr.value);
      localStorage.setItem("usernamer", usernamer.value);
      localStorage.setItem("facebookr", facebookr.value);
      localStorage.setItem("instagramr", instagramr.value);
      localStorage.setItem("phoner", phoner.value);
      localStorage.setItem("passwordr", passwordr.value);
      localStorage.setItem("password2r", password2r.value);
    } else {
      localStorage.removeItem("namer");
      localStorage.removeItem("emailr");
      localStorage.removeItem("usernamer");
      localStorage.removeItem("facebookr");
      localStorage.removeItem("instagramr");
      localStorage.removeItem("phoner");
      localStorage.removeItem("passwordr");
      localStorage.removeItem("password2r");
    }
  }
  
  window.onload = function() {
    namer.value = localStorage.getItem("namer");
    emailr.value= localStorage.getItem("emailr");
    usernamer.value=localStorage.getItem("usernamer");
    facebookr.value= localStorage.getItem("facebookr");
    instagramr.value= localStorage.getItem("instagramr");
    phoner.value= localStorage.getItem("phoner");
    passwordr.value=localStorage.getItem("passwordr");
    password2r.value=localStorage.getItem("password2r");
    if (localStorage.getItem("namer","emailr", "usernamer", "facebookr", "instagramr", "phoner", "passwordr", "password2r")==null) {
          checkboxr.checked = false; 
    } else {
      checkboxr.checked=true;
    }
   
  }
  
  function save() {
    if (checkboxr.checked == true) {
      var save = document.getElementById("namer");
      localStorage.setItem("namer", namer.value);
    } 
  }

  function saveemailr() {
    if (checkboxr.checked == true) {
      var save = document.getElementById("emailr");
      localStorage.setItem("emailr", emailr.value);
    } 
  } 

    function saveusernamer() {
      if (checkboxr.checked == true) {
        var save = document.getElementById("usernamer");
        localStorage.setItem("usernamer", usernamer.value);
      } 
    }

     function savefacebookr() {
        if (checkboxr.checked == true) {
          var save = document.getElementById("facebookr");
          localStorage.setItem("facebookr", facebookr.value);
        } 
      }

        function saveinstagramr() {
          if (checkboxr.checked == true) {
            var save = document.getElementById("instagramr");
            localStorage.setItem("instagramr", instragramr.value);
          } 
        }

          function savephoner() {
            if (checkboxr.checked == true) {
              var save = document.getElementById("phoner");
              localStorage.setItem("phoner", phoner.value);
            } 
          }

            function savepasswordr() {
              if (checkboxr.checked == true) {
                var save = document.getElementById("passwordr");
                localStorage.setItem("passwordr", passwordr.value);
              } 
            }
            
              function savepassword2r() {
                if (checkboxr.checked == true) {
                  var save = document.getElementById("password2r");
                  localStorage.setItem("password2r", password2r.value);
                } 
  }

  $(document).ready(function(){
    $('.collapsible').collapsible();
  });

  function open1() {
    window.scrollTo(0, -500);
    $(".collapsible").collapsible("open",0);
    $("#modal2").modal();
    $('body').css({
      overflow: 'visible'
  });
  }
  
  // function open1() {
  //   window.scrollTo(0, -500);
  //   $(".collapsible").collapsible("open",0);
  //   $("#modal2").modal();
  //   $('body').css({
  //     overflow: 'visible'
  // });
  // }

  function join() {
    $(".collapsible").collapsible("open",0);
    $("#modal2").modal();
    $('body').css({
      overflow: 'visible'
  });
  $('.sidenav').sidenav({
    menuWidth: 300, // Default is 240
    closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
  });
  }

  function sign() {
    window.scrollTo(0, 300);
    $(".collapsible").collapsible("open",1);
    $("#modal2").modal();
    $('body').css({
      overflow: 'visible'
  });
  $('.sidenav').sidenav({
    menuWidth: 300, // Default is 240
    closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
  });
  }

  function register() {
    window.scrollTo(0, 600);
    $(".collapsible").collapsible("open",2);
    $("#modal2").modal();
    $('body').css({
      overflow: 'visible'
  });
  $('.sidenav').sidenav({
    menuWidth: 300, // Default is 240
    closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
  });
  }

