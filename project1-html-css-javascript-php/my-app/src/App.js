import React from 'react';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import { Login } from './Login';
import UnitsPage from './UnitsPage';

const App = () => {
  return (
    <Router>
      <Switch>
        <Route exact path="/" component={Login} />
        <Route exact path="/units" component={UnitsPage} />
      </Switch>
    </Router>
  );
};

export default App;
