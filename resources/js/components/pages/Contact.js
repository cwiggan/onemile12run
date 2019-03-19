import React from 'react';
import { Formik, Field, Form, ErrorMessage } from 'formik';
import Title from '../common/Title';
import * as Yup from 'yup';
import axios from 'axios';

const Volunteer = (props) => {
    return (
        <div className="container-fluid raceinfo">
            <div className="row">
                <div className="col">
                    <Title text='Contact Us'/>
                    <Formik
                        initialValues={{
                            name: '',
                            message: '',
                            email: '',
                        }}
                        validationSchema={Yup.object().shape({
                            email: Yup.string()
                                .email('Invalid email address')
                                .required('Required'),
                            name: Yup.string().required('Required'),
                            message: Yup.string().required('Required'),
                        })}
                        onSubmit={(values, actions) => {
                            actions.setSubmitting(false);
                            axios.post('/emailForm', values).then((res) => {
                                if (res.data.success) {
                                    actions.setSubmitting(true);
                                }
                            }).catch((error) => {
                                console.log(error.response);
                            });
                        }}
                        render={({ isSubmitting, status }) => (
                            <Form>
                                <div className="row">
                                    <div className="col-5">
                                        <div className="card">
                                            <div className="card-body">
                                                <p>
                                                    Please use the form for questions relating to One Mile With A Smile
                                                    events. Questions are usually answered within 24 hours
                                                    (Monday-Friday), but response times may be longer during an event
                                                    week.
                                                </p>
                                                <p>
                                                    <strong>SPONSORSHIP OPPORTUNITIES</strong><br/>
                                                    For sponsorship or advertising opportunities, please email
                                                    partnership@1milewithasmile.com
                                                </p>
                                                {isSubmitting ?
                                                    <div className="alert alert-success" role="alert">
                                                        Thanks for contacting us! We will be in touch with you shortly.
                                                    </div> : null}
                                            </div>
                                        </div>
                                    </div>
                                    <div className="col-7">
                                        <div className="card">
                                            <div className="card-body">
                                                <div className="form-group">
                                                    <label htmlFor="firstName">Name</label>
                                                    <Field name="name" placeholder="Your namee"
                                                           className="form-control"/>
                                                    <ErrorMessage name="name" component="div" className="field-error"/>
                                                </div>
                                                <div className="form-group">
                                                    <label htmlFor="email">Email</label>
                                                    <Field name="email" placeholder="jane@acme.com" type="email"
                                                           className="form-control"/>
                                                    <ErrorMessage name="email" component="div" className="field-error"/>
                                                </div>
                                                <div className="form-group">
                                                    <label htmlFor="message">Message</label>
                                                    <Field name="message" component="textarea" placeholder="Message"
                                                           type="email" className="form-control"/>
                                                    <ErrorMessage name="message" component="div"
                                                                  className="field-error"/>
                                                </div>
                                            </div>
                                            <div className="card-footer text-muted">
                                                <button className="btn btn-warning" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </Form>
                        )}
                    />
                </div>
            </div>
        </div>
    )
};

export default Volunteer;