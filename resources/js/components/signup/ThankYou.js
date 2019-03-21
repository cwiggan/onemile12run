import React from 'react';

const ThankYou = (props) => (
    <div className="card-body">
        <h5 className="card-title">Thank You</h5>
        <p className="card-text">
            Congratulations {props.data.name} on taking the first step toward participating in the 2019 1 Mile with a Smile 12 hour run. This exciting event kicks off Saturday, August 10 at the Oak Gove Lake Park!
        </p>
        <p className="card-text">
                Head over to <a href="https://www.facebook.com/onemilewithasmile/">Facebook and Like us</a> to stay up to date with race announcements and happenings.
        </p>
        <p className="card-text">
                <strong>Confirmation Number</strong>: {props.data.entry}<br/>
                <strong>Order Total</strong>: {props.data.total}
        </p>
        <p className="card-text">
                <strong>Packet Pick up</strong><br/> No Packet Pick Up For 12 Hour Race <br/> Race Day Check-in AT 6:00AM
        </p>
        <p className="card-text">
                The 12 Hour Endurance Run Starts at 7am and ends at 7pm
                You can bring A small ez pop up tent.
        </p>
        <p className="card-text">
        Still have questions ?
        Email us: info@1milewithasmile.com
        </p>
    </div>
);

export default ThankYou;