@extends('layouts.all')
@extends('essencials.header')

@section('video')
<section class="video-section">
<div class="video-container" id="producto">
    <video autoplay muted loop playsinline style="width:100%;">
        <source src="{{ asset('./video/chile.mp4') }}" type="video/mp4">
        Tu navegador no soporta el tag de video.
    </video>
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
    <!-- Columna izquierda con información de sostenibilidad -->
    <div class="left-column" id="ambiente">
        <h2 id="contacto-title">{{ __('messages.sustainability') }}</h2>
        <p>{{ __('messages.sustainability_description') }}</p>
    </div>

    <!-- Columna derecha con la tarjeta de contacto que se voltea -->
    <div class="right-column">
        <div class="card">
            <div class="card-inner">
                <!-- Cara frontal de la tarjeta -->
                <div class="card-front">
                    <h3>{{ __('messages.contact_us') }}</h3>
                    <p>Haz clic para contactarnos</p>
                </div>
                <!-- Cara trasera de la tarjeta con el formulario -->
                <div class="card-back">
                    <h3 id="contact">{{ __('messages.contact_us') }}</h3>
                    <form action="https://formspree.io/f/xnnaekdr" method="POST">
                        <label id="contact">{{ __('messages.email') }}
                            <input type="email" name="email" id="email" required>
                        </label>
                        <label id="contact">{{ __('messages.message') }}
                            <textarea name="message" required></textarea>
                        </label>
                        <button type="submit">{{ __('messages.send') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('ambiente')
<section class="ambiente-section">
    <div class="ambiente-content">
        <h2>{{ __('messages.our_commitment') }}</h2>
        <p>{{ __('messages.sustainability_description') }}</p>
        
        <div class="sustainability-practices">
            <h3>{{ __('messages.sustainable_practices') }}</h3>
            <ul>
                <li><img src="{{ asset('./image/icon/compost-2.png') }}" alt="Agricultura"><strong>{{ __('messages.agriculture_practices') }}</strong> {{ __('messages.agriculture_practices_description') }}</li>
                <li><img src="{{ asset('./image/icon/agua.png') }}" alt="Agua"><strong>{{ __('messages.water_management') }}</strong> {{ __('messages.water_management_description') }}</li>
                <li><img src="{{ asset('./image/icon/energia.png') }}" alt="Energía"><strong>{{ __('messages.renewable_energy') }}</strong> {{ __('messages.renewable_energy_description') }}</li>
                <li><img src="{{ asset('./image/icon/empaque.png') }}" alt="Empaque"><strong>{{ __('messages.eco_packaging') }}</strong> {{ __('messages.eco_packaging_description') }}</li>
            </ul>
        </div>

        <div class="biodiversity">
            <h3>{{ __('messages.biodiversity_conservation') }}</h3>
            <p>{{ __('messages.biodiversity_description') }}</p>
        </div>

        <div class="certifications">
            <h3>{{ __('messages.certifications') }}</h3>
            <p>{{ __('messages.certifications_description') }}</p>
            <ul>
                <li><img src="/icons/organic.png" alt="Orgánico">{{ __('messages.organic_certification') }}</li>
                <li><img src="/icons/fair_trade.png" alt="Fair Trade">{{ __('messages.fair_trade') }}</li>
                <li><img src="/icons/rainforest.png" alt="Rainforest">{{ __('messages.rainforest_alliance') }}</li>
                <li><img src="/icons/iso.png" alt="ISO">{{ __('messages.iso_14001') }}</li>
            </ul>
        </div>
    </div>
</section>

@endsection

@extends('essencials.footer')