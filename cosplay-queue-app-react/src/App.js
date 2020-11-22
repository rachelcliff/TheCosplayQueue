import "./App.css";
import "materialize-css/dist/css/materialize.min.css";
import M from "materialize-css/dist/js/materialize.min.js";
import React from "react";
import ReactDOM from "react-dom";
import { Button, Card, Row, Col } from 'react-materialize';
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

class NameForm extends React.Component {
   constructor(props) {
     super(props);
     this.state = {value: ''};
 
     this.handleChange = this.handleChange.bind(this);
     this.handleSubmit = this.handleSubmit.bind(this);
   }
 
   handleChange(event) {
     this.setState({value: event.target.value});
   }
 
   handleSubmit(event) {
     alert('A name was submitted: ' + this.state.value);
     event.preventDefault();
   }
   render() {
     return (
       <div className="Login">
       <form>
         <div className="username">
       {/* onSubmit={handleSubmit} */}
           <label>Email</label>
           <input type="text"
             autoFocus
             // value={email}
             // onChange={e => setEmail(e.target.value)}
             />
           </div>
           <div className="password">
           <label>Password</label>
           <input type="password"
             // value={password}
             // onChange={e => setPassword(e.target.value)}
             // type="password"
             />
           </div>
         <button className="submit-btn"
         // disabled={!validateForm()} 
         type="submit">
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
   }
   render() {
     return (
     <div className="showQueue">
         <button className='aqua' waves='light' icon='add'> Show Queue </button>
     </div>
     );
   }
 }
 
 ReactDOM.render(
   <ShowQueue />,
   document.getElementById('showQueue')
 );

 class DisplayAll extends React.Component {
    constructor(props) {
    super(props);
    this.state = {
       user_id: [],
       name:'',
       cosplay_name:'',
       character_name:'',
       series:'',
       genre:'',
       r_group:'',
    };
    this.dequeue=this.dequeue.bind(this);
    this.taken=this.taken.bind(this);
    this.handleChange = this.handleChange.bind(this);
   }

    dequeue(e) {
       e.preventDefault();

       fetch("../Api/api.php?action=dequeue", {
         method: "POST",
         "headers": {
         "content-type":"application/json",
         "accept":"application/json"
         },
         "body":JSON.stringify({
           user_id: this.state.user_id,
           name: this.state.name,
           cosplay_name: this.state.cosplay_name,
           series: this.state.series,
           genre: this.genre.series,
           r_group: this.state.r_group
         })
    })
    .then(response=> response.json())
    .then(response => {console.log(response)
   })
   .catch(err => {console.log(err);
   });
}
taken(e) {
   e.preventDefault();

   fetch("../Api/api.php?action=photo_taken", {
     method: "POST",
     "headers": {
     "content-type":"application/json",
     "accept":"application/json"
     },
     "body":JSON.stringify({
       user_id: this.state.user_id,
       name: this.state.name,
       cosplay_name: this.state.cosplay_name,
       series: this.state.series,
       genre: this.genre.series,
       r_group: this.state.r_group
     })
})
.then(response=> response.json())
.then(response => {console.log(response)
})
.catch(err => {console.log(err);
});
}
    render() {
       return (
          <table>
             <thead>
                <tr>
                   <th>Name</th>
                   <th>Cosplay Name</th>
                   <th>Character Name</th>
                   <th>Series</th>
                   <th>Genre</th>
                   <th>Are you in a Group?</th>
                </tr>
             </thead>
             <tbody>
             </tbody>
          </table>
       )
    }
   }

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
