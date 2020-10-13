$(document).ready(function () {
	$('.sidenav').sidenav();
});

$(document).ready(function () {
	$('.modal').modal();
});

// // JSON Convert
// fetch('../Api/db.php')
//   .then(response => response.json())
//   .then(json => console.log(json))

function joinQueue() {
	formdata = new FormData();
	formdata.set("action", "join")
	formdata.set('namei', namei.value);
	fetch('../Api/api.php?action=join', {
			method: 'POST',
			body: formdata,
			credentials: 'include'
		// })
		// .then(function (response) {
		// 	if (response.status === 400) {
		// 		console.log('not inserted');
		// 		return;
		// 	}
		// 	if (response.status === 401) {
		// 		console.log('no permissions');
		// 		return;
		// 	}
		// 	if (response.status === 501) {
		// 		console.log('not implemented');
		// 		return;
		// 	}
		// 	if (response.status === 202) {
		// 		console.log('success');
		// 		return;
		// 	}
		});
	return false;
}

function loginQueue() {
	formdata = new FormData();
	formdata.set("action", "join")
	fetch('../Api/api.php?action=sign-in', {
			method: 'POST',
			body: formdata,
			credentials: 'include'
		// })
		// .then(function (response) {
		// 	if (response.status === 400) {
		// 		console.log('not inserted');
		// 		return;
		// 	}
		// 	if (response.status === 401) {
		// 		console.log('no permissions');
		// 		return;
		// 	}
		// 	if (response.status === 501) {
		// 		console.log('not implemented');
		// 		return;
		// 	}
		// 	if (response.status === 202) {
		// 		console.log('success');
		// 		return;
		// 	}
		});
	return false;
}

function registerQueue() {
	formdata = new FormData();
	formdata.set("action", "join")
	formdata.set('namei', namei.value);
	fetch('../Api/api.php?action=sign-up', {
			method: 'POST',
			body: formdata,
			credentials: 'include'
		// })
		// .then(function (response) {
		// 	if (response.status === 400) {
		// 		console.log('not inserted');
		// 		return;
		// 	}
		// 	if (response.status === 401) {
		// 		console.log('no permissions');
		// 		return;
		// 	}
		// 	if (response.status === 501) {
		// 		console.log('not implemented');
		// 		return;
		// 	}
		// 	if (response.status === 202) {
		// 		console.log('success');
		// 		return;
		// 	}
		});
	return false;
}

function updateQueue() {
	formdata = new FormData();
	formdata.set("action", "join")
	formdata.set('namei', namei.value);
	fetch('../Api/api.php?action=update', {
			method: 'POST',
			body: formdata,
			credentials: 'include'
		// })
		// .then(function (response) {
		// 	if (response.status === 400) {
		// 		console.log('not inserted');
		// 		return;
		// 	}
		// 	if (response.status === 401) {
		// 		console.log('no permissions');
		// 		return;
		// 	}
		// 	if (response.status === 501) {
		// 		console.log('not implemented');
		// 		return;
		// 	}
		// 	if (response.status === 202) {
		// 		console.log('success');
		// 		return;
		// 	}
		});
	return false;
}

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
	if (localStorage.getItem("namer", "emailr", "usernamer", "facebookr", "instagramr", "phoner", "passwordr", "password2r") == null) {
		checkboxr.checked = false;
	} else {
		checkboxr.checked = true;
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

// side nav and collapsibles
$(document).ready(function () {
	$('.collapsible').collapsible();
});

function open1() {
	window.scrollTo(0, -500);
	$(".collapsible").collapsible("open", 0);
	$("#modal2").modal();
	$('body').css({
		overflow: 'visible'
	});
}

function join() {
	$(".collapsible").collapsible("open", 0);
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
	$(".collapsible").collapsible("open", 1);
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
	$(".collapsible").collapsible("open", 2);
	$("#modal2").modal();
	$('body').css({
		overflow: 'visible'
	});
	$('.sidenav').sidenav({
		menuWidth: 300, // Default is 240
		closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
	});
}

//load json partial
function loadJSONpartial() {
	var out = '';
	var disabled = '';
	fetch(url, {
			method: 'GET',
			credentials: 'include'
		})
		.then(function (response) {
			if (response.status === 401) {
				populateAlert('Not Authorized, please login', 'error');
				return;
			}
			if (response.status === 204) {
				populateAlert('No queue items found', 'warning');
				return;
			}
			response.json().then(function (data) {
				console.log(data);
				data.forEach(row => {
					if (row.student_NO == 1) {
						disabled = '';
					} else {
						disabled = 'disabled';
					}
					out += '<tr><td>' + row.id +
						'</td><td>' + row.name +
						'</td><td>' + row.cosplay_name +
						'</td><td>' + row.character +
						'</td><td>' + row.series +
						// '</td><td>' + row.genre +
						'</td><td>' + row.group +
						'</td><td><img src="' + row.photo + '"></td><td><button ' + disabled + '>Delete</button>' +
						'</td><td><button ' + disabled + '>Preview</button>' +
						'</td></tr>';
				});
				document.getElementById('queue').innerHTML = outStr;
			})
		});

}
// dark mode
window.addEventListener("load", function () {
	console.log(localStorage.getItem("darktheme"))
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
})

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
		localStorage.setItem("darktheme", "false")
	}
}

