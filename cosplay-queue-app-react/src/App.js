import "./App.css";
import "materialize-css/dist/css/materialize.min.css";
import M from "materialize-css/dist/js/materialize.min.js";
import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
// import { Button, Card, Row, Col } from 'react-materialize';
import 'materialize-css';

class App extends React.Component {
  componentDidMount() {
    let sidenav = document.querySelector("#slide-out");
    M.Sidenav.init(sidenav, {});
  }
  render() {
    return (
      <div className="navigation">
        <div className="container">
          <nav className="nav">
            <a
              href="#"
              data-target="slide-out"
              className="sidenav-trigger show-on-large"
              id="hamburger"
            >
              <i className="material-icons">menu</i>
            </a>
            <img
              id="logo"
              src="/the-cosplay-queue-logo-transparent.png"
              alt="The cosplay queue logo"
            />
          </nav>
          <ul id="slide-out" className="sidenav">
            <li>
              <img
                id="logo-menu"
                src="the-cosplay-queue-logo-transparent.png"
                alt="the cosplay queue logo"
              />
            </li>
            <li>
              <a>
                <i href="index.html" className="material-icons">
                  house
                </i>
                Home
              </a>
            </li>
          </ul>
        </div>
      </div>
    );
  }
}
ReactDOM.render(<App />, document.getElementById("App"));

// function DisplayAll() {
//   const [data, setData] = useState(null);
//   useEffect(() => {
//     fetch('../Api/api.php?action=showDetailsAll')
//     .then(result => result.json())
//     .then(setData)
//     .catch(console.error);
//   }, []);
//   if(data) {
//     console.log(data);
//     return (
//       <>
//       <div id="showAll" className="container">
//         {data.map((queue) => (
//           <div key={queue.user_id} className="queuepost">
//             <div className="card teal darken-3">
//               <div className="card-content-white-text">
//               <span className="card-title">{queue.Name}</span>
//               <p>{queue.cosplay_name}</p>
//               <p>{queue.character.name}</p>
//         <p>{queue.series}</p>
//         <p>{queue.genre}</p>
//         <p>{queue.r_group}</p>
//               </div>
//             </div>
//             </div>
//         ))
// }    
//       </div>
//       </>
//     )
//   }
//   }

class NameForm extends React.Component {
   constructor(props) {
     super(props);
     this.state = {value: ''};
 
     this.login = this.login.bind(this);
   }

   handleChange(event) {
    this.state = {namel: ''};
    this.state = {passwordl: ''};
    
    this.setState({value: event.target.value});
    this.setState({namel:namel.target.value});
    this.setState({passwordl:passwordl.target.value});
    }

   login(e) {
      e.preventDefault();
      var errorStr = "";
      this.state = {namel: ''};
      this.state = {passwordl: ''};
     
      // if (namel.checkValidity() === false) {
      //   errorStr += "Please insert a valid name ";
      //   console.log("username error");
      //   return;
      // }
    
      // if (passwordl.checkValidity() === false) {
      //   errorStr += "Please insert a valid username ";
      //   console.log("password error");
      //   return;
      // }
    
      // formdata = new FormData();
      // formdata.set("namel", namel.value);
      // formdata.set("passwordl", passwordl.value);
      // const namel =  target.namel;
      // const passwordl = target.passwordl;
      
     
      fetch('http://localhost:80/TheCosplayQueue/Api/api.php?action=login2', {
        method: "POST",
        // mode:"cors",
        "headers": {
          "content-type":"application/json",
          "accept":"application/json"
          },
          "body":JSON.stringify({
            namel:this.state.namel,
            passwordl:this.state.passwordl
          }),
      })
  //     .then(response=> response.json())
  //   .then(response => {console.log(response)
  //  })
        .then(function (response) {
          if (response.status === 501) {
            console.log("Login Failed");
            return;
          }
          if (response.status === 201) {
            console.log("Login Successful");
          }
        })
        .catch(function (err) {
        });
    }
  
