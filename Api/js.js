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

window.onload = function () {
  namer.value = localStorage.getItem("namer");
  emailr.value = localStorage.getItem("emailr");
  usernamer.value = localStorage.getItem("usernamer");
  facebookr.value = localStorage.getItem("facebookr");
  instagramr.value = localStorage.getItem("instagramr");
  phoner.value = localStorage.getItem("phoner");
  passwordr.value = localStorage.getItem("passwordr");
  password2r.value = localStorage.getItem("password2r");
  if (
    localStorage.getItem(
      "namer",
      "emailr",
      "usernamer",
      "facebookr",
      "instagramr",
      "phoner",
      "passwordr",
      "password2r"
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

//load json partial
function loadJSONpartial() {
  populateAlert("Loading...", "notice");
  var out = "";
  var disabled = "";
  fetch(url, {
    method: "GET",
    credentials: "include",
  }).then(function (response) {
    if (response.status === 401) {
      populateAlert("Not Authorized, please login", "error");
      return;
    }
    if (response.status === 204) {
      populateAlert("No queue items found", "warning");
      return;
    }
    response.json().then(function (data) {
      console.log(data);
      data.forEach((row) => {
        if (row.student_NO == 1) {
          disabled = "";
        } else {
          disabled = "disabled";
        }
        out +=
          "<tr><td>" +
          row.id +
          "</td><td>" +
          row.name +
          "</td><td>" +
          row.cosplay_name +
          "</td><td>" +
          row.character +
          "</td><td>" +
          row.series +
          // '</td><td>' + row.genre +
          "</td><td>" +
          row.group +
          '</td><td><img src="' +
          row.photo +
          '"></td><td><button ' +
          disabled +
          ">Delete</button>" +
          "</td><td><button " +
          disabled +
          ">Preview</button>" +
          "</td></tr>";
      });
      document.getElementById("queue").innerHTML = outStr;
    });
  });
}

//Show Queue
function showDetails() {
  populateAlert("Loading...", "notice");
  var out = "";
  var disabled = "";
  fetch("../Api/api.php?action=showDetails",
    {
    	method: 'GET',
    	credentials: 'include'
    })
       .then(function(response) {
         if(response.status === 202){
          let queue = $results;
            return queue.map(function (queue) {
              console.log(queue.character_name);
              console.log(queue.genre);
              console.log(queue.genre);
              console.log(queue.group);
              console.log(queue.photo);
         })
        }
       })
} 
    
    // .then((resp) => resp.json())
    // .then(function (data) {
    //   let people = data.results;
    //   return people.map(function (queue) {
    //     console.log(queue.character_name);
    //     console.log(queue.genre);
    //     console.log(queue.genre);
    //     console.log(queue.group);
    //     console.log(queue.photo);
    //   });
    // });


// .then(function (response) {
// response.json().then(function (data) {
// 	console.log(data);
// 	data.forEach(row => {
// 		// if (row.user_ID == 1) {
// 		// 	disabled = '';
// 		// } else {
// 		// 	disabled = 'disabled';
// 		// }
// 		out += '<tr><td>' + row.character +
// 			'</td><td>' + row.series +
// 			'</td><td>' + row.genre +
// 			'</td><td>' + row.group +
// 			'</td><td><img src="' + row.photo + '"></td><td><button ' + disabled + '>Delete</button>' +
// 			'</td></tr>';
// 	});
// 	document.getElementById('queue').innerHTML = outStr;
// 			})
// 		});

// }

// Dequeue
function dequeue() {
  populateAlert("Loading...", "notice");
  var out = "";
  var disabled = "";

  fetch("../Api/api.php?action=dequeue", {
    method: "update",
    body: formdata,
    // credentials: 'include'
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

// Password Check
function passCheck() {
  if (passwordr.value.length > 0 && password2r.value.length > 0) {
    if (passwordr.value === password2r.value) {
      //  error.innerHTML = "";
      passwordr.setCustomValidity("");
      password2r.setCustomValidity("");
      return true;
    } else {
      //  error.innerHTML= "Passwords do not Match";
      passwordr.setCustomValidity("test");
      password2r.setCustomValidity("test2");
      return false;
    }
  }
}
// Form Validation - Join
function formcheckjoin() {
  populateAlert("Loading...", "notice");
  var errorStr = "";
  if (namei.checkValidity() === false) {
    errorStr += "Please insert a valid name ";
    console.log("name checked");
  }

  if (usernamei.checkValidity() === false) {
    errorStr += "Please insert a valid username ";
    console.log("username checked");
  }

  if (facebooki.checkValidity() === false) {
    errorStr += "Please insert a valid facebook account ";
  }

  if (instagrami.checkValidity() === false) {
    errorStr += "Please insert a a valid instagram account ";
  }

  if (phonei.checkValidity() === false) {
    errorStr += "Please insert a valid phone number ";
    console.log("phone checked");
  }

  if (emaili.checkValidity() === false) {
    errorStr += "Please insert a valid email ";
    console.log("email checked");
  }

  if (characteri.checkValidity() === false) {
    errorStr += "Please insert your character name ";
  }

  if (seriesi.checkValidity() === false) {
    errorStr += "Please insert your series name ";
  }

  if (genrei.checkValidity() === false) {
    errorStr += "Please answer if you are part of a group ";
  }

  if (groupi.checkValidity() === false) {
    errorStr += "Please insert a Valid response ";
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
  formdata.set("photo_taken", photo_taken.value);

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
  }
  console.log("password checked");

  if (names.checkValidity() === false) {
    errorStr += "Please insert a valid name ";
    console.log("name checked");
  }

  if (usernames.checkValidity() === false) {
    errorStr += "Please insert a valid username ";
    console.log("username checked");
  }

  if (facebooks.checkValidity() === false) {
    errorStr += "Please insert a valid facebook account ";
  }

  if (instagrams.checkValidity() === false) {
    errorStr += "Please insert a a valid instagram account ";
  }

  if (phones.checkValidity() === false) {
    errorStr += "Please insert a valid phone number ";
    console.log("phone checked");
  }

  if (emails.checkValidity() === false) {
    errorStr += "Please insert a valid email ";
    console.log("email checked");
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
  }
  console.log("password checked");

  if (namer.checkValidity() === false) {
    errorStr += "Please insert a valid name ";
    console.log("name checked");
  }

  if (usernamer.checkValidity() === false) {
    errorStr += "Please insert a valid username ";
    console.log("username checked");
  }

  if (facebookr.checkValidity() === false) {
    errorStr += "Please insert a valid facebook account ";
  }

  if (instagramr.checkValidity() === false) {
    errorStr += "Please insert a a valid instagram account ";
  }

  if (phoner.checkValidity() === false) {
    errorStr += "Please insert a valid phone number ";
    console.log("phone checked");
  }

  if (emailr.checkValidity() === false) {
    errorStr += "Please insert a valid email ";
    console.log("email checked");
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

// Form Validation - Login
function formchecklogin() {
  populateAlert("Loading...", "notice");
  var errorStr = "";
  if (namel.checkValidity() === false) {
    errorStr += "Please insert a valid name ";
    console.log("username checked");
  }

  if (passwordl.checkValidity() === false) {
    errorStr += "Please insert a valid username ";
    console.log("password checked");
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

// // JSON Convert
// fetch("../Api/db.php")
//   .then((response) => response.json())
//   .then((json) => console.log(json));