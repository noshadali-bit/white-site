@extends('layouts.main')
@section('content')
<section class="breadcumb"
    style="background-image: url({{ asset('images/breadcumb-back.png') }});padding: 120px 0 1px;background-size: cover;background-position: center;margin-top: -90px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="breadcumb-con text-light">
                    <h3>Payment</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcumb-img">
                    <img src="{{ asset('/images/about-banner-img.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="order">
    <div class="container">
        <script src="https://js.stripe.com/v3/"></script>
        <!-- Display a payment form -->
          <form id="payment-form">
            <div id="payment-element">
              <!--Stripe.js injects the Payment Element-->
            </div>
            <button id="submit">
              <div class="spinner hidden" id="spinner"></div>
              <span id="button-text">Pay now</span>
            </button>
            <div id="payment-message" class="hidden"></div>
          </form>
    </div>
</section>
@endsection
@section('css')
    <style>
    
        *{
            box-sizing: border-box;
        }

        form {
            align-self: center;
            box-shadow: 0px 0px 0px 0.5px rgba(50, 50, 93, 0.1),
                0px 2px 5px 0px rgba(50, 50, 93, 0.1), 0px 1px 1.5px 0px rgba(0, 0, 0, 0.07);
            border-radius: 7px;
            padding: 40px;
        }

        .hidden {
            display: none;
        }

        #payment-message {
            color: rgb(105, 115, 134);
            font-size: 16px;
            line-height: 20px;
            padding-top: 12px;
            text-align: center;
        }

        #payment-element {
            margin-bottom: 24px;
            height: 100%;
        }

        button {
            background: #5469d4;
            font-family: Arial, sans-serif;
            color: #ffffff;
            border-radius: 4px;
            border: 0;
            padding: 12px 16px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            display: block;
            transition: all 0.2s ease;
            box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
            width: 100%;
        }
        button:hover {
            
        }
        button:disabled {
            opacity: 0.5;
            cursor: default;
        }

        .spinner,
        .spinner:before,
        .spinner:after {
            border-radius: 50%;
        }
        .spinner {
            color: #ffffff;
            font-size: 22px;
            text-indent: -99999px;
            margin: 0px auto;
            position: relative;
            width: 20px;
            height: 20px;
            box-shadow: inset 0 0 0 2px;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
        }
        .spinner:before,
        .spinner:after {
            position: absolute;
            content: "";
        }
        .spinner:before {
            width: 10.4px;
            height: 20.4px;
            background: #5469d4;
            border-radius: 20.4px 0 0 20.4px;
            top: -0.2px;
            left: -0.2px;
            -webkit-transform-origin: 10.4px 10.2px;
            transform-origin: 10.4px 10.2px;
            -webkit-animation: loading 2s infinite ease 1.5s;
            animation: loading 2s infinite ease 1.5s;
        }
        .spinner:after {
            width: 10.4px;
            height: 10.2px;
            background: #5469d4;
            border-radius: 0 10.2px 10.2px 0;
            top: -0.1px;
            left: 10.2px;
            -webkit-transform-origin: 0px 10.2px;
            transform-origin: 0px 10.2px;
            -webkit-animation: loading 2s infinite ease;
            animation: loading 2s infinite ease;
        }

        @-webkit-keyframes loading {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
        }
        @keyframes loading {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
        }

        @media only screen and (max-width: 600px) {
            form {
                width: 80vw;
                min-width: initial;
            }
        }

  </style>
@endsection
@section('js')
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe("{{ env('STRIPE_KEY') }}");
    const items = [{ id: "xl-tshirt" }];

    let elements;

    initialize();
    checkStatus();

    document
    .querySelector("#payment-form")
    .addEventListener("submit", handleSubmit);

    async function initialize() {
        const clientSecret  = '{{ $secret }}';
        elements = stripe.elements({ clientSecret });

        const paymentElementOptions = {
            layout: "tabs",
        };
    
        const paymentElement = elements.create("payment", paymentElementOptions);
        paymentElement.mount("#payment-element");
    }

    async function handleSubmit(e) {
        e.preventDefault();
        setLoading(true);
    
        const { error } = await stripe.confirmPayment({
            elements,
            confirmParams: {
                return_url: "{{route('order.submit')}}?order_id={{ $order->id }}",
            },
        });
        
        if (error.type === "card_error" || error.type === "validation_error") {
            showMessage(error.message);
        } else {
            showMessage("An unexpected error occurred.");
        }

        setLoading(false);
    }

    async function checkStatus() {
        const clientSecret = new URLSearchParams(window.location.search).get(
            "payment_intent_client_secret"
        );

        if (!clientSecret) {
            return;
        }

        const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);

        switch (paymentIntent.status) {
            case "succeeded":
                showMessage("Payment succeeded!");
            break;
            case "processing":
                showMessage("Your payment is processing.");
            break;
            case "requires_payment_method":
                showMessage("Your payment was not successful, please try again.");
            break;
            default:
            showMessage("Something went wrong.");
            break;
        }
    }

                
    function showMessage(messageText) {
        const messageContainer = document.querySelector("#payment-message");
        messageContainer.classList.remove("hidden");
        messageContainer.textContent = messageText;
        setTimeout(function () {
        messageContainer.classList.add("hidden");
        messageText.textContent = "";
        }, 4000);
    }

    function setLoading(isLoading) {
        if (isLoading) {
            document.querySelector("#submit").disabled = true;
            document.querySelector("#spinner").classList.remove("hidden");
            document.querySelector("#button-text").classList.add("hidden");
        } else {
            document.querySelector("#submit").disabled = false;
            document.querySelector("#spinner").classList.add("hidden");
            document.querySelector("#button-text").classList.remove("hidden");
        }
    }
</script>


@endsection
