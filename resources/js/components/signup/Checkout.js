import React from 'react';
import {StripeProvider, Elements} from 'react-stripe-elements';
import SignUp from './SignUp';

const Checkout = () => { //
    return (
        <StripeProvider apiKey={process.env.MIX_STRIPE_PUBLIC}>
            <Elements>
                <SignUp />
            </Elements>
        </StripeProvider>
    );
};

export default Checkout;