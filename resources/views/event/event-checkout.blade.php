<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
   
   <style>
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;

        }

        .nav-header {
            background: linear-gradient(to bottom, #0C4AC8, #062462);

            padding: 20px 60px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
        }

        .nav-header h1 span {
            color: orange;
        }

        .breadcrumb {
            margin-top: 10px;
            margin-left: 0px;
        }

        .concert-image {
            width: 100%;
            max-height: 300px;
            border-radius: 10px;
        }

        .tab-content {
            margin-top: 20px;
        }

        .tabs {
            border-bottom: 2px solid #ccc;
        }

        .tabs .nav-link.active {
            border-bottom: 3px solid #0033cc;
            font-weight: bold;
        }

        .card {
            border-radius: 10px;
        }

        .form-label {
            font-weight: 500;
        }

        .payment-option input {
            margin-right: 10px;
        }

        .payment-option {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .payment-option:hover {
            background-color: #f1f1f1;
        }

        .order-summary {
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;

        }

        .os {
            background: #fff;
            padding: 20px;
            padding-top: 0
        }

        .btn-checkout {
            background-color: #005eff;
            color: white;
            width: 100%;
        }

        .btn-checkout:hover {
            background-color: #0044cc;
            color: white;
        }

        .text-small {
            font-size: 0.875rem;
        }

        .accordion-button:not(.collapsed) {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="nav-header">
        <img src="{{ asset('images/logo.png') }}" width="100" alt="">
        <div class="d-flex justify-content-center align-items-center">
            <a class="d-flex justify-content-center align-items-center px-3"
                style="border-left:1px solid gray;border-right:1px solid gray;cursor:pointer;color:white;text-decoration:none">Transaksi</a>
           <a class="d-flex justify-content-center align-items-center px-3"
                style="border-left:1px solid gray;border-right:1px solid gray;cursor:pointer;color:white;text-decoration:none">Tiket</a>
           
                    <a class="d-flex justify-content-center align-items-center px-3"
                style="cursor:pointer;color:white;text-decoration:none"><i style="font-size: 1.4rem"
                    class="fas fa-user-circle "></i></a>
        </div>
    </div>
    <div class="container mt-3">
        <nav class="breadcrumb">
            <a class="breadcrumb-item" href="#">Home</a>
            <a class="breadcrumb-item" href="#">Music</a>
            <span class="breadcrumb-item active">Know Your Enemy Conc...</span>
        </nav>
        <h5>Check out tickets for</h5>
        <h4><strong>{{ $event['title'] }}</strong></h4>
        <p>{{ \Carbon\Carbon::parse($event['date'])->format('d M Y') }} | {{ $event['start_time'] }} -
            {{ $event['end_time'] }} WIB • {{ $event['location'] }}</p>

        <div class="row">
            <!-- Left Side -->
            <div class="col-lg-8">
                <!-- Buyer Information -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Buyer Information</h5>
                        <form method="POST" action="{{ route('checkout.post', ['id' => $event['id']]) }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">First Name *</label>
                                <input type="text" class="form-control" name="first_name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email *</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone Number *</label>
                                <input type="tel" class="form-control" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Date of birth *</label>
                                <input type="date" class="form-control" name="dob" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gender *</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male"
                                        value="male" required>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="female" required>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                            <input type="hidden" name="quantity" value="{{ $tickets }}">
                            <input type="hidden" name="total_price" value="{{ $total }}">
                            <button type="submit" class="btn btn-checkout">Checkout</button>
                        </form>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="mb-4">
                    <h6 class="mb-3 text-primary">Payment Method</h6>
                    <div class="accordion" id="paymentAccordion">
                        <!-- Virtual Account -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingVA">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseVA">
                                    Virtual Account
                                </button>
                            </h2>
                            <div id="collapseVA" class="accordion-collapse collapse show"
                                data-bs-parent="#paymentAccordion">
                                <div class="accordion-body">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="bank" id="bca"
                                            checked>
                                        <label
                                            class="form-check-label gap-2 d-flex justify-content-start align-items-center"
                                            for="bca"><img src="{{ asset('images/BCA 1.png') }}" width="50"
                                                alt="">
                                            <div class="mt-3" style="margin-top: 5px !important"> BCA</div>
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="bank" id="mandiri">
                                        <label
                                            class="form-check-label gap-2 d-flex justify-content-start align-items-center"
                                            for="mandiri"><img src="{{ asset('images/madnriri 1.png') }}"
                                                width="60" alt="">
                                            <div class="mt-3" style="margin-top: 5px !important"> MANDIRI</div>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="bank"
                                            id="bsi">
                                        <label
                                            class="form-check-label gap-2;;;; d-flex justify-content-start align-items-center"
                                            for="bsi"><img src="{{ asset('images/BSI 1.png') }}" width="30"
                                                alt="">
                                            <div class="mt-3" style="margin-top: 5px !important"> BSI</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- E-Wallet -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingEwallet">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseEwallet">
                                    E-Wallet
                                </button>
                            </h2>
                            <div id="collapseEwallet" class="accordion-collapse collapse"
                                data-bs-parent="#paymentAccordion">
                                <div class="accordion-body">
                                    <p>Coming soon</p>
                                </div>
                            </div>
                        </div>

                        <!-- PayLater -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingPaylater">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapsePaylater">
                                    PayLater
                                </button>
                            </h2>
                            <div id="collapsePaylater" class="accordion-collapse collapse"
                                data-bs-parent="#paymentAccordion">
                                <div class="accordion-body">
                                    <p>Coming soon</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side -->
            <div class="col-lg-4">
                <div class="order-summary">
                    <div class="d-flex gap-3 bg-warning justify-content-center align-items-center mb-2 pt-3 pb-3">
                       <span class="text-small" id="current-time">00:00</span>
                        <span> | </span>
                        <span class="text-small text-end">Segera selesaikan pembayaranmu</span>
                    </div>
                    <div class="os">
                        <h6 class="mt-3 mb-2">Order Summary</h6>

                        @php
                            $basePrice = 135000;
                        @endphp

                        @isset($ticketItems['Pre sale'])
                            <div class="mb-2">
                                Pre-Sale {{ $ticketItems['Pre sale'] }}
                                <span class="float-end">$
                                    {{ number_format(($basePrice * $ticketItems['Pre sale']) / 1000, 0, '.', ',') }}</span>
                            </div>
                        @endisset

                        @isset($ticketItems['VIP'])
                            <div class="mb-2">
                                VIP {{ $ticketItems['VIP'] }}
                                <span class="float-end">$
                                    {{ number_format(($basePrice * 3 * $ticketItems['VIP']) / 1000, 0, '.', ',') }}</span>
                            </div>
                        @endisset

                        <hr>
                        <div class="mb-2">
                            Subtotal ({{ $tickets }} Ticket{{ $tickets > 1 ? 's' : '' }})
                            <span class="float-end">${{ number_format($subtotal, 0, '.', ',') }}</span>
                        </div>
                        <div class="mb-3">
                            Web platform tax
                            <span class="float-end">${{ number_format($tax, 0, '.', ',') }}</span>
                        </div>
                        <hr>
                        <h5 class="mb-3">
                            Grand Total
                            <span class="float-end">${{ number_format($total, 0, '.', ',') }}</span>
                        </h5>


                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="agree">
                            <label class="form-check-label text-small" for="agree">
                                I agree to the <a href="#">Terms & Conditions</a> that apply on this platform *
                            </label>
                        </div>
                        <p class="text-danger text-small">Syarat & Ketentuan dan Pemrosesan Data Pribadi harus
                            disetujui</p>
                        <button class="btn btn-checkout">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
