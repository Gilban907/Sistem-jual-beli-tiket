<div class="card">
    <img src="{{ asset('images/' . $event['image']) }}" class="card-img-top" alt="{{ $event['title'] }}">
    <div class="card-body">
        <h5 class="card-title">{{ $event['title'] }}</h5>
        <p class="card-text">{{ $event['date'] }} - {{ $event['location'] }}</p>
        <a href="{{ url('/event/id/' . $event['id']) }}" class="btn btn-primary">View Details</a>
    </div>
</div>
