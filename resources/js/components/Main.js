import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Route, Switch } from "react-router-dom";

import Header from './common/Header';
import Footer from './common/Footer';
import Home from './home/Home';
//import SignUp from './signup/SignUp';
import Checkout from './signup/Checkout';
import Results from './results/Results';
import Contact from './pages/Contact';

export default class App extends Component {
    render() {
        return (
            <React.Fragment>
                <Header />
                <Switch>
                    <Route exact path="/" component={Home} />
                    <Route path="/sign-up" component={Checkout} />
                    <Route path="/results" component={Results} />
                    <Route path="/results/:year" component={Results} />
                    <Route path="/contact" component={Contact} />
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
