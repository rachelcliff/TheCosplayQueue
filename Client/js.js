// ServiceWorker
// if ('serviceWorker' in navigator) {
//     navigator.serviceWorker.register('sw.js', { scope: './' }).then((reg) => {
//         if (reg.installing) {
//             console.log('Service worker installing');
//         } else if(reg.waiting) {
//             console.log('Service worker installed');
//         } else if(reg.active) {
//             console.log('Service worker active');
//         }

//     }).catch((error) => {
//         console.log('Registration failed with ' + error); // Registration failed
//     });

//   // Communicate with the service worker using MessageChannel API.
//   function sendMessage(message) {
//     return new Promise((resolve, reject) => {
//       const messageChannel = new MessageChannel();
//       messageChannel.port1.onmessage = function(event) {
//         resolve(`Direct message from SW: ${event.data}`);
//       };

//       navigator.serviceWorker.controller.postMessage(message, [messageChannel.port2])
//     });
//   }
// }

$(document).ready(function () {
  $(".sidenav").sidenav();
});

$(document).ready(function () {
  $(".modal").modal();
});

// local storage
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
  } else {
    localStorage.removeItem("namer");
    localStorage.removeItem("emailr");
    localStorage.removeItem("usernamer");
    localStorage.removeItem("facebookr");
    localStorage.removeItem("instagramr");
    localStorage.removeItem("phoner");
  }
}

window.onload = function () {
  namer.value = localStorage.getItem("namer");
  emailr.value = localStorage.getItem("emailr");
  usernamer.value = localStorage.getItem("usernamer");
  facebookr.value = localStorage.getItem("facebookr");
  instagramr.value = localStorage.getItem("instagramr");
  phoner.value = localStorage.getItem("phoner");
  if (
    localStorage.getItem(
      "namer",
      "emailr",
      "usernamer",
      "facebookr",
      "instagramr",
      "phoner",
    ) == null
  ) {
    checkboxr.checked = false;
  } else {
    checkboxr.checked = true;
  }
};

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
    localStorage.setItem("instagramr", instagramr.value);
  }
}

function savephoner() {
  if (checkboxr.checked == true) {
    var save = document.getElementById("phoner");
    localStorage.setItem("phoner", phoner.value);
  }
}

// side nav and collapsibles
$(document).ready(function () {
  $(".collapsible").collapsible();
});

function open1() {
  window.scrollTo(0, -500);
  $(".collapsible").collapsible("open", 0);
  $("#modal2").modal();
  $("body").css({
    overflow: "visible",
  });
}

function join() {
  $(".collapsible").collapsible("open", 0);
  $("#modal2").modal();
  $("body").css({
    overflow: "visible",
  });
  $(".sidenav").sidenav({
    menuWidth: 300, // Default is 240
    closeOnClick: true,
  });
}

function sign() {
  window.scrollTo(0, 300);
  $(".collapsible").collapsible("open", 1);
  $("#modal2").modal();
  $("body").css({
    overflow: "visible",
  });
  $(".sidenav").sidenav({
    menuWidth: 300, // Default is 240
    closeOnClick: true,
  });
}

function register() {
  window.scrollTo(0, 600);
  $(".collapsible").collapsible("open", 2);
  $("#modal2").modal();
  $("body").css({
    overflow: "visible",
  });
  $(".sidenav").sidenav({
    menuWidth: 300, // Default is 240
    closeOnClick: true,
  });
}

//Show Queue
function showDetails() {
  populateAlert("Loading...", "notice");
  var outStr = "";
  var disabled = "";
  fetch("../Api/api.php?action=showDetails", {
    method: "GET",
    credentials: "include",
  }).then(function (response) {
    response.json().then(function (results) {
      console.log(results);
      results.forEach((row) => {
        // if (row.user_ID == $_SESSION['userID']) {
        // 	disabled = '';
        // } else {
        // 	disabled = 'disabled';
        // }
        outStr +=
          "<tr><td>" +
          row.character_name +
          "</td><td>" +
          row.series +
          "</td><td>" +
          row.genre +
          "</td><td>" +
          row.r_group +
          // "</td><td>" +
          // row.reference_photo +
         "</td></tr>";
      });
      document.getElementById("queue").innerHTML = outStr;
    });
  });
}

//Show Queue All
function showDetailsAll() {
  populateAlert("Loading...", "notice");
  var outStr = "";
  var disabled = "";
  fetch("../Api/api.php?action=showDetailsAll", {
    method: "GET",
    credentials: "include",
  }).then(function (response) {
    response.json().then(function (results) {
      echo(results);
      results.forEach((row) => {
        outStr +=
          "<tr><td>" +
          row.character_name +
          "</td><td>" +
          row.series +
          "</td><td>" +
          row.genre +
          "</td><td>" +
          row.r_group +
          "</td><td><button " +
          disabled +
          ">Delete</button>" +
          "</td></tr>";
      });
      document.getElementById("queue").innerHTML = outStr;
    });
  });
}

