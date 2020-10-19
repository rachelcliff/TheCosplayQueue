function accord() {
  $('.ui.accordion')
    .accordion();
}

function passCheck() {
  if (pass1.value.length > 0 && pass2.value.length > 0) {
    if (pass1.value === pass2.value) {
      error.innerHTML = "";
      pass1.setCustomValidity('');
      pass2.setCustomValidity('');
      return true;
    } else {
      error.innerHTML = "Passwords do not Match";
      pass1.setCustomValidity('moo!!!');
      pass2.setCustomValidity('choo!!!');
      return false;
    }
  }
}

function formcheck() {
  var errorStr = '';
  if (passCheck() === false) {
    errorStr += 'Passwords do not match';
  }
  console.log('passcheck');
  if (fname.checkValidity() === false) {
    errorStr += 'Please insert a Valid First Name ';
  } else {
    localStorage.setItem("fname", fname.value);
  }
  console.log('namechack');

  if (lname.checkValidity() === false) {
    errorStr += 'Please insert a valid Surname ';
  } else {
    localStorage.setItem("lname", lname.value);
  }
  console.log('lnamecheck');
  if (email.checkValidity() === false) {
    errorStr += 'Please insert a valid Email Address ';
  } else {
    localStorage.setItem("email", email.value);
  }
  console.log('emailcheck');
  if (pnum.checkValidity() === false) {

    errorStr += 'Please insert a valid phone number ';
  } else {
    localStorage.setItem("pnum", pnum.value);
  }
  console.log('phonecheck');
  if (add.checkValidity() === false) {

    errorStr += 'Please insert a Valid address ';
  } else {
    localStorage.setItem("add", add.value);
  }
  if (tname.checkValidity() === false) {

    errorStr += 'Please insert a Valid Team Name ';
  } else {
    localStorage.setItem("tname", tname.value);
  }
  if (pla1.checkValidity() === false) {

    errorStr += 'Please insert a Valid Name for Player 1 ';
  } else {
    localStorage.setItem("pla1", pla1.value);
  }
  if (pla2.checkValidity() === false) {
    errorStr += 'Please insert a Valid Name for Player 2 ';
  } else {
    localStorage.setItem("pla2", pla2.value);
  }
  if (pla3.checkValidity() === false) {
    errorStr += 'Please insert a Valid Name for Player 3 ';
  } else {
    localStorage.setItem("pla3", pla3.value);
  }
  if (pla4.checkValidity() === false) {
    errorStr += 'Please insert a Valid Name for Player 4 ';
  } else {
    localStorage.setItem("pla4", pla4.value);
  }
  error.innerHTML = errorStr
  formdata = new FormData()
  formdata.set("action", "reg")
  formdata.set("firstname", fname.value)
  formdata.set("lastname", lname.value)
  formdata.set("email", email.value)
  formdata.set("phone", pnum.value)
  formdata.set("address", add.value)
  formdata.set("teamname", tname.value)
  formdata.set("player1", pla1.value)
  formdata.set("player2", pla2.value)
  formdata.set("player3", pla3.value)
  formdata.set("player4", pla4.value)
  formdata.set("icon", ticon.value)
  formdata.set("password", pass1.value)
  fetch('../api/api.php?action=reg', {
      method: "POST",
      body: formdata,
      credentials: 'include',

    })
    .then(function (response) {
      if (response.status == 202) {
        alert("Registration Successful");
      } else if (response.status == 409) {
        alert("Team already Exists");
      } else if (response.status == 406) {
        alert("Please ensure all fields have been filled out");
      } else {
        alert("Not Implemented");
      }
    });
}
window.onload = function () {
  $('.tabular.menu .item')
    .tab();
}

function prefill() {
  fname2.value = localStorage.getItem("fname");
  lname2.value = localStorage.getItem("lname");
  email2.value = localStorage.getItem("email");
  pnum2.value = localStorage.getItem("pnum");
  add2.value = localStorage.getItem("add");
  tname2.value = localStorage.getItem("tname");
  pla12.value = localStorage.getItem("pla1");
  pla22.value = localStorage.getItem("pla2");
  pla32.value = localStorage.getItem("pla3");
  pla42.value = localStorage.getItem("pla4");
}

