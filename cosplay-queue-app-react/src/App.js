import "./App.css";
import "materialize-css/dist/css/materialize.min.css";
import M from "materialize-css/dist/js/materialize.min.js";
import React from "react";
import ReactDOM from "react-dom";
// import { Button, Card, Row, Col } from 'react-materialize';
import 'materialize-css';
// import {user_id} from 

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

class NameForm extends React.Component {
   constructor(props) {
     super(props);
     this.state = {namel: ''};
     this.state = {passwordl: ''};
 
     this.login = this.login.bind(this);
   }

   set = (event) => {
     let nam = event.target.name;
     let val = event.target.value;
    this.setState({[nam]:val});
    }

   login(e) {
      e.preventDefault();
     
      // if (this.state.namel.checkValidity() === false) {
      //   errorStr += "Please insert a valid name ";
      //   console.log("username error");
      //   return;
      // }
    
      // if (this.state.passwordl.checkValidity() === false) {
      //   errorStr += "Please insert a valid username ";
      //   console.log("password error");
      //   return;
      // }
    
      var formdata = new FormData();
      formdata.append("action", "login2");
      formdata.set("namel", this.state.namel);
      formdata.set("passwordl", this.state.passwordl);
      fetch('http://localhost/GitHub/TheCosplayQueue/Api/api.php?action=login2', {
        method: "POST",
        headers: {
          // 'Content-Type': "application/json",
          // "Content-Type":'application/x-www-form-urlencoded',
          "accept":"application/json",
          redirect:"error",
          credentials:"include"
          },
          body: formdata,
      })

        .then((response) => {
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
             name='namel'
             id={this.state.namel}
             onChange={this.set}
             />
           </div>
           <div className="passwordl">
           <label>Password</label>
           <input type="password"
           name='passwordl'
             value={this.state.passwordl}
             type="password"
             onChange={this.set}
             />
           </div>
         <button className="submit-btn"
         // disabled={!validateForm()} 
         type="submit" name="action" onClick={this.login}>
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
     this.Dequeue = this.Dequeue.bind(this);
    this.state = {results: []};
   }
   DisplayAll() {
    fetch("http://localhost:80/GitHub/TheCosplayQueue/Api/api.php?action=showDetailsAll", {
      method: "GET",
      redirect:"error",
      "headers": {
      "content-type":"application/json",
      "accept":"application/json"
      },
    })

    .then((response) => {
      response.json().then((results) => {
        this.setState({results: results});
        console.log(results);
      });
    });
  }

  Dequeue() {
    var formdata = new FormData();
    var user_id = user_id;
    formdata.append("action", "Dequeue");
    formdata.set("photo_taken", "Void");
    formdata.set("user_id", key={row.user_id});
    fetch('http://localhost/GitHub/TheCosplayQueue/Api/api.php?action=dequeue2', {
      method: "POST",
      headers: {
        // 'Content-Type': "application/json",
        // "Content-Type":'application/x-www-form-urlencoded',
        "accept":"application/json",
        redirect:"error",
        credentials:"include"
        },
        body: formdata,
    }) 
    .then(function (response) {
      if (response.status === 501) {
        console.log("Dequeue Failed");
        return;
      }
      if (response.status === 201) {
        console.log("Dequeue Successful");
      }
    })
    .catch(function (err) {
    });
}
   render() {
     const rows = this.state.results.map((row) => {
     return (<tr>
       <td key="user_id">{row.user_id}</td>
     <td key="name">{row.name}</td>
     <td key="cosplay_name">{row.cosplay_name}</td>
     <td key="character_name">{row.character_name}</td>
     <td key="series">{row.series}</td>
     <td key="genre">{row.genre}</td>
     <td key="r_group">{row.r_group}</td>
     <td key="remove"><button onClick={this.Dequeue}>Dequeue</button></td>
     <td key="taken"><button>Photo Taken</button></td>
     </tr>)
     })

     return (
       <div>
     <div className="showQueue">
         <button className='aqua' waves='light' icon='add' onClick={this.DisplayAll}> Show Queue</button>
     </div>
     <div>
     <table className="results">
       <thead>
         <tr>
           <th>Name</th>
           <th>Cosplay Name</th>
           <th>Character Name</th>
           <th>Series</th>
           <th>Genre</th>
           <th>Are you in a Group?</th>
           <th>Remove from Queue</th>
           <th>Photo Taken</th>
           </tr>
           </thead>
           <tbody>
            {rows}
           </tbody>
           </table>
     </div>
     </div>
     );
    }
  }
// }
 
 ReactDOM.render(
   <ShowQueue />,
   document.getElementById('showQueue')
 );


// class Dequeue extends React.Component {
//    constructor(props) {
//      super(props);
//      this.Dequeue = this.Dequeue.bind(this);
//    }

//    Dequeue() {
//     var formdata = new FormData();
//     var user_id = user_id;
//     formdata.append("action", "Dequeue");
//     formdata.set("photo_taken", "Void");
//     // formdata.set("user_id", {key="user_id"});
//     fetch('http://localhost/GitHub/TheCosplayQueue/Api/api.php?action=dequeue2', {
//       method: "POST",
//       headers: {
//         // 'Content-Type': "application/json",
//         // "Content-Type":'application/x-www-form-urlencoded',
//         "accept":"application/json",
//         redirect:"error",
//         credentials:"include"
//         },
//         body: formdata,
//     }) 
//     .then(function (response) {
//       if (response.status === 501) {
//         console.log("Dequeue Failed");
//         return;
//       }
//       if (response.status === 201) {
//         console.log("Dequeue Successful");
//       }
//     })
//     .catch(function (err) {
//     });
// }
//    render() {
//      return (
//      <div className="Dequeue">
//          <button className='aqua' waves='light' icon='add' onClick={this.Dequeue}>Remove from Queue</button>
//      </div>
//      );
//    }
//  }
 
//  ReactDOM.render(
//    <Dequeue />,
//    document.getElementById('dequeue')
//  );

//  class Photo extends React.Component {
//    constructor(props) {
//      super(props);
//    }
//    render() {
//      return (
//      <div className="photoTaken">
//          <button className='aqua' waves='light' icon='add'>Photo Taken</button>
//      </div>
//      );
//    }
//  }
 
//  ReactDOM.render(
//    <Photo />,
//    document.getElementById('photoTaken')
//  );

export default App;
