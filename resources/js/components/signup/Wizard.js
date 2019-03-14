import React from 'react';
import { Formik } from 'formik';
import {injectStripe} from 'react-stripe-elements';

class Wizard extends React.Component {
    static Page = ({ children }) => children;

    constructor(props) {
        super(props);
        this.state = {
            page: 0,
            values: props.initialValues,
        };
    }

    next = (values) => {
        this.setState(state => ({
            page: Math.min(state.page + 1, this.props.children.length - 1),
            values: values,
        }));
    };


    previous = () => {
        this.setState(state => ({
            page: Math.max(state.page - 1, 0),
        }));
    };

    validate = (values) => {
        const activePage = React.Children.toArray(this.props.children)[
            this.state.page
            ];
        return activePage.props.validate ? activePage.props.validate(values) : {};
    };

    handleSubmit = (values, bag) => {
        const { children, onSubmit } = this.props;
        const { page } = this.state;
        const isLastPage = page === React.Children.count(children) - 1;
        if (isLastPage) { console.log('last step');
            return onSubmit(values, bag);
        } else {
            this.next(values);
            bag.setTouched({});
            bag.setSubmitting(false);
        }
    };

    render() {
        const { children, isComplete } = this.props; //console.log(this.props);
        const { page, values } = this.state;
        const activePage = React.Children.toArray(children)[page];
        const isLastPage = page === React.Children.count(children) - 1;

        return (
            <Formik
                initialValues={values}
                enableReinitialize={false}
                validate={this.validate}
                validationSchema={activePage.props.schema}
                onSubmit={this.handleSubmit}
                render={({ values, handleSubmit, isSubmitting, handleReset, errors }) => (
                    <form onSubmit={handleSubmit}>
                        <div className="card-body">{activePage}</div>
                        <div className="card-footer text-muted">
                            {page > 0 && (
                                <button
                                    type="button"
                                    className="btn btn-warning mr-2"
                                    onClick={this.previous}
                                >
                                    « Previous
                                </button>
                            )}

                            {!isLastPage && <button className="btn btn-warning" type="submit">Continue</button>}
                            {isLastPage && isComplete && (
                                <button type="submit" className="btn btn-warning" disabled={isSubmitting}>
                                    Submit
                                </button>
                            )}
                        </div>
                    </form>
                )}
            />
        );
    }
}

export default Wizard;