@extends('layouts.web')

@section('content')
    <section class="services">
        <h1>Our Services</h1>
    </section>

    <section class="ayan">
        @foreach($services as $service)
            <div class="service">
                <!-- Display image only if it exists -->
                @if($service->image)
                    <img src="{{ asset('storage/services/' . $service->image) }}" alt="{{ $service->title }} Service">
                @else
                    <img src="{{ asset('images/default-service.jpg') }}" alt="{{ $service->title }} Service">
                @endif
                
                <!-- Display the service title and description -->
                <h2>{{ $service->title }}</h2>
                <p>{{ $service->description }}</p>
                
                <!-- Optionally display the category name if available -->
                @if($service->category_id)
                    @php
                        $category = App\Models\Category::find($service->category_id);
                    @endphp
                    @if($category)
                        <p>Category: {{ $category->name }}</p>
                    @endif
                @endif
                
                <a href="{{ url('/contact') }}" class="cta">Get Started</a>
            </div>
        @endforeach
    </section>
@endsection
