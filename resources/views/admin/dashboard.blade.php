@extends('layout.layout')

@section('content')
    <div class="mb-4 position-relative">
        <img src="{{ asset('/images/rock-concert.jpg') }}" class="w-100 rounded" style="height: 300px; object-fit: cover;">
        <div class="position-absolute top-50 start-50 translate-middle text-white fw-bold fs-1 text-center">
            ADMIN DASHBOARD<br><span class="fs-3">Manage your events and tickets</span>
        </div>
    </div>

    <h4 class="mb-3">Admin Management</h4>
    <div class="row">
        <div class="col-md-6 mb-4">
            <a href="{{ route('admin.tickets.index') }}" class="text-decoration-none text-dark">
                <div class="card event-card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Manage Tickets</h5>
                        <p class="card-text">View, create, edit, and delete tickets.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6 mb-4">
            <a href="{{ route('admin.events.index') }}" class="text-decoration-none text-dark">
                <div class="card event-card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Manage Events</h5>
                        <p class="card-text">View, create, edit, and delete events.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
