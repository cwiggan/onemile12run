import React from 'react';

const About = () => (
    <div className="about">
        <div className="container">
            <div className="row">
                <div className="col-lg-6">
                    <h1>One Mile With A Smile</h1>
                    <p>
                        The One Mile With a Smile Running Series is an event throughout the year featuring 5ks, 1 Mile and the 12 hour endurance run.  These events provide fun for individuals of different fitness level. It does not matter how fast or slow you run we welcome everyone.
                    </p>
                    <p>
                        If you enjoy pushing yourself sign up for the 12 hour run. If you like a little workout try the 5k. If you just want to try a first time race the 1 mile might be pleasing.
                    </p>
                    <p>
                        There is something for everyone!
                    </p>
                    <div className="fb-like" data-href="https://www.facebook.com/onemilewithasmile/" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                </div>
                <div className="col-lg-6">
                    <img src={'img/about-img.png'} />
                </div>
            </div>
        </div>
    </div>
);

export default About;