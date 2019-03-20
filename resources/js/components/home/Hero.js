import React from 'react';

const Hero = () => (
    <div className="hero_img">
        <img className="back" src={'img/home.png'} />
        <div className="overlay">
            <div className="container">
                <h1 className="text-center">
                    <span className="top">One Mile With a Smile 12 Hour Run</span>
                    <span className="mid">August 10, 2019</span>
                    <span className="last">@Oak Grove Lake Park, Chesapeake, VA</span>
                </h1>
            </div>
        </div>
    </div>
);

export default Hero;