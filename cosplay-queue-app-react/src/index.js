import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';

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
  document.getElementById('app')
);