@extends('layouts.all')
@extends('essencials.header')

@section('video')
<section class="video-section">
    <div class="video-container" id="producto">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/O2AZCk3e8gM?si=SdR1eYsnri1CEtPa&amp;controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            referrerpolicy="strict-origin-when-cross-origin"
            allowfullscreen></iframe>
    </div>
    <div class="video-content">
        <h2>{{ __('messages.video_title') }}</h2>
        <p>{{ __('messages.video_subtitle') }}</p>
    </div>
</section>
@endsection

@section('productos')
<div class="slider-container">
    <div class="main-slider">
        <div class="slider-item active">
            <img src="{{ asset('./image/carrusel/pasas-1.jpeg') }}" alt="{{ __('messages.slider_pasas') }}">
            <div class="slider-content">
                <h2>{{ __('messages.slider_title') }}</h2>
                <h3>{{ __('messages.slider_pasas') }}</h3>
                <p>{{ __('messages.slider_pasas_description') }}</p>
            </div>
        </div>
        <div class="slider-item">
            <img src="{{ asset('./image/carrusel/agro.png') }}" alt="{{ __('messages.slider_agro') }}">
            <div class="slider-content">
                <h2>{{ __('messages.slider_title') }}</h2>
                <h3>{{ __('messages.slider_agro') }}</h3>
                <p>{{ __('messages.slider_agro_description') }}</p>
            </div>
        </div>
        <div class="slider-item">
            <img src="{{ asset('./image/carrusel/agricultura.jpeg') }}" alt="{{ __('messages.slider_agriculture') }}">
            <div class="slider-content">
                <h2>{{ __('messages.slider_title') }}</h2>
                <h3>{{ __('messages.slider_agriculture') }}</h3>
                <p>{{ __('messages.slider_agriculture_description') }}</p>
            </div>
        </div>
    </div>
    
    <div class="thumbnail-slider">
        <div class="thumbnail-item active">
            <img src="{{ asset('./image/carrusel/pasas-1.jpeg') }}" alt="{{ __('messages.slider_pasas') }}">
        </div>
        <div class="thumbnail-item">
            <img src="{{ asset('./image/carrusel/agro.png') }}" alt="{{ __('messages.slider_agro') }}">
        </div>
        <div class="thumbnail-item">
            <img src="{{ asset('./image/carrusel/agricultura.jpeg') }}" alt="{{ __('messages.slider_agriculture') }}">
        </div>
    </div>
    
    <div class="slider-controls">
        <button id="prevBtn" class="control-btn">&lt;</button>
        <button id="nextBtn" class="control-btn">&gt;</button>
    </div>
</div>
@endsection

@section('nosotros')
<section class="about-us-section">
    <div class="text-column">
        <h3 id="nosotros">{{ __('messages.about_us') }}</h3>
        <p>{{ __('messages.about_us_description') }}</p>
    </div>
    <div class="image-column">
        <div class="carousel">
            <img class="carousel-image" src="{{ asset('./image/frutas secas.jpeg') }}" alt="{{ __('messages.carousel_image_1') }}">
            <img class="carousel-image" src="{{ asset('./image/pasas.jpeg') }}" alt="{{ __('messages.carousel_image_2') }}">
            <img class="carousel-image" src="{{ asset('./image/ciruela.png') }}" alt="{{ __('messages.carousel_image_3') }}">
        </div>
    </div>
</section>
@endsection

@section('contacto')
<section class="contact-section">
    <div class="left-column" id="ambiente">
        <h3>{{ __('messages.sustainability') }}</h3>
        <p>{{ __('messages.sustainability_description') }}</p>
    </div>

    <div class="right-column">
        <h3 id="contacto">{{ __('messages.contact_us') }}</h3>
        <form action="https://formspree.io/f/xnnaekdr" method="POST">
            <label>{{ __('messages.email') }}
                <input type="email" name="email" id="email">
            </label>
            <label>{{ __('messages.message') }}
                <textarea name="message"></textarea>
            </label>
            <button type="submit">{{ __('messages.send') }}</button>
        </form>
    </div>
</section>
@endsection

@section('ambiente')
<section class="ambiente-section">
    <div class="ambiente-content">
        <h2>{{ __('messages.our_commitment') }}</h2>
        <p>{{ __('messages.sustainability_description') }}</p>
        
        <h3>{{ __('messages.sustainable_practices') }}</h3>
        <ul>
            <li><strong>{{ __('messages.agriculture_practices') }}</strong> {{ __('messages.agriculture_practices_description') }}</li>
            <li><strong>{{ __('messages.water_management') }}</strong> {{ __('messages.water_management_description') }}</li>
            <li><strong>{{ __('messages.renewable_energy') }}</strong> {{ __('messages.renewable_energy_description') }}</li>
            <li><strong>{{ __('messages.eco_packaging') }}</strong> {{ __('messages.eco_packaging_description') }}</li>
        </ul>

        <h3>{{ __('messages.biodiversity_conservation') }}</h3>
        <p>{{ __('messages.biodiversity_description') }}</p>

        <h3>{{ __('messages.certifications') }}</h3>
        <p>{{ __('messages.certifications_description') }}</p>
        <ul>
            <li>{{ __('messages.organic_certification') }}</li>
            <li>{{ __('messages.fair_trade') }}</li>
            <li>{{ __('messages.rainforest_alliance') }}</li>
            <li>{{ __('messages.iso_14001') }}</li>
        </ul>
    </div>
</section>
@endsection

@extends('essencials.footer')