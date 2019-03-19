import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Route, Switch, Router } from "react-router-dom";

import Header from './common/Header';
import Footer from './common/Footer';
import Home from './home/Home';
//import SignUp from './signup/SignUp';
import Checkout from './signup/Checkout';
import Results from './results/ResultsWrap';
import Contact from './pages/Contact';
import Volunteer from './pages/Volunteer';

export default class App extends Component {
    render() {
        return (
            <React.Fragment>
                <Header />
                    <Switch>
                        <Route exact path="/" component={Home} />
                        <Route path="/sign-up" component={Checkout} />
                        <Route exact path="/results" component={Results} />
                        <Route path="/results/:year" component={Results} />
                        <Route path="/contact" component={Contact} />
                        <Route path="/volunteer" component={Volunteer} />
                    </Switch>
                <Footer />
            </React.Fragment>
        );
    }
}

if (document.getElementById('root')) {
    ReactDOM.render(
        <BrowserRouter>
            <App />
        </BrowserRouter>, document.getElementById('root')
    );
}
