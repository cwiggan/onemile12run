import React from 'react';

const Result = (props) => (
    <tr>
        <td>
            {props.row.first_name}
        </td>
        <td>
            {props.row.last_name}
        </td>
        <td>
            {props.row.distance} miles
        </td>
        <td>
            {props.row.laps}
        </td>
        <td>
            {props.row.bid}
        </td>
        <td>
            {props.row.gender}
        </td>
        <td>
            {props.row.year}
        </td>
    </tr>
);

export default Result;