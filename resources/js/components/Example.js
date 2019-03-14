import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Header from './Header';

export default class App extends Component {
    render() {
        return (
            <Header />
        );
    }
}

if (document.getElementById('root')) {
    ReactDOM.render(<App />, document.getElementById('root'));
}