// dark mode
window.addEventListener("load", function () {
  console.log(localStorage.getItem("darktheme"));
  if (localStorage.getItem("darktheme") == "true") {
    checkBG.checked = true;
    document.body.style.backgroundColor = "black";
    document.body.style.color = "white";
    document.getElementById("section1").style.backgroundColor = "black";
    document.getElementById("section2").style.backgroundColor = "black";
    document.getElementById("section3").style.backgroundColor = "black";
  } else {
    checkBG.checked = false;
    document.body.style.backgroundColor = "white";
    document.body.style.color = "black";
    document.getElementById("section1").style.backgroundColor = "white";
    document.getElementById("section2").style.backgroundColor = "white";
    document.getElementById("section3").style.backgroundColor = "white";
    localStorage.setItem("darktheme", "false");
  }
});

function switchBG(checkBG) {
  if (checkBG.checked == true) {
    document.body.style.backgroundColor = "black";
    document.body.style.color = "white";
    document.getElementById("section1").style.backgroundColor = "black";
    document.getElementById("section2").style.backgroundColor = "black";
    document.getElementById("section3").style.backgroundColor = "black";
    localStorage.setItem("darktheme", "true");
  } else {
    document.body.style.backgroundColor = "white";
    document.body.style.color = "black";
    document.getElementById("section1").style.backgroundColor = "white";
    document.getElementById("section2").style.backgroundColor = "white";
    document.getElementById("section3").style.backgroundColor = "white";
    localStorage.setItem("darktheme", "false");
  }
}

// Form Validation - Join
function formcheckjoin() {
  populateAlert("Loading...", "notice");
  var errorStr = "";
  if (namei.checkValidity() === false) {
    errorStr += "Please insert a valid name ";
    console.log("name error");
    return;
  }

  if (usernamei.checkValidity() === false) {
    errorStr += "Please insert a valid username ";
    console.log("username error");
    return;
  }

  if (phonei.checkValidity() === false) {
    errorStr += "Please insert a valid phone number ";
    console.log("phone error");
    return;
  }

  if (emaili.checkValidity() === false) {
    errorStr += "Please insert a valid email ";
    console.log("email error");
    return;
  }

  if (characteri.checkValidity() === false) {
    errorStr += "Please insert your character name ";
    return;
  }

  if (seriesi.checkValidity() === false) {
    errorStr += "Please insert your series name ";
    return;
  }

  if (genrei.checkValidity() === false) {
    errorStr += "Please answer if you are part of a group ";
    return;
  }

  if (groupi.checkValidity() === false) {
    errorStr += "Please insert a Valid response ";
    return;
  }

  formdata = new FormData();
  formdata.set("action", "join");
  formdata.set("namei", namei.value);
  formdata.set("usernamei", usernamei.value);
  formdata.set("facebooki", facebooki.value);
  formdata.set("instagrami", instagrami.value);
  formdata.set("phonei", phonei.value);
  formdata.set("emaili", emaili.value);
  formdata.set("characteri", characteri.value);
  formdata.set("seriesi", seriesi.value);
  formdata.set("genrei", genrei.value);
  formdata.set("groupi", groupi.value);
  formdata.set("photo", photo.value);
  formdata.set("joini", joini.value);
  formdata.set("photo_taken", 'no');

  fetch("../Api/api.php?action=join", {
    method: "POST",
    body: formdata,
    credentials: "same-origin",
  });
}
  
// Form Validation - Register
function formcheckregister() {
  populateAlert("Loading...", "notice");
  var errorStr = "";
  if (passCheck() === false) {
    errorStr += "Passwords do not match";
    console.log("password error");
    return;
  }

  if (names.checkValidity() === false) {
    errorStr += "Please insert a valid name ";
    console.log("name error");
    return;
  }

  if (usernames.checkValidity() === false) {
    errorStr += "Please insert a valid username ";
    console.log("username error");
    return;
  }

  if (phones.checkValidity() === false) {
    errorStr += "Please insert a valid phone number ";
    console.log("phone error");
    return;
  }

  if (emails.checkValidity() === false) {
    errorStr += "Please insert a valid email ";
    console.log("email error");
    return;
  }

  formdata = new FormData();
  formdata.set("action", "signup");
  formdata.set("names", names.value);
  formdata.set("usernames", usernames.value);
  formdata.set("facebooks", facebooks.value);
  formdata.set("instagrams", instagrams.value);
  formdata.set("phones", phones.value);
  formdata.set("emails", emails.value);
  formdata.set("passwords", passwords.value);
  formdata.set("registers", registers.value);

  fetch("../Api/api.php?action=signup", {
    method: "POST",
    body: formdata,
    credentials: "same-origin",
  });
}

