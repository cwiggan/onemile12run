import React from 'react';
import {StripeProvider, Elements} from 'react-stripe-elements';
import SignUp from './SignUp';

const Checkout = () => {
    return (
        <StripeProvider apiKey="pk_test_Qg4NbRlWHmp6jV7tk7UZgl8F">
            <Elements>
                <SignUp />
            </Elements>
        </StripeProvider>
    );
};

export default Checkout;