function login() {
  if (ltname.checkValidity() === false) {

    errorStr += 'Please insert a Valid Team Name ';
  } else {
    formdata = new FormData()
    formdata.set("action", "login")
    formdata.set("teamname", ltname.value)
    formdata.set("password", lpass.value)
    fetch('../api/api.php?action=login', {
      method: "POST",
      body: formdata,
      credentials: 'include',

    })
  }
}

function savecont() {
  var errorStr = '';
  if (fname2.checkValidity() === false) {
    errorStr += 'Please insert a Valid First Name ';
  } else {
    localStorage.setItem("fname", fname2.value);
  }

  if (lname2.checkValidity() === false) {
    errorStr += 'Please insert a valid Surname ';
  } else {
    localStorage.setItem("lname", lname2.value);
  }

  if (email2.checkValidity() === false) {
    errorStr += 'Please insert a valid Email Address ';
  } else {
    localStorage.setItem("email", email2.value);
  }

  if (pnum2.checkValidity() === false) {

    errorStr += 'Please insert a valid phone number ';
  } else {
    localStorage.setItem("pnum", pnum2.value);
  }
  if (add2.checkValidity() === false) {

    errorStr += 'Please insert a Valid address ';
  } else {
    localStorage.setItem("add", add2.value);
  }
  errorcont.innerHTML = errorStr;
  formdata = new FormData()
  formdata.set("action", "editcont")
  formdata.set("firstname", fname2.value)
  formdata.set("lastname", lname2.value)
  formdata.set("email", email2.value)
  formdata.set("phone", pnum2.value)
  formdata.set("address", add2.value)
  fetch('../api/api.php?action=editcont', {
    method: "POST",
    body: formdata,
    credentials: 'include',

  })
}

function saveteam() {
  var errorStr = '';
  if (tname2.checkValidity() === false) {

    errorStr += 'Please insert a Valid Team Name ';
  } else {
    localStorage.setItem("tname", tname2.value);
  }
  if (pla12.checkValidity() === false) {

    errorStr += 'Please insert a Valid Name for Player 1 ';
  } else {
    localStorage.setItem("pla1", pla12.value);
  }
  if (pla22.checkValidity() === false) {
    errorStr += 'Please insert a Valid Name for Player 2 ';
  } else {
    localStorage.setItem("pla2", pla22.value);
  }
  if (pla32.checkValidity() === false) {
    errorStr += 'Please insert a Valid Name for Player 3 ';
  } else {
    localStorage.setItem("pla3", pla32.value);
  }
  if (pla42.checkValidity() === false) {
    errorStr += 'Please insert a Valid Name for Player 4 ';
  } else {
    localStorage.setItem("pla4", pla42.value);
  }
  errorteam.innerHTML = errorStr;

  formdata = new FormData()
  formdata.set("action", "editteam")
  formdata.set("teamname", tname2.value)
  formdata.set("player1", pla12.value)
  formdata.set("player2", pla22.value)
  formdata.set("player3", pla32.value)
  formdata.set("player4", pla42.value)
  formdata.set("icon", icon2.value)

  fetch('../api/api.php?action=editteam', {
    method: "POST",
    body: formdata,
    credentials: 'include',

  })
}

function savepass() {
  var errorStr = '';
  if (passCheck2() === false) {
    errorStr += 'Passwords do not match';
  }
  errorpass.innerHTML = errorStr;
  formdata = new FormData()
  formdata.set("action", "changepass")
  formdata.set("password", npass1.value)

  fetch('../api/api.php?action=changepass', {
    method: "POST",
    body: formdata,
    credentials: 'include',

  })
}

function passCheck2() {
  if (npass1.value.length > 0 && npass2.value.length > 0) {
    if (npass1.value === npass2.value) {
      error.innerHTML = "";
      npass1.setCustomValidity('');
      npass2.setCustomValidity('');
      return true;
    } else {
      error.innerHTML = "Passwords do not Match";
      npass1.setCustomValidity('moo!!!');
      npass2.setCustomValidity('choo!!!');
      return false;
    }
  }
}

let placeSearch;
let autocomplete;
const componentForm = {
  street_number: "short_name",
  route: "long_name",
  locality: "long_name",
  administrative_area_level_1: "short_name",
  country: "long_name",
  postal_code: "short_name"
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
    document.getElementById("add"), {
      types: ["geocode"]
    }
  );
  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields(["address_component"]);
}
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(position => {
      const geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      const circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
