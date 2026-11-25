@extends('layout.app') {{-- Pastikan file layout ini ada dan sudah ada include Bootstrap --}}

@section('content')
<div class="container mt-5">
    <h5 class="fw-bold mb-4">Personal Information</h5>
    <div class="card shadow-sm rounded-4">
        <div class="card-body p-4">
            <div class="d-flex align-items-center mb-4">
                <img src="{{ asset('images/monkey-avatar.png') }}" alt="Avatar" class="rounded-circle" width="90" height="90">
                <h3 class="ms-4 fw-bold">{{ $user->name ?? 'User Name' }}</h3>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label text-muted"><i class="bi bi-person"></i> First Name</label>
                    <input type="text" class="form-control" value="{{ explode(' ', $user->name ?? 'User Name')[0] ?? '' }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label text-muted"><i class="bi bi-envelope"></i> Email</label>
                    <input type="email" class="form-control" value="{{ $user->email ?? 'user@example.com' }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label text-muted"><i class="bi bi-person"></i> Last Name</label>
                    <input type="text" class="form-control" value="{{ explode(' ', $user->name ?? 'User Name')[1] ?? '' }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label text-muted"><i class="bi bi-geo-alt"></i> Address</label>
                    <input type="text" class="form-control" value="{{ $user->address ?? 'Address not set' }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label text-muted"><i class="bi bi-telephone"></i> Phone</label>
                    <input type="text" class="form-control" value="{{ $user->phone ?? 'Phone not set' }}" readonly>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">
            Logout
        </button>
    </form>
    <a href="{{ url('/') }}" class="btn btn-primary mt-3">
        Back to Homepage
    </a>
</div>
@endsection
