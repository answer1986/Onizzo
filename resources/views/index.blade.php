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
        <div class="thumbnail-item">
            <img src="{{ asset('./image/carrusel/camion.jpg') }}" alt="{{ __('messages.slider_camion') }}">
        </div>
        <div class="thumbnail-item">
            <img src="{{ asset('./image/carrusel/barco.jpg') }}" alt="{{ __('messages.slider_barco') }}">
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
    <!-- Columna izquierda con logo y título de contacto -->
    <div class="left-column" id="contact-info">
        <!-- Logo de ONIZZO -->
        <img src="{{ asset('image/Onizzo-logo.png') }}" alt="Logo ONIZZO" class="onizzo-logo">
        
        <!-- Título de la sección de contacto -->
        <h2 id="contacto-title">{{ __('messages.contact_us') }}</h2>
        
        <!-- Datos de contacto -->
        <div class="contact-details">
            <p id="contacto"><strong>Agustín Marín Cobo:</strong> agustin@onizzo.com</p>
            <p><strong>Claudia Marangunic:</strong> cmarangunic@onizzo.com</p>
            <p><strong>Información general:</strong> info@onizzo.com</p>
            <p><strong>Teléfono:</strong> +56 2 2927 0470</p>
        </div>
    </div>

    <!-- Columna derecha con mapa y formulario de contacto -->
    <div class="right-column">
        <!-- Recuadro del mapa de Google -->
        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3329.7186750980076!2d-70.6336576!3d-33.4182339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c58504fbc6d3%3A0x7e0c2b3451f6b911!2sAv.%20Pedro%20de%20Valdivia%20Nte.%20129%2C%20Providencia%2C%20Regi%C3%B3n%20Metropolitana%2C%20Chile!5e0!3m2!1ses!2scl!4v1619818624912!5m2!1ses!2scl" 
                width="100%" 
                height="300" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
            <p >AVENIDA PEDRO DE VALDIVIA NORTE 0129 OF. 502, PROVIDENCIA – SANTIAGO – CHILE</p>
        </div>
        
        <!-- Tarjeta de contacto con el formulario -->
       <!--  <div class="card">
            <div class="card-inner">
                <div class="card-front">
                    <h3>{{ __('messages.contact_us') }}</h3>
                    <p>Haz clic para contactarnos</p>
                </div>
               <div class="card-back">
                    <h3>{{ __('messages.contact_us') }}</h3>
                    <form action="https://formspree.io/f/xnnaekdr" method="POST">
                        <label>{{ __('messages.email') }}
                            <input type="email" name="email" id="email" required>
                        </label>
                        <label>{{ __('messages.message') }}
                            <textarea name="message" required></textarea>
                        </label>
                        <button type="submit">{{ __('messages.send') }}</button>
                    </form>
                </div>
            </div>
        </div>-->
    </div>
</section>
@endsection


@section('mercados')
<section class="ambiente-section">
    <div class="ambiente-content"  id="mercados">
        <h2>{{ __('messages.our_commitment') }}</h2>
        
        <img src="{{ asset('./image/Mapa-Onizzo.png') }}" alt="{{ __('messages.world') }}" style="width:1800px" >

                
            
        </div>
    </div>
</section>

@endsection

@extends('essencials.footer')