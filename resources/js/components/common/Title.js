import React from 'react';

const Title = (props) => (
    <header>
        <h1 className="entry-title">
            { props.text }
        </h1>
    </header>
);

export default Title;