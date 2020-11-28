import "./App.css";
import "materialize-css/dist/css/materialize.min.css";
import M from "materialize-css/dist/js/materialize.min.js";
import React from "react";
import ReactDOM from "react-dom";
// import { Button, Card, Row, Col } from 'react-materialize';
import "materialize-css";

class App extends React.Component {
  constructor(props) {
    super(props);
    this.errorMessage = { errorMessage: "" };
    this.logout = this.logout.bind(this);
    this.ipwhitelist = this.ipwhitelist.bind(this);
  }
  
  componentDidMount() {
    let sidenav = document.querySelector("#slide-out");
    M.Sidenav.init(sidenav, {});
    this.ipwhitelist()
  }
// For IP whitelisting I have set a rule in place that states that if a user isn’t accessing the page from the IP address of 117.20.64.153 which is the IP of my home localhost it will hide all elements on the page and display a message saying that the user doesn’t have the permission to be on the page and direct them back to the homepage. 
  ipwhitelist() {
    fetch("https://api.ipdata.co/?api-key=5c08729b24fa39782714ed7488ba2cdefd4dcf3af38725ddc9cc25ca")
    .then(response => {
      return response.json();
     }, "jsonp")
    .then(res => {
      console.log(res.ip)
      if (res.ip === "117.20.64.153") {
        console.log("Welcome");
      }
      if (res.ip !== "117.20.64.153") {
        console.log("Goodbye");
        this.setState({ errorMessage: "You do not have the permissions to access this page" });
        document.getElementById("nameform").style.display = "none";
        document.getElementById("fail").style.display = "block";
        return;
      }
    })
    .catch((err) => {
      this.setState({ errorMessage: err.message });
    });
  }


  logout() {
    fetch("http://localhost:80/GitHub/TheCosplayQueue/Api/api.php?action=logout",  {
      method: "GET",
      redirect: "error",
      headers: {
        "content-type": "application/json",
        accept: "application/json",
      },
    })
      .then((response) => {
        if (response.status === 501) {
          console.log("Logout Failed");
          this.setState({ errorMessage: "Logout Failed" });
          return;
        };
        if (response.status === 201) {
          document.getElementById("nameform").style.display = "block";
          document.getElementById("showQueueBlock").style.display = "none";
          document.getElementById("logout-button").style.display="none";
          console.log("Logout Successful");
          this.setState({ errorMessage: "Logout Successful" });
        };
      })
      .catch((err) => {
        this.setState({ errorMessage: err.message });
      });
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
                src="/the-cosplay-queue-logo-transparent.png"
                alt="the cosplay queue logo"
              />
            </li>
            <li>
              <a href="http://localhost/GitHub/TheCosplayQueue/Client/index.html">
                <i className="material-icons">
                  house
                </i>
                Home
              </a>
            </li>
            <li>
              <a id="logout-button" onClick={this.logout}>
                <i className="material-icons">lock</i>Logout
              </a>
          </li>
          </ul>
        </div>
        <h2 id="fail"> "You do not have the permissions to access this page"</h2>
        {/* {this.state.errorMessage && (
          <p className="error"> {this.state.errorMessage} </p>
        )} */}
      </div>
    );
  }
}

ReactDOM.render(<App />, document.getElementById("App"));

class NameForm extends React.Component {
  constructor(props) {
    super(props);
    this.state = { namel: "" };
    this.state = { passwordl: "" };
    this.errorMessage = { errorMessage: "" };
    this.login = this.login.bind(this);
  }

  set = (event) => {
    let nam = event.target.name;
    let val = event.target.value;
    this.setState({ [nam]: val });
  };

  // The introduction of admin credentials to the admin panel adds an extra criteria (the user must be admin) in order to log onto the admin panel page. Anyone who does successfully access the page via the same IP address but doesn’t have the correct admin credentials will not be able to log onto the admin panel and it will return an error. 
  login(e) {
    e.preventDefault();

    var formdata = new FormData();
    formdata.append("action", "login2");
    formdata.set("namel", this.state.namel);
    formdata.set("passwordl", this.state.passwordl);
    fetch("http://localhost/GitHub/TheCosplayQueue/Api/api.php?action=login2", {
      method: "POST",
      headers: {
        // 'Content-Type': "application/json",
        // "Content-Type":'application/x-www-form-urlencoded',
        accept: "application/json",
        redirect: "error",
        credentials: "include",
      },
      body: formdata,
    })
      .then((response) => {
        if (response.status === 501) {
          console.log("Login Failed");
          this.setState({ errorMessage: "Login Failed" });
          return;
        }
        if (response.status === 201) {
          console.log("Login Successful");
          this.setState({ errorMessage: "Login Successful" });
          document.getElementById("showQueueBlock").style.display="block";
          document.getElementById("nameform").style.display="none";
          document.getElementById("logout-button").style.display="block";
        }
      })
      .catch((err) => {
        this.setState({ errorMessage: err.message });
      });
  }

