@extends('master')

@section('content')
    <div class="container raceinfo">
        <header>
            <h1 class="entry-title">Sign Up</h1>
        </header>
        <p class="alert alert-success">Some text success or error</p>
        <form class="form-horizontal">
            <div class="col-12-lg">

                <!-- Form Name -->
                <legend>Form Name</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Company</label>
                    <div class="col-md-4">
                        <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Country">Country</label>
                    <div class="col-md-4">
                        <input id="Country" name="Country" type="text" placeholder="" class="form-control input-md">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="AddressLine1">Address 1</label>
                    <div class="col-md-4">
                        <input id="AddressLine1" name="AddressLine1" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="AddressLine2">Address 2</label>
                    <div class="col-md-4">
                        <input id="AddressLine2" name="AddressLine2" type="text" placeholder="" class="form-control input-md">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="city">City</label>
                    <div class="col-md-4">
                        <input id="city" name="city" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="zipCode">Zip/Postal Code</label>
                    <div class="col-md-4">
                        <input id="zipCode" name="zipCode" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="state">State</label>
                    <div class="col-md-4">
                        <input id="state" name="state" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="phone">Phone</label>
                    <div class="col-md-4">
                        <input id="phone" name="phone" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>

            </div>
        </form>
        <form role="form">
            <div class="form-group">
                <label for="username">Full name (on the card)</label>
                <input type="text" class="form-control" name="username" placeholder="" required="">
            </div> <!-- form-group.// -->

            <div class="form-group">
                <label for="cardNumber">Card number</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="cardNumber" placeholder="">
                    <div class="input-group-append">
				<span class="input-group-text text-muted">
					<i class="fab fa-cc-visa"></i>   <i class="fab fa-cc-amex"></i>  
					<i class="fab fa-cc-mastercard"></i>
				</span>
                    </div>
                </div>
            </div> <!-- form-group.// -->

            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label><span class="hidden-xs">Expiration</span> </label>
                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="MM" name="">
                            <input type="number" class="form-control" placeholder="YY" name="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label data-toggle="tooltip" title="" data-original-title="3 digits code on back side of the card">CVV <i class="fa fa-question-circle"></i></label>
                        <input type="number" class="form-control" required="">
                    </div> <!-- form-group.// -->
                </div>
            </div> <!-- row.// -->
            <button class="subscribe btn btn-primary btn-block" type="button"> Confirm  </button>
    </form>
    </div>
@endsection
@section('js')
    <script>
        $(function () {
            let stripe = StripeCheckout.configure({
                key: "{{config('services.stripe.key')}}",
                image: "",
                locale: "auto",
                token: (token) => {
                    document.querySelector('#stripeToken').value = token.id;
                }
            });
        });
    </script>
@endsection