@extends('layout.layout')

@section('content')
    <!-- Carousel -->
    <div class="mb-4 position-relative">
        <img src="{{ asset('/images/rock-concert.jpg') }}" class="w-100 rounded" style="height: 300px; object-fit: cover;">
        <div class="position-absolute top-50 start-50 translate-middle text-white fw-bold fs-1 text-center">
            ROCK CONCERT<br><span class="fs-3">27 JUNE 2025</span>
        </div>
    </div>

    <!-- Event List -->
    <h4 class="mb-3">Event</h4>
    <div class="row">
        @foreach ($events as $event)
            <div class="col-md-3 mb-4">
                <a href="{{ url('/event/' . $event['id']) }}" class="text-decoration-none text-dark">
                    <div class="card event-card h-100 shadow-sm">
                        <img src="{{ asset('images/' . $event['image']) }}" class="card-img-top" alt="{{ $event['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event['name'] }}</h5>
                            <p class="card-text">
                                <small class="text-muted">{{ $event['date'] }}</small><br>
                                <small class="text-muted">{{ $event['location'] }}</small><br>
                                <span class="fw-bold">{{ $event['price'] }}</span>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