  render() {
    return (
      <div className="Login">
        {this.state.errorMessage && (
          <p className="error"> {this.state.errorMessage} </p>
        )}
        <form>
          <div className="namel">
            <label>Username</label>
            <input
              type="text"
              autoFocus
              name="namel"
              id={this.state.namel}
              onChange={this.set}
            />
          </div>
          <div className="passwordl">
            <label>Password</label>
            <input
              type="password"
              name="passwordl"
              value={this.state.passwordl}
              type="password"
              onChange={this.set}
            />
          </div>
          <button
            className="submit-btn"
            type="submit"
            name="action"
            onClick={this.login}
          >
            Login
          </button>
        </form>
      </div>
    );
  }
}

ReactDOM.render(<NameForm />, document.getElementById("nameform"));

class ShowQueue extends React.Component {
  constructor(props) {
    super(props);
    this.DisplayAll = this.DisplayAll.bind(this);
     this.Dequeue = this.Dequeue.bind(this);
    this.state = { results: [] };
    this.errorMessage = {errorMessage: ''};
  }
  DisplayAll() {
    fetch(
      "http://localhost:80/GitHub/TheCosplayQueue/Api/api.php?action=showDetailsAll",
      {
        method: "GET",
        redirect: "error",
        headers: {
          "content-type": "application/json",
          accept: "application/json",
        },
      }
    ).then((response) => {
      response.json().then((results) => {
        this.setState({ results: results });
        console.log(results);
      })
      .then(function(data) {
        var user_id = JSON.parse(data);
        return user_id;
    })
      .catch(err => {
        // this.setState({ errorMessage: err.message });
    });
  });
  }

  Dequeue() {
    var formdata = new FormData();
    formdata.append("action", "Dequeue");
    formdata.set("photo_taken", "Void");
    formdata.set("user_id", "")

  user_id() {

  }
    fetch(
      "http://localhost/GitHub/TheCosplayQueue/Api/api.php?action=dequeue2",
      {
        method: "POST",
        headers: {
          // 'Content-Type': "application/json",
          // "Content-Type":'application/x-www-form-urlencoded',
          accept: "application/json",
          redirect: "error",
          credentials: "include",
        },
        body: formdata,
      }
      ).then((response) => {
        if (response.status === 501) {
          console.log("Dequeue Failed");
          this.setState({ errorMessage: "Dequeue Failed" });
          return;
        }
        if (response.status === 201) {
          console.log("Dequeue Successful");
          this.setState({ errorMessage: "Dequeue Successful" });
        }
      })
    //   .catch(err => {
    //     this.setState({ errorMessage: err.message });
    // });
  }
  render() {
    const rows = this.state.results.map((row) => {
      return (
        <tr>
          <td key="row.user_id">{row.user_id}</td>
          <td key="row.name">{row.name}</td>
          <td key="row.cosplay_name">{row.cosplay_name}</td>
          <td key="row.character_name">{row.character_name}</td>
          <td key="row.series">{row.series}</td>
          <td key="row.genre">{row.genre}</td>
          <td key="row.r_group">{row.r_group}</td>
          <td key="row.remove">
            <button onClick={this.Dequeue}>Dequeue</button>
          </td>
          <td key="row.taken">
            <button>Photo Taken</button>
          </td>
        </tr>
      );
    });

    return (
      <div>
         {this.state.errorMessage && (
          <p className="error"> {this.state.errorMessage} </p>
        )}
        <div className="showQueue">
          <button
            className="aqua"
            waves="light"
            icon="add"
            onClick={this.DisplayAll}
          >
            {" "}
            Show Queue
          </button>
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
            <tbody>{rows}</tbody>
          </table>
        </div>
      </div>
    );
  }
}
// }

ReactDOM.render(<ShowQueue />, document.getElementById("showQueueBlock"));

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
