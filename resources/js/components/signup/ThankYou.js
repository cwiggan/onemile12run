import React from 'react';

const ThankYou = (props) => (
    <div className="card-body">
        <h5 className="card-title">Thank You</h5>
        <p className="card-text">
            Congratulations {props.data.name} on taking the first step toward participating in the 2019 1 Mile with a Smile 12 hour run, event taking place August 10, 2019 in Chesapeake VA, Virginia. This exciting event kicks off Saturday, August 10 at the Oak Gove Lake Park with the 12 Hour Endurance!
        </p>
        <p className="card-text">
            Head over to Facebook and Like us to stay up to date with race announcements and happenings.
        </p>
        <p className="card-text">
        Confirmation Number: {props.data.entry}<br/>
        Order Total: {props.data.total}
        </p>
        <p className="card-text">
        Packet Pick up
        No Packet Pick Up For 12 Hour Race Participant Race Day Check-in AT 6:00AM
        </p>
        <p className="card-text">
        The 12 Hour Endurance Run Starts at 7am and ends at 7pm
        You can bring A small tent.
        </p>
        <p className="card-text">
        Still have questions ?
        Email us: info@1milewithasmile.com
        </p>
        <p className="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

    </div>
);

export default ThankYou;