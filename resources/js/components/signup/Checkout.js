import React from 'react';
import {StripeProvider, Elements} from 'react-stripe-elements';
import SignUp from './SignUp';

const Checkout = () => { //
    return (
        <StripeProvider apiKey="pk_live_fVbRODvNz7PrhvY3Nz4AIYdC">
            <Elements>
                <SignUp />
            </Elements>
        </StripeProvider>
    );
};

export default Checkout;