// function enqueue() {
// 	populateAlert('Loading...', 'notice');
//     var fd = new FormData();
//     fd.append('queuetopic', queuetopic.value);
//     fetch('https://api.localhost/api.php?action=enqueue',
//         {
//             method: 'POST',
//             body: fd,
//             credentials: 'include'
//         }
//     )
//     .then(function(response) {
//         if(response.status === 401) {
//             populateAlert('Not Authorized, to enqueue', 'error');
//             return;
//         }
//         if(response.status === 201) {
//             populateAlert('item queued', 'notice');
//             // UPDATE THE QUEUE
//             return;
//         }
//     })
//     .catch(function(err) {
//         populateAlert('Connection unavailable', 'error');
//     });
// }

// function dequeue() {
//     closeAllModals();
//     populateAlert('Loading...', 'notice');
//     var url = 'https://api.localhost/api.php?action=dequeue&queueitem=' + queueitem.value; 
//     fetch(url, 
//         {
//             method: 'UPDATE',
//             credentials: 'include'
//         }
//     )
//     .then(function(response) {
//         if(response.status === 401) {
//             populateAlert('Not Authorized, to dequeue', 'error');
//             return;
//         }
//         if(response.status === 202) {
//             populateAlert('queue item removed', 'notice');
//             return;
//         }
//     })
//     .catch(function(err) {
//         populateAlert('Connection unavailable', 'error');
//     });
// }

function passCheck(){
    if (passwordr.value.length >0 && password2r.value.length> 0){
        if (passwordr.value === password2r.value) {
         error.innerHTML = "";
         pass1.setCustomValidity('');
         pass2.setCustomValidity('');
         return true;
        } else {
         error.innerHTML= "Passwords do not Match";
         passwordr.setCustomValidity('test');
          password2r.setCustomValidity('test2');
          return false;
        }
    }
}

function formcheckjoin() {
    var errorStr ='';
    // if(passCheck() === false) {
    //     errorStr += 'Passwords do not match';
	// }
	
    // console.log('passcheck');
    if (namei.checkValidity() === false){
        errorStr +='Please insert a valid name ';
    console.log('namechack');
	}

    if (usernamei.checkValidity() === false) {
        errorStr += 'Please insert a valid username ';
	console.log('usernamecheck');
	}

    if (facebooki.checkValidity() === false) {
        errorStr += 'Please insert a valid facebook account ';
	}

    if (instagrami.checkValidity() === false) {
		errorStr += 'Please insert a a valid instagram account ';
	}

    if (phonei.checkValidity() === false){
		errorStr +='Please insert a valid phone number ';
		console.log('phonecheck');
	}

    if (emaili.checkValidity() === false){
		errorStr +='Please insert a valid email ';
		console.log('emailcheck');
	}
	
    if (characteri.checkValidity() === false){
		 errorStr +='Please insert your character name ';
	}
	
    if (seriesi.checkValidity() === false){
        errorStr +='Please insert your series name ';
	}
	
    if (genrei.checkValidity() === false){
        errorStr +='Please answer if you are part of a group ';
	}
	
    if (groupi.checkValidity() === false){
        errorStr +='Please a Valid response ';
	}
	
    // error.innerHTML = errorStr
	formdata = new FormData()
	formdata.set("action", "join")
	
	formdata.set("name", namei.value)
	formdata.set("username", usernamei.value)
	formdata.set("facebook", facebooki.value)
	formdata.set("instagram", instagrami.value)
	formdata.set("phone", phonei.value)
	formdata.set("email", emaili.value)
	formdata.set("character", characteri.value)
	formdata.set("series", seriesi.value)
	formdata.set("genre", genrei.value)
	formdata.set("group", groupi.value)

	fetch('../Api/api.php?action=join', {
		method: 'POST',
		body: formdata,
		credentials: 'include'
})

}

function formchecklogin() {
    var errorStr ='';
    // if(passCheck() === false) {
    //     errorStr += 'Passwords do not match';
	// }
	
    // console.log('passcheck');
    if (namel.checkValidity() === false){
        errorStr +='Please insert a valid name ';
    console.log('usernamechack');
	}

    if (passwordl.checkValidity() === false) {
        errorStr += 'Please insert a valid username ';
	console.log('passwordcheck');
	}
	
    error.innerHTML = errorStr
	formdata = new FormData()
	formdata.set("action", "reg")
	formdata.set("username", namel.value)
	formdata.set("password", passwordl.value)
    fetch('../api/api.php?action=reg', {
          method: "POST",
		  body: formdata,
		  credentials: 'include',
		
          })
}

