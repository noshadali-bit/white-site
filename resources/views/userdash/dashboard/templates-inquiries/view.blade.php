@extends('userdash.layouts.dashboard.main')

@section('content')
    <section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-booking-sec">



                <div class="invoice">
                    <div class="invoice_heading mb-3">
                        <h1>Inquiry Details</h1>
                    </div>
                    <div class="invoice_details">
                        <ul>
                            <li><span class="key">First Name:</span> <span class="value">{{ $inquiry->full_name }}</span></li>
                            <li><span class="key"> Phone:</span> <span class="value">{{ $inquiry->phone }}</span></li>
                            <li><span class="key"> Email:</span> <span class="value">{{ $inquiry->email }}</span></li>
                            <li><span class="key"> Message:</span> <span class="value">{{ $inquiry->message }}</span></li>
                            <li><span class="key">Created at:</span> <span class="value">{{ date('d-M-Y' , strtotime($inquiry->created_at)) }}</span></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
        .ui-state-active {
            background: #212529 !important;
            color: #f8f9fa !important;
        }

        .downimg {
            width: auto;
            height: 100px;
            object-fit: cover;
        }
        .invoice_details ul li .key {
    display: block;
    width: 150px;
    font-weight: 700;
    margin-bottom: 0.25rem;
}
.invoice_details ul li .value {
    background: #fff;
    border: 1px solid #ccc;
    width: 100%;
    display: block;
    padding: 0.75rem 1rem;
}
.invoice_details ul li {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    font-size: 1rem;
    padding: 0.75rem 0;
    flex-direction: column;
}
.invoice_details ul {
    column-count: inherit;
}
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        (() => {


        })()
    </script>
@endsection
