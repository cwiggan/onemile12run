import React, { Component } from 'react';
import Title from '../common/Title';
import Result from './Result';
import { Link } from "react-router-dom";
import axios from 'axios';

class Results extends Component {
    state = {
        results: [],
        filterResults: [],
        search: ''
    };
    componentDidMount() {
        const { year = 2018 } = this.props.match.params;
        axios.get(`/getresults/`+ year)
            .then(res => {
                this.setState({
                    results: res.data.results,
                });
            });
    }
    handleFilter = (e) => {
        console.log(e);
        this.setState({
            search: e.target.value
        })
    }
    render() {
        const filterResults = this.state.results.filter((result) => {
            return result.first_name.toLowerCase().indexOf(this.state.search.toLowerCase()) !== -1;
        });
        return (
            <div className="container-fluid raceinfo">
                <Title text='Results'/>
                <div className="row">
                    <div className="col-3">
                        <div className="list-group">
                            <Link to="/results" className="list-group-item list-group-item-action" activeClassName="active">2018 Results</Link>
                            <Link to="/results/2017" className="list-group-item list-group-item-action" activeClassName="active">2017 Results</Link>
                        </div>
                        <form className="mt-5">
                            <h3>Filter Results</h3>
                            <div className="form-group">
                                <label htmlFor="lastname">Last Name</label>
                                <input type="text" className="form-control" id="lastname" name="last_name" placeholder="Last Name" onChange={this.handleFilter}/>
                            </div>
                            <div className="form-group">
                                <label htmlFor="firstname">First Name</label>
                                <input type="password" className="form-control" id="firstname" name="first_name" placeholder="First Name"/>
                            </div>
                            <button type="submit" className="btn btn-warning">Search</button>
                        </form>
                    </div>
                    <div className="col-9">
                        <table className="table">
                            <thead>
                            <tr>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Distance</th>
                                <th scope="col">Laps</th>
                                <th scope="col">Bid</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Year</th>
                            </tr>
                            </thead>
                            <tbody>
                                { filterResults.map(
                                    result => <Result key={result.id.toString()} row={result} />
                                )}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        );
    }
}
export default Results;