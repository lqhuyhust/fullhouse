@extends('web.layouts.app')

@section('title', 'Deposit Payment')
@section('main_heading', 'Deposit Payment')

@section('content')
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <div class="">
                <p>You will be charged <strong>{{$deposit}} VND</strong> for deposit plan</p>
            </div>
            <div class="card">
                <form action="{{ route('payment.execute', $id) }}" method="post" id="payment-form">
                    @csrf                    
                    <input type="hidden" name="fee" value="{{$deposit}}">
                    <div class='form-group'>
                        <div class="card-header">
                            <label for="card-element">
                                Enter your email
                            </label>
                        </div>
                        <div class="card-body">
                            <input type="email" name="email" id="email" class="w-100">
                        </div>                     
                    </div> 
                    <div class="form-group">
                        <div class="card-header">
                            <label for="card-element">
                                Enter your credit card information
                            </label>
                        </div>
                        <div class="card-body">
                            <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Deposit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Create a Stripe client.
var stripe = Stripe('{{ env("STRIPE_KEY") }}');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '18px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>
@stop