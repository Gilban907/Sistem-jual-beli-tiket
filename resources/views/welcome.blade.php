@extends('layout.layout.app')


@section('content')
    <!-- Header / Hero -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-6 text-white">
        <div class="flex justify-between items-center">
            <div class="logo.png">Logo</div>
            <div class="flex items-center gap-4">
                <a href="#" class="hover:underline">Transaksi</a>
                <a href="#" class="hover:underline">Tiket</a>
                <!-- Removed login link from homepage -->
                <a href="{{ route('profile') }}" class="hover:underline">Profile</a>
                <a href="#" class="hover:underline">
                    <svg ...>...</svg>
                </a>
            </div>
        </div>
        <div class="mt-4 flex gap-6 text-lg">
            <a href="#" class="hover:underline">Music</a>
            <a href="#" class="hover:underline">Culture</a>
            <a href="#" class="hover:underline">Party</a>
            <a href="#" class="hover:underline">Show</a>
        </div>
    </div>

    <!-- Hero Image -->
    <div class="mt-6 mx-auto max-w-5xl">
        <div class="relative">
            <img src="{{ asset('rock-concert.png') }}" class="rounded-xl w-full h-64 object-cover" alt="Rock Concert">
            <div class="absolute inset-0 bg-black bg-opacity-40 rounded-xl flex flex-col justify-center items-center text-white">
                <h2 class="text-4xl font-bold mb-2">ROCK CONCERT</h2>
                <p class="text-xl">27 JUNE 2025</p>
            </div>
        </div>
    </div>

    <!-- Event Section -->
    <div class="mt-10 max-w-6xl mx-auto px-4">
        <h2 class="text-2xl font-bold mb-6">Event</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach(range(1, 8) as $i)
                <a href="{{ url('/event/' . $i) }}">
                    <div class="bg-white rounded-xl shadow hover:shadow-lg overflow-hidden transition-all duration-300">
                        <img src="{{ asset('images/event-sample .jpg') }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold">Nama festival</h3>
                            <p class="text-sm text-gray-600">27 September 2025</p>
                            <p class="text-xs text-gray-500">Nama Tempat | Jl. Pandjaitan dsri | Banyumas, Jawa Tengah</p>
                            <p class="text-sm text-blue-600 font-bold mt-2">From IDR 135K</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
