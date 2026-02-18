<x-layout.guest class="event show">
    
    {{-- Header --}}
    <section class="banner">
        <div class="banner__container">
            <img src="{{ asset('assets/img/default.png') }}" alt="" class="banner__background">
            <h1 class="banner__title">{{ $event->name }}</h1>
        </div>
    </section>
    
    {{-- Info --}}
    <section class="info">
        <div class="info__container">
            <p class="info__text">{!! $event->description ?? '-' !!}</p>
            <h3 class="info__title">Location</h3>
            <p class="info__text">{{ $event->location ?? '-' }}</p>
            <h3 class="info__title">Payment Information</h3>
            <p class="info__text">{!! $event->payemnt_info ?? '-' !!}</p>
        </div>
    </section>
    
    {{-- Category --}}
    <section class="category">
        <div class="category__container">
            <div class="category__header">
                <h2 class="header__title">Category</h2>
            </div>
            @livewire('superadmin.category.read', compact('event'))
        </div>
    </section>
    
</x-layout.guest>