import React from 'react';
import Title from '../common/Title';
import { Field, ErrorMessage } from 'formik';
import * as Yup from 'yup';
import Wizard from './Wizard';
import ThankYou from './ThankYou';
import {injectStripe, CardElement} from 'react-stripe-elements';
import axios from 'axios';


class SignUp extends React.Component {
    state = {
        isSubmitting: false,
        thankYou: false,
        confirm: [],
        status: true,
        loading: false,
    };
    changeCard = (event) => {
        //console.log(event);
        let status = false;
        if (event.complete && !event.error) {
            status = true
        }
        this.setState({
            isSubmitting: status
        });
    };
    componentDidMount() {
        axios.get(`/countSignup`)
            .then(res => {
                this.setState({
                    status: res.data.status,
                });
            });
    }
    render() {
        const StepOneSchema = Yup.object().shape({
            first_name: Yup.string()
                .min(2, 'Too Short!')
                .max(50, 'Too Long!')
                .required('Enter Your First Name'),
            last_name: Yup.string()
                .min(2, 'Too Short!')
                .max(50, 'Too Long!')
                .required('Enter Your Last Name'),
            email: Yup.string()
                .email('Enter a Valid Email')
                .required('Enter your Email'),
            phone: Yup.string().matches(/^[2-9]\d{9}$/, {message: "Please enter valid 10 Digit Phone Number. No Space or Dash", excludeEmptyString: false}),
            birth_date: Yup.date()
                .required('Enter your Birthday'),
        });
        const StepSchemaTwo = Yup.object().shape({
            address: Yup.string()
                .required('Enter Your Address'),
            gender: Yup.string()
                .required('Select A Gender'),
            city: Yup.string()
                .required('Enter City'),
            state: Yup.string()
                .required('Select Your State'),
            zip_code: Yup.number()
                .required('Enter Zip Code'),
            emergency_name: Yup.string()
                .required('Enter Emergency Contact'),
            emergency_phone: Yup.string()
                .required('Enter Emergency Contact Phone')
        });
        const StepSchemaThree = Yup.object().shape({
            consent: Yup.bool()
                .required('You have to agree with our Terms and Conditions'),
        });
        return (

                <div className="container-fluid raceinfo">
                    <Title text='Sign Up For The 12 Hour Endurance Run'/>
                    <div className="row">
                    <div className="col-12 col-md-6">
                    <div className="card">
                        {this.state.loading ? <div className="processing"><img src={'/img/ajax-loader.gif'} /></div> : null}
                        {this.state.thankYou ? (
                            <ThankYou data={this.state.confirm}/>
                        ) : (
                            this.state.status ? (
                        <Wizard
                            initialValues={{
                                email: '',
                                first_name: '',
                                last_name: '',
                                address: '',
                                city: '',
                                state: '',
                                zip_code: '',
                                emergency_name: '',
                                emergency_phone: '',
                                phone: '',
                                gender: '',
                                t_shirt: '',
                                consent: '',
                                birth_date: '',
                                stripe: null
                            }}
                            onSubmit={(values, actions) => {
                                this.props.stripe.createToken({name: values.first_name }).then(({token}) => {
                                    values.stripe = token.id;

                                    this.setState({ loading: true });

                                    axios.post('/saveform',values).then((res) => {
                                        if (res.data.success) {
                                            this.setState({
                                                thankYou: true,
                                                confirm: res.data.confirm,
                                                loading: false,
                                            });
                                        }
                                    }).catch((error) => {
                                        actions.setSubmitting(false);
                                        actions.setFieldError("stripe", error.response.data.message);
                                        this.setState({ loading: false });
                                    });
                                });
                            }}
                            isComplete={this.state.isSubmitting}
                        >
                            <Wizard.Page schema={StepOneSchema}>
                                <div className="form-group">
                                    <label>First Name</label>
                                    <Field
                                        name="first_name"
                                        component="input"
                                        type="text"
                                        placeholder="First Name"
                                        className="form-control"
                                    />

                                    <ErrorMessage
                                        name="first_name"
                                        component="div"
                                        className="field-error"
                                    />
                                </div>
                                <div className="form-group">
                                    <label>Last Name</label>
                                    <Field
                                        name="last_name"
                                        component="input"
                                        type="text"
                                        placeholder="Last Name"
                                        className="form-control"
                                    />
                                    <ErrorMessage
                                        name="last_name"
                                        component="div"
                                        className="field-error"
                                    />
                                </div>
                                <div className="form-group">
                                    <label>Phone</label>
                                    <Field
                                        name="phone"
                                        component="input"
                                        type="text"
                                        placeholder="Your Phone"
                                        className="form-control"
                                    />
                                    <ErrorMessage
                                        name="phone"
                                        component="div"
                                        className="field-error"
                                    />
                                </div>
                                <div className="form-group">
                                    <label>Email</label>
                                    <Field
                                        name="email"
                                        component="input"
                                        type="email"
                                        placeholder="Email"
                                        className="form-control"
                                    />
                                    <ErrorMessage name="email" component="div" className="field-error"/>
                                </div>
                                <div className="form-group">
                                    <label>Date of Birth</label>
                                    <Field
                                        name="birth_date"
                                        component="input"
                                        type="date"
                                        placeholder="Date"
                                        className="form-control"
                                    />
                                    <ErrorMessage name="birth_date" component="div" className="field-error"/>
                                </div>

                            </Wizard.Page>
                            <Wizard.Page schema={StepSchemaTwo}>
                                <div className="form-group">
                                    <label>Street Address</label>
                                    <Field
                                        name="address"
                                        component="input"
                                        type="input"
                                        placeholder="Your Address"
                                        className="form-control"

                                    />
                                    <ErrorMessage name="address" component="div" className="field-error"/>
                                </div>
                                <div className="form-row">
                                    <div className="form-group col-md-6">
                                        <label>City</label>
                                        <Field
                                            name="city"
                                            component="input"
                                            type="input"
                                            placeholder="City"
                                            className="form-control"
                                        />
                                        <ErrorMessage name="city" component="div" className="field-error"/>
                                    </div>
                                    <div className="form-group col-md-4">
                                        <label>State</label>
                                        <Field name="state" component="select" className="form-control">
                                            <option value="">Choose State</option>
                                            <option value="AL">Alabama</option>
                                            <option value="AK">Alaska</option>
                                            <option value="AZ">Arizona</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="CA">California</option>
                                            <option value="CO">Colorado</option>
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="DC">District Of Columbia</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="HI">Hawaii</option>
                                            <option value="ID">Idaho</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IN">Indiana</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NV">Nevada</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="OH">Ohio</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="OR">Oregon</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="TX">Texas</option>
                                            <option value="UT">Utah</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WA">Washington</option>
                                            <option value="WV">West Virginia</option>
                                            <option value="WI">Wisconsin</option>
                                            <option value="WY">Wyoming</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="GU">Guam</option>
                                            <option value="MP">Northern Mariana Islands</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="UM">United States Minor Outlying Islands</option>
                                            <option value="VI">Virgin Islands</option>
                                        </Field>
                                        <ErrorMessage name="state" component="div" className="field-error"/>
                                    </div>
                                    <div className="form-group col-md-2">
                                        <label>Zip</label>
                                        <Field
                                            name="zip_code"
                                            component="input"
                                            type="input"
                                            placeholder="Zip code"
                                            className="form-control"
                                        />
                                        <ErrorMessage name="zip_code" component="div" className="field-error"/>
                                    </div>
                                </div>
                                <div className="form-group">
                                    <label>Shirt Size</label>
                                    <Field name="gender" component="select" className="form-control">
                                        <option value="">Select a Gender</option>
                                        <option value="f">Female</option>
                                        <option value="m">Male</option>
                                    </Field>
                                    <ErrorMessage name="gender" component="div" className="field-error"/>
                                </div>
                                <div className="form-group">
                                    <label>Emergency Contact</label>
                                    <Field
                                        name="emergency_name"
                                        component="input"
                                        type="input"
                                        placeholder="Emergency Contact"
                                        className="form-control"
                                    />
                                    <ErrorMessage name="emergency_name" component="div" className="field-error"/>
                                </div>
                                <div className="form-group">
                                    <label>Emergency Contact Phone</label>
                                    <Field
                                        name="emergency_phone"
                                        component="input"
                                        type="input"
                                        placeholder="Emergency Contact Phone"
                                        className="form-control"
                                    />
                                    <ErrorMessage name="emergency_phone" component="div" className="field-error"/>
                                </div>
                                <div className="form-group">
                                    <label>Shirt Size</label>
                                    <Field name="t_shirt" component="select" className="form-control">
                                        <option value="">Select a Size</option>
                                        <option value="s">Small</option>
                                        <option value="m">Medium</option>
                                        <option value="l">Large</option>
                                        <option value="xl">XLarge</option>
                                    </Field>
                                    <ErrorMessage name="t_shirt" component="div" className="field-error"/>
                                </div>
                            </Wizard.Page>
                            <Wizard.Page schema={StepSchemaThree}>
                                <div>
                                    <h3>PARTICIPANT WAIVER AND RELEASE OF LIABILITY, ASSUMPTION OF RISK AND INDEMNITY
                                        AGREEMENT</h3>
                                    <p>
                                        ALL PARTICIPANTS IN THE ONE MILE WITH A SMILE RUN Series (COLLECTIVELY THE
                                        EVENTS) AND
                                        RELATED EVENTS ARE REQUIRED TO ASSUME ALL RISK OF PARTICIPATION IN THE EVENTS BY
                                        SIGNING
                                        THIS RELEASE AND WAIVER OF LIABILITY AGREEMENT: The undersigned athlete
                                        (Athlete) and on
                                        behalf of Athlete’s personal representatives, assigns, heirs, and executors,
                                        fully and
                                        forever releases from all liability, including negligence, One Mile With A Smile
                                        Running
                                        Series, City of Chesapeake, and all municipal agencies whose property or
                                        personnel are
                                        used, all other sponsoring or co-sponsoring companies or individuals related to
                                        the
                                        Events, and their respective employees, agents, volunteers, representatives and
                                        affiliates (collectively the Releasees). Athlete and on behalf of Athlete’s
                                        personal
                                        representatives, assigns, heirs and executors waives the right to sue Releasees
                                        for all
                                        losses and damages that arise from any injury to Athlete or Athlete’s property
                                        or
                                        resulting in Athlete’s death in connection with the Athlete’s participation in
                                        the
                                        Events including but not limited to losses or damage caused by the negligence of
                                        all or
                                        any of the Releasees, the negligence of others, weather conditions or otherwise,
                                        and
                                        also including any pre or post-race activities and any programs and/or giveaways
                                        conducted at the events and/or activities by a sponsor or other third party. The
                                        Athlete
                                        warrants that Athlete is in good physical condition and is able to safely
                                        participate in
                                        the Events. The Athlete is fully aware of the risks and hazards inherent in
                                        participating in the Events, including the possibility of serious physical
                                        trauma,
                                        injury or death, and elects to voluntarily compete in the Events knowing such
                                        risks. The
                                        Athlete agrees to the use of Athlete’s name and photographs in broadcasts,
                                        newspapers,
                                        magazines, brochures, and other media without compensation. <b>The Athlete
                                        acknowledges
                                        that the entry fee is non-refundable and non-transferable. </b>The Athlete
                                        grants to the
                                        Medical Director of the Events, and the City of Chesapeake and its agents,
                                        affiliates,
                                        and designees access to all medical records (and physicians) as needed and
                                        authorize
                                        medical treatment as needed. The Athlete acknowledges that Harambe Inc has the
                                        right to
                                        alter, change, cancel and/or postpone any of these events as a result of
                                        circumstances
                                        that would affect or impact the event which are beyond their control. In the
                                        case of
                                        extreme weather, acts of terrorism, acts of God, governmental ban or other
                                        factors
                                        outside the control of the race management, the organizers reserve the right to
                                        cancel
                                        the race and no refunds or credits will be issued. The Athlete warrants that all
                                        statements made in this release agreement are true and correct and understands
                                        that
                                        Releasees have relied on them in allowing Athlete to participate in the Events.
                                        ATHLETE
                                        HAS READ THE FOREGOING, UNDERSTANDS ITS CONTENTS AND INTENTIONALLY AND
                                        VOLUNTARILY
                                        CERTIFIES COMPLIANCE BY ACCEPTING THIS WAIVER.
                                    </p>
                                    <p>
                                        IF ATHLETE IS UNDER AGE 18: I am the parent or guardian of the participant and I
                                        certify
                                        that my son/daughter has my permission to participate in the One Mile With A
                                        Smile 12
                                        Hour , 1 Mile &amp; 5K. I have read and I understand the foregoing RELEASE AND
                                        WAIVER OF
                                        LIABILITY AGREEMENT (above) and by signing below intentionally and voluntarily
                                        agree to
                                        its terms and conditions and agree that its terms shall likewise bind me, my
                                        child, and
                                        our heirs legal representatives, and assignees. I further certify that my
                                        son/daughter
                                        is in good physical condition and is able to safely participate in the Events. I
                                        hereby
                                        authorize medical treatment for him/her and grant access to my child’s medical
                                        records
                                        as necessary.
                                    </p>
                                    <div className="form-check">
                                        <Field name="consent" component="input" type="checkbox" className="form-check-input" />
                                        <label className="form-check-label" htmlFor="consent">
                                            I agree to the Liability Waiver
                                        </label>
                                        <ErrorMessage name="consent" component="div" className="field-error"/>
                                    </div>
                                </div>
                            </Wizard.Page>
                            <Wizard.Page>
                                <div className="form-group">
                                    <h4>Total: $65</h4>
                                    <hr/>
                                    <label>Enter your credit card information </label>
                                    <CardElement
                                        style={{base: {fontSize: '18px'}}}
                                        onChange={this.changeCard}
                                    />
                                    <ErrorMessage
                                        name="stripe"
                                        component="div"
                                        className="field-error mt-3"
                                    />
                                </div>
                            </Wizard.Page>
                        </Wizard>
                            ) : (
                                <h3>Registration is Close for the 12 Hour Race</h3>
                            )

                        )}
                    </div>
                    </div>
                    <div className="col-12 col-md-6">
                        <div className="row">
                            <div className="col">
                                <ul className="list-group mb-3">
                                    <li className="list-group-item"><strong>Price:</strong> $65.00</li>
                                    <li className="list-group-item"><strong>Date:</strong> August 10, 2019</li>
                                    <li className="list-group-item"><strong>Time:</strong> 7AM - 7PM</li>
                                    <li className="list-group-item"><strong>Location:</strong> Oak Grove Lake Park</li>
                                </ul>
                                <p>Come run as much or as little as you want over the course of 12 hours. &nbsp;The race consists of multiple laps of a 1.5 mile loop, &nbsp;in Chesapeake VA Oak Grove Lake Park, which provides a mixture of panoramic views of the lake, as well as forested and wildlife. The tree-lined course is flat and is completely unpaved.&nbsp;There will be one aid station at the start of the race. &nbsp;The race will be limited to 60 runners. &nbsp;There will be no waitlist. &nbsp;If you have questions about the race, please e-mail the race director.</p>
                                <h3>Includes:</h3>
                                <p>T-shirts will be provided to all participants.</p>
                            </div>
                            <div className="col">
                                <h5 className="mb-3">Awards:</h5>
                                <ul className="list-group">
                                    <li className="list-group-item">Most Miles Male</li>
                                    <li className="list-group-item">Most Miles Female</li>
                                </ul>
                                <h5 className="mt-3 mb-3">Age Group Winners</h5>
                                <ul className="list-group">
                                    <li className="list-group-item">64 and older</li>
                                    <li className="list-group-item">53-63</li>
                                    <li className="list-group-item">42-52</li>
                                    <li className="list-group-item">31-41</li>
                                    <li className="list-group-item">30 and under</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

        );
    }
}

export default injectStripe(SignUp);