// Form Validation - Update
function formcheckupdate() {
  populateAlert("Loading...", "notice");
  var errorStr = "";
  if (passCheck() === false) {
    errorStr += "Passwords do not match";
    console.log("password error");
    return;
  }

  if (namer.checkValidity() === false) {
    errorStr += "Please insert a valid name ";
    console.log("name error");
    return;
  }

  if (usernamer.checkValidity() === false) {
    errorStr += "Please insert a valid username ";
    console.log("username error");
    return;
  }

  if (facebookr.checkValidity() === false) {
    errorStr += "Please insert a valid facebook account ";
    return;
  }

  if (instagramr.checkValidity() === false) {
    errorStr += "Please insert a a valid instagram account ";
    return;
  }

  if (phoner.checkValidity() === false) {
    errorStr += "Please insert a valid phone number ";
    console.log("phone error");
    return;
  }

  if (emailr.checkValidity() === false) {
    errorStr += "Please insert a valid email ";
    console.log("email error");
    return;
  }

  formdata = new FormData();
  formdata.set("action", "update");

  formdata.set("namer", namer.value);
  formdata.set("usernamer", usernamer.value);
  formdata.set("facebookr", facebookr.value);
  formdata.set("instagramr", instagramr.value);
  formdata.set("phoner", phoner.value);
  formdata.set("emailr", emailr.value);
  formdata.set("passwordr", passwordr.value);
  formdata.set("updater", updater.value);

  fetch("../Api/api.php?action=update", {
    method: "POST",
    body: formdata,
    credentials: "include",
  });
}

// Alert Message
function populateAlert(msg, priority) {
  var timeoutVar = setTimeout(function () {
    alertMsg.style.display = "none";
    1000;
  });
  clearTimeout(timeoutVar);
  alertMsg.setAttribute("class", "message " + priority);
  alertMsg.innerHTML = msg;
  alertMsg.style.display = "block";
}

// Kill Alert Message
function killAlert() {
  clearTimeout(timeoutVariable);
  alertMsg.style.display = "none";
}

// Password Check
function passCheck() {
  if (passwordr.value.length > 0 && password2r.value.length > 0) {
    if (passwordr.value === password2r.value) {
      //  error.innerHTML = "";
      passwordr.setCustomValidity("");
      password2r.setCustomValidity("");
      return true;
    } else {
      error.innerHTML = "Passwords do not Match";
      passwordr.setCustomValidity("test");
      password2r.setCustomValidity("test2");
      return false;
    }
  }
}

// Form Validation - Login
function formchecklogin() {
  populateAlert("Loading...", "notice");
  var errorStr = "";
  // dispatchEvent;
  if (namel.checkValidity() === false) {
    errorStr += "Please insert a valid name ";
    console.log("username error");
    return;
  }

  if (passwordl.checkValidity() === false) {
    errorStr += "Please insert a valid username ";
    console.log("password error");
    return;
  }

  formdata = new FormData();
  formdata.set("action", "login");
  formdata.set("namel", namel.value);
  formdata.set("passwordl", passwordl.value);
  formdata.set("loginl", loginl.value);
  fetch("../api/api.php?action=login", {
    method: "POST",
    body: formdata,
    credentials: "include",
  });
}

// Dequeue
function dequeue() {
  populateAlert("Loading...", "notice");
  var out = "";
  var disabled = "";
  formdata = new FormData();
  formdata.set("action", "dequeue");
  formdata.set("usernamei", usernamei.value);
  formdata.set("photo_taken", "void");

  fetch("../Api/api.php?action=dequeue", {
    method: "POST",
    body: formdata,
    credentials: "include",
  });
}

// photo taken - admin panel
function photo_taken() {
  populateAlert("Loading...", "notice");
  var out = "";
  var disabled = "";
  formdata = new FormData();
  formdata.set("action", "dequeue");
  formdata.set("usernamei", usernamei.value);
  formdata.set("photo_taken", "yes");

  fetch("../Api/api.php?action=photo_taken", {
    method: "POST",
    body: formdata,
    credentials: "include",
  });
}

// place queue
function place_queue() {
  populateAlert("Loading...", "notice");
  var outStr = "";
  // var disabled = "";
   fetch("../Api/api.php?action=placequeue", {
  method: "GET",
  credentials: "include",
}).then(function (response) {
  response.json().then(function (results) {
    console.log(results);
    results.forEach((row) => {
      outStr +=      
      "<tr><td>" +
      row.place +
      "</td></tr>";
    });
    document.getElementById("place_queue").innerHTML = outStr;
  });
});
}

function fillupdate() {
   fetch('../Api/api.php?action=fillupdate', 
  {
      method: 'GET',
      credentials: 'include'
  }
) 
.then(function (response) {
  response.json().then(function (details) {
    console.log(details);
  namer.value = details.name; 
  usernamer.value = details.cosplay_name; 
  facebookr.value = details.facebook;
  instagramr.value = details.instagram;
  phoner.value = details.phone;
  emailr.value = details.email; 
});
});
}

function autorefresh() {
  populateAlert("Loading...", "notice");
  var outStr = "";
   fetch("../Api/api.php?action=placequeue", {
  method: "GET",
  credentials: "include",
  
  $(document).ready(function(){
    setInterval(function(){
          $("#place_queue").load(window.location.href + " #place_queue>*" );
    }, 4000);
    });
  }
