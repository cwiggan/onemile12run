import React from 'react';
import { Link, NavLink } from 'react-router-dom';

const Header = (props) => (
    <nav className="navbar navbar-expand-lg">
        <div className="container-fluid">
            <Link to="/" className="navbar-brand"><img src={'/img/1milesmile.png'} height="50" /></Link>
            <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span className="navbar-toggler-icon"></span>
            </button>
            <div className="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul className="navbar-nav">
                    <li className="nav-item">
                        <NavLink to="/" className="nav-link" activeClassName="active">Home</NavLink>
                    </li>
                    <li className="nav-item">
                        <NavLink to="/sign-up" className="nav-link">Sign Up</NavLink>
                    </li>
                    <li className="nav-item">
                        <NavLink to="/results" className="nav-link">Results</NavLink>
                    </li>
                    <li className="nav-item">
                        <NavLink to="/contact" className="nav-link">Contact</NavLink>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
);

export default Header;