   render() {
     return (
       <div className="Login">
       <form>
         <div className="namel">
           <label>Username</label>
           <input type="text"
             autoFocus
             value={this.state.namel}
             onChange={e => setnamel(e.target.value)}

             />
           </div>
           <div className="passwordl">
           <label>Password</label>
           <input type="password"
             value={this.state.passwordl}
             type="password"
             onChange={e => setpasswordl(e.target.value)}

             />
           </div>
         <button className="submit-btn"
         // disabled={!validateForm()} 
         type="submit" onClick={this.login}>
           Login
         </button>
       </form>
     </div>
     );
   }
 }
 
 ReactDOM.render(
   <NameForm />,
   document.getElementById('nameform')
 );
 
 class ShowQueue extends React.Component {
   constructor(props) {
     super(props);
     this.DisplayAll = this.DisplayAll.bind(this);
   }
   DisplayAll() {
    var outStr = "";
    var disabled = "";
    fetch("localhost/cosplay-queue/Api/api.php?action=showDetailsAll", {
      method: "GET",
      "headers": {
      "content-type":"application/json",
      "accept":"application/json"
      },
      "body":JSON.stringify({
        name:this.state.namel,
password:this.state.passwordl
      }),
    }).then(function (response) {
      response.json().then(function (results) {
        console.log(results);
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
   render() {
     return (
     <div className="showQueue">
         <button className='aqua' waves='light' icon='add' onClick={this.DisplayAll}> Show Queue</button>
     </div>
     );
   }
 }
 
 ReactDOM.render(
   <ShowQueue />,
   document.getElementById('showQueue')
 );

 

//  class DisplayAll extends React.Component {
//     constructor(props) {
//     super(props);
//     this.state = {
//        user_id: [],
//        name:'',
//        cosplay_name:'',
//        character_name:'',
//        series:'',
//        genre:'',
//        r_group:'',
//     };
//     this.dequeue=this.dequeue.bind(this);
//     this.taken=this.taken.bind(this);
//     this.handleChange = this.handleChange.bind(this);
//    }

//     dequeue(e) {
//        e.preventDefault();

//        fetch("../Api/api.php?action=dequeue", {
//          method: "POST",
//          "headers": {
//          "content-type":"application/json",
//          "accept":"application/json"
//          },
//          "body":JSON.stringify({
//            user_id: this.state.user_id,
//            name: this.state.name,
//            cosplay_name: this.state.cosplay_name,
//            series: this.state.series,
//            genre: this.genre.series,
//            r_group: this.state.r_group
//          })
//     })
//     .then(response=> response.json())
//     .then(response => {console.log(response)
//    })
//    .catch(err => {console.log(err);
//    });
// }
// taken(e) {
//    e.preventDefault();

//    fetch("../Api/api.php?action=photo_taken", {
//      method: "POST",
//      "headers": {
//      "content-type":"application/json",
//      "accept":"application/json"
//      },
//      "body":JSON.stringify({
//        user_id: this.state.user_id,
//        name: this.state.name,
//        cosplay_name: this.state.cosplay_name,
//        series: this.state.series,
//        genre: this.genre.series,
//        r_group: this.state.r_group
//      })
// })
// .then(response=> response.json())
// .then(response => {console.log(response)
// })
// .catch(err => {console.log(err);
// });
// }
//     render() {
//        return (
//           <table>
//              <thead>
//                 <tr>
//                    <th>Name</th>
//                    <th>Cosplay Name</th>
//                    <th>Character Name</th>
//                    <th>Series</th>
//                    <th>Genre</th>
//                    <th>Are you in a Group?</th>
//                 </tr>
//              </thead>
//              <tbody>
//              </tbody>
//           </table>
//        )
//     }
//    }

class Dequeue extends React.Component {
   constructor(props) {
     super(props);
   }
   render() {
     return (
     <div className="Dequeue">
         <button className='aqua' waves='light' icon='add'>Remove from Queue</button>
     </div>
     );
   }
 }
 
 ReactDOM.render(
   <Dequeue />,
   document.getElementById('dequeue')
 );

 class Photo extends React.Component {
   constructor(props) {
     super(props);
   }
   render() {
     return (
     <div className="photoTaken">
         <button className='aqua' waves='light' icon='add'>Photo Taken</button>
     </div>
     );
   }
 }
 
 ReactDOM.render(
   <Photo />,
   document.getElementById('photoTaken')
 );

export default App;
