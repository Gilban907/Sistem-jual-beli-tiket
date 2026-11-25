<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-900 leading-tight mb-6">
@extends('layout.layout') 

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">
            Tickets Management
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <a href="{{ route('admin.tickets.create') }}" class="mb-6 inline-block bg-indigo-600 text-white px-6 py-3 rounded-lg shadow hover:bg-indigo-700 transition duration-300">
        <a href="{{ route('admin.tickets.create') }}" class="btn btn-primary">
            Create New Ticket
        </a>
    </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-lg shadow">
                {{ session('success') }}
            </div>
        @endif
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @if($tickets->isEmpty())
        <div class="alert alert-info">
            No tickets found. You can <a href="{{ route('admin.tickets.create') }}" class="alert-link">create a new ticket</a>.
        </div>
    @else
        <div class="row">
            @foreach($tickets as $ticket)
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6 flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-semibold mb-2 text-gray-800">{{ $ticket->name }}</h3>
                        <p class="text-gray-600 mb-1"><span class="font-semibold">Event:</span> {{ $ticket->event->title ?? 'N/A' }}</p>
                        <p class="text-gray-600 mb-1"><span class="font-semibold">Price:</span> ${{ number_format($ticket->price, 2) }}</p>
                        <p class="text-gray-600"><span class="font-semibold">Quantity:</span> {{ $ticket->quantity }}</p>
                    </div>
                    <div class="mt-4 flex space-x-2">
                        <a href="{{ route('admin.tickets.edit', $ticket) }}" class="flex-1 bg-blue-600 text-white py-2 rounded-lg text-center hover:bg-blue-700 transition duration-300">Edit</a>
                        <form action="{{ route('admin.tickets.destroy', $ticket) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this ticket?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 transition duration-300">Delete</button>
                        </form>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $ticket->name }}</h5>
                            <p class="card-text"><small class="text-muted">Event: {{ $ticket->event->title ?? 'N/A' }}</small></p>
                            <p class="card-text mb-1"><span class="fw-semibold">Price:</span> ${{ number_format($ticket->price, 2) }}</p>
                            <p class="card-text mb-3"><span class="fw-semibold">Quantity:</span> {{ $ticket->quantity }}</p>

                            <div class="mt-auto d-flex">
                                <a href="{{ route('admin.tickets.edit', $ticket) }}" class="btn btn-sm btn-primary me-2 flex-fill">Edit</a>
                                <form action="{{ route('admin.tickets.destroy', $ticket) }}" method="POST" class="flex-fill" onsubmit="return confirm('Are you sure you want to delete this ticket?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger w-100">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
        <div class="d-flex justify-content-center mt-4">
            {{ $tickets->links() }}
        </div>
    </div>
</x-app-layout>
    @endif
</div>
@endsection