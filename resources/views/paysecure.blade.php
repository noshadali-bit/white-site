@extends('layouts.main')
@section('content')

<section class="inner_banner">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-5">
                <div class="inner_cont">
                    <?php App\Helpers\Helper::inlineEditable("h3",["class" => " "],"Checkout","INNERCONTENT117");?>
                    <div class="inner_link">
                        <a href="{{ route("home") }}">home</a>
                        <a href="javascript:;">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="checkout-sec payment-box mar-y">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="checkout-form section-content">
                    <form id="payment-form">
                        <div id="payment-element">
                        </div>
                        <div id="payment-message" class="hidden"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('css')
@endsection
@section('js')
<!--<script src=https://js.sandbox.fortis.tech/commercejs-v1.0.0.min.js></script> -->
<!-- sandbox -->

<script src=https://js.fortis.tech/commercejs-v1.0.0.min.js></script> 
<!-- production -->
<script>
    var elements = new Commerce.elements('<?= $secret ?>');
    elements.on('done', function (event) {

        console.log("token_id : " + event.data.token_id);
        console.log("order_number : " + event.data.order_number);

        if(event.data.status_code == "101"){
            var returnUrl = "{{ route('order.submit') }}?amount={{ $amount }}&order_id={{ $order }}&token_id=" + event.data.token_id + "&order_number=" + event.data.order_number;
            window.location.href = returnUrl;
        }
    }),
    elements.on('paymentFinished', (result) => {

        if(result.status === 'approved'){
            console.log("paymentFinished");
        } else {
          console.log("Field");
        }
    }),
    elements.create({
        container: '#payment-element', //Required
        theme: 'default',
        environment: 'production', //production //sandbox
        view:'default',
        language: 'en-us',
        defaultCountry: 'US',
        floatingLabels: true,
        showReceipt: true,
        showSubmitButton: true,
        showValidationAnimation: true,
        hideAgreementCheckbox: false,
        hideTotal: false,
        digitalWallets: ['ApplePay', 'GooglePay'],
        appearance: { 
            colorText : "black"
        },
        fields: {
            billing: true,
        }
    });
</script>
@endsection
