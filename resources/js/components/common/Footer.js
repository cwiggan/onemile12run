import React from 'react';
import { Link } from "react-router-dom";

const Footer = () => (
    <footer className="content-info">
        <div className="container">
            <div className="col-lg-12">
                <nav className="nav-primary">
                    <div className="menu-footer-container">
                        <ul id="menu-footer" className="nav justify-content-center">
                            <li className="nav-item"><Link to="/" className="nav-link">Home</Link></li>
                            <li className="nav-item"><Link to="/sign-up" className="nav-link">Sign Up</Link></li>
                            <li className="nav-item"><Link to="/results" className="nav-link">Results</Link></li>
                            <li className="nav-item"><Link to="/contact" className="nav-link">Contact Us</Link></li>
                        </ul>
                    </div>
                </nav>
                <p className="text-center">©2019 - One Mile With a Smile. All Rights Reserved | Privacy Policy</p>
            </div>
        </div>
    </footer>
);
export default Footer;