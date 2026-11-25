@extends('layouts.app')

@section('content')
<div class="container">
    <nav>
        <a href="/">Home</a> / <a href="#">Music</a> / <span>{{ $event->title }}</span>
    </nav>

    <div class="row mt-4">
        <div class="col-md-8">
            <img src="{{ asset('storage/' . $event->image) }}" class="img-fluid rounded" alt="{{ $event->title }}">
            <ul class="nav nav-tabs mt-4">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ticket</a>
                </li>
            </ul>
            <div class="mt-3">
                <h4>{{ $event->title }}</h4>
                <p>{{ $event->description }}</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h5>{{ $event->title }}</h5>
                <p><i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}</p>
                <p><i class="bi bi-clock"></i> {{ $event->start_time }} - {{ $event->end_time }} WIB</p>
                <p><i class="bi bi-geo-alt"></i> {{ $event->location }}</p>
                <p><strong>Organized by</strong><br> {{ $event->organizer }}</p>
            </div>

            <div class="card mt-3 p-3">
                <h6>Your order</h6>
                <p>Added ticket will be listed here</p>
                <button class="btn btn-secondary" disabled>Choose Ticket</button>
            </div>
        </div>
    </div>
</div>
@endsection