function formcheckregister() {
    var errorStr ='';
    if(passCheck() === false) {
        errorStr += 'Passwords do not match';
	}
	
    // console.log('passcheck');
    if (name.checkValidity() === false){
        errorStr +='Please insert a valid name ';
    console.log('namechack');
	}

    if (username.checkValidity() === false) {
        errorStr += 'Please insert a valid username ';
	console.log('usernamecheck');
	}

    if (facebook.checkValidity() === false) {
        errorStr += 'Please insert a valid facebook account ';
	}

    if (instagram.checkValidity() === false) {
		errorStr += 'Please insert a a valid instagram account ';
	}

    if (phone.checkValidity() === false){
		errorStr +='Please insert a valid phone number ';
		console.log('phonecheck');
	}

    if (email.checkValidity() === false){
		errorStr +='Please insert a valid email ';
		console.log('emailcheck');
	}
	
    error.innerHTML = errorStr
	formdata = new FormData()
	formdata.set("name", namei.value)
	formdata.set("username", usernamei.value)
	formdata.set("facebook", facebooki.value)
	formdata.set("instagram", instagrami.value)
	formdata.set("phone", phonei.value)
	formdata.set("email", emaili.value)
	formdata.set("password", passwordr.value)
	formdata.set("series", seriesi.value)

	formdata.set("action", "sign-up")
	formdata.set('namei', namei.value);
	fetch('../Api/api.php?action=sign-up', {
			method: 'POST',
			body: formdata,
			credentials: 'include'
          })
}

function formcheckupdate() {
    var errorStr ='';
	
    // console.log('passcheck');
    if (name.checkValidity() === false){
        errorStr +='Please insert a valid name ';
    console.log('namechack');
	}

    if (username.checkValidity() === false) {
        errorStr += 'Please insert a valid username ';
	console.log('usernamecheck');
	}

    if (facebook.checkValidity() === false) {
        errorStr += 'Please insert a valid facebook account ';
	}

    if (instagram.checkValidity() === false) {
		errorStr += 'Please insert a a valid instagram account ';
	}

    if (phone.checkValidity() === false){
		errorStr +='Please insert a valid phone number ';
		console.log('phonecheck');
	}

    if (email.checkValidity() === false){
		errorStr +='Please insert a valid email ';
		console.log('emailcheck');
	}
	
    if (character.checkValidity() === false){
		 errorStr +='Please insert your character name ';
	}
	
    if (series.checkValidity() === false){
        errorStr +='Please insert your series name ';
	}
	
    if (genre.checkValidity() === false){
        errorStr +='Please answer if you are part of a group ';
	}
	
    if (group.checkValidity() === false){
        errorStr +='Please insert a Valid Name for Player 4 ';
	}
	
    error.innerHTML = errorStr
	formdata = new FormData()
	formdata.set("action", "reg")
	formdata.set("name", namer.value)
	formdata.set("username", usernamer.value)
	formdata.set("facebook", facebookr.value)
	formdata.set("instagram", instagramr.value)
	formdata.set("phone", phoner.value)
	formdata.set("email", emailr.value)
	formdata.set("character", characterr.value)
	formdata.set("series", seriesr.value)
	formdata.set("genre", genrer.value)
	formdata.set("group", groupr.value)

	formdata.set("action", "update")
	formdata.set('namei', namei.value);
	fetch('../Api/api.php?action=update', {
			method: 'POST',
			body: formdata,
			credentials: 'include'
          })
}


// document.getElementById('submit-btn').addEventListener('submit', processForm(evt))

// document.getElementById('login-btn').addEventListener('submit', processForm(evt))

// document.getElementById('signup-btn').addEventListener('submit', processForm(evt))

// function processForm(evt) {
//   evt.preventDefault();
//   var validateArray = Array();
//   alertbox.innerHTML= '';
//   for(var loop=0;loop <evt.srcElement.length;loop++) {
//     evt.srcElement[loop].setCustomValidity('');
//     if(evt.srcElement[loop].hasArrributr('required')) {
//       if(evt.srcElement[loop].value.length>0) {
//         if(evt.srcElement[loop].checkValidity()) {
//           evt.srcElement[loop].setCustomValidity('');
//           validateArray.push({type: evt.srcElement[loop].type,
//                               name: evt.srcElement[loop].name,
//                               value: evt.srcElement[loop].value});
//         } else {
//           evt.srcElement[loop].setCustomValidity(evt.srcElement[loop].title),
//           alertbox.innerHTML = evt.srcElement[loop].title;
//           validateArray = Array(); //destroy array
//           break;
//         }
//       } else {
//         validateArray = Array();
//         break;
//       }
//     } else { //field not required validation}
//     validatedArray.push({type: evt.srcElement[loop].type,
//                           name:evt.srcElement[loop].name,
//                           value:evt.srcElement[loop].value})

//     }
//     }
//     if (validatedArray.length === 0) {
//       console.log('err'); 
//     } else {
//       console.log(validatedArray);
//     }
//     }

//     function populateAlert(msg) {
//       alertbox.innerHTML = msg;
//     }

function animateElement(elem) {

}