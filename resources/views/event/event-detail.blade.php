<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Know Your Enemy Concert - Rage Against The Machine</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
   
   <style>
        body {
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

        .ticket-box,
        .order-box {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }

        .organizer-box {
            display: flex;
            align-items: center;
        }

        .organizer-box img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .ticket-card {
            background-color: #f0f4ff;
            border-radius: 16px;
            padding: 16px;
            width: 100%;
            font-family: sans-serif;
            position: relative;
            overflow: hidden;
        }

        .ticket-card::before,
        .ticket-card::after {
            content: "";
            position: absolute;
            top: 60%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            background-color: white;
            border-radius: 50%;
            z-index: 1;
        }

        .ticket-card::before {
            left: -10px;
        }

        .ticket-card::after {
            right: -10px;
        }

        .ticket-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ticket-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .ticket-time {
            font-size: 14px;
            color: #555;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .ticket-divider {
            border-top: 2px dashed #a0b3e1;
            margin: 16px 0;
            position: relative;
            z-index: 0;
        }

        .ticket-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ticket-price {
            font-weight: bold;
        }

        .ticket-quantity {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .ticket-quantity button {
            border: 1px solid #007bff;
            background-color: transparent;
            color: #007bff;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            font-size: 16px;
            line-height: 20px;
            cursor: pointer;
        }

        .btn-order-plus,
        .btn-order-minus {
            border: 1px solid #007bff;
            background-color: transparent;
            color: #007bff;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            font-size: 16px;
            line-height: 20px;
            cursor: pointer;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
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

        <div class="row">
            <div class="col-md-8">
                <img src="{{ asset('/images/' . $event['image']) }}" alt="Concert" class="concert-image">

                <ul class="nav nav-tabs tabs mt-4" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc"
                            type="button" role="tab">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="ticket-tab" data-bs-toggle="tab" data-bs-target="#ticket"
                            type="button" role="tab">Ticket</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="desc" role="tabpanel">
                        <h5 class="mt-3">{{ $event['title'] }}</h5>
                        {!! nl2br(e($event['description'])) !!}

                    </div>

                    <div class="tab-pane fade" id="ticket" role="tabpanel">
                        {{-- Tiket Pre sale --}}
                        <div class="ticket-card" data-event-id="{{ $event['id'] }}-pre" data-event-title="Pre sale"
                            data-event-price="{{ $event['price'] }}" data-event-date="{{ $event['date'] }}"
                            data-event-start_time="{{ $event['start_time'] }}"
                            data-event-end_time="{{ $event['end_time'] }}">

                            <div class="ticket-header">
                                <div class="ticket-info">
                                    <strong class="mb-3" style="font-size: 1.2rem">Pre sale</strong>
                                    <div class="ticket-time">
                                        <span><i class="fas fa-clock"></i></span>
                                        {{ \Carbon\Carbon::parse($event['date'])->format("d M 'y") }},
                                        {{ $event['start_time'] }} - {{ $event['end_time'] }} WIB
                                    </div>
                                </div>
                            </div>

                            <div class="ticket-divider"></div>

                            <div class="ticket-footer">
                                <div class="ticket-price">{{ $event['price'] }}</div>
                                <div class="ticket-quantity">
                                    <button class="btn-minus">-</button>
                                    <span class="qty">0</span>
                                    <button class="btn-plus">+</button>
                                </div>
                            </div>
                        </div>

                        {{-- Tiket VIP --}}
                        <div class="ticket-card mt-3" data-event-id="{{ $event['id'] }}-vip" data-event-title="VIP"
                            data-event-price="{{ $event['price'] }}" data-event-date="{{ $event['date'] }}"
                            data-event-start_time="{{ $event['start_time'] }}"
                            data-event-end_time="{{ $event['end_time'] }}">


                            <div class="ticket-header">
                                <div class="ticket-info">
                                    <strong class="mb-3" style="font-size: 1.2rem">VIP</strong>
                                    <div class="ticket-time">
                                        <span><i class="fas fa-clock"></i></span>
                                        {{ \Carbon\Carbon::parse($event['date'])->format("d M 'y") }},
                                        {{ $event['start_time'] }} - {{ $event['end_time'] }} WIB
                                    </div>
                                </div>
                            </div>

                            <div class="ticket-divider"></div>

                            <div class="ticket-footer">
                                @php
                                    // Ambil angka dari string price
                                    $priceNum = intval(preg_replace('/\D/', '', $event['price']));
                                    $priceTimes3 = $priceNum * 3;
                                @endphp

                                <div class="ticket-price">From ${{ $priceTimes3 }}</div>
                                <div class="ticket-quantity">
                                    <button class="btn-minus">-</button>
                                    <span class="qty">0</span>
                                    <button class="btn-plus">+</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="ticket-box">
                    <strong class="mb-3">{{ $event['title'] }}</strong>
                    <p class="mt-3"><i class="fas fa-calendar-alt"></i>
                        {{ \Carbon\Carbon::parse($event['date'])->translatedFormat('j F Y') }}</p>
                    <p><i class="fas fa-clock"></i> {{ $event['start_time'] }} - {{ $event['end_time'] }} WIB</p>
                    <p><i class="fas fa-map-marker-alt"></i> {{ $event['location'] }}</p>
                    <div class="organizer-box mt-3">
                        <img src={{ asset('/images/' . $event['image']) }} alt="Organizer">
                        <span><strong>{{ $event['organizer'] }}</strong></span>
                    </div>
                </div>

                <div class="order-box">
                    <h6>Your order</h6>
                    <p class="text-muted order-empty-msg">Added ticket will be listed here</p>
                    <hr>
                    <div class="order-list"></div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <div>Total (<span class="total-ticket">0</span> Ticket):</div>
                        <div><strong class="total-price">--</strong></div>
                    </div>
                    <input type="hidden" id="idPage" value="{{ $event['id'] }}">
                    <button class="btn-choose-ticket btn btn-secondary w-100" disabled>Choose Ticket</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
