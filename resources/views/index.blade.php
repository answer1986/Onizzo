@extends('layouts.all')
@extends('essencials.header')

@section('video2')
<!--<section class="video-section">
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
</section>-->
@endsection

<!-- PLANO 1: Cabecera + Nuestros Productos + Sobre Nosotros -->
@section('video')
<div class="plano-1">
    <div class="container" id="productos-seccion1">
        <div class="header">
            <h1>{{ __('messages.our_products') }}</h1>
        </div>
        <div class="content-wrapper">
            <div class="image-container">
                <div class="image">
                    <img src="{{ asset('./image/productos/ciruelas.png') }}" alt="ciruelas">
                    <div class="text-overlay">
                        <h3>{{ __('messages.dried_plums') }}</h3>
                        <p>{{ __('messages.dried_plums_desc') }}</p>
                    </div>
                </div>
                <div class="image">
                    <img src="{{ asset('./image/productos/ajos.png') }}" alt="ajos">
                    <div class="text-overlay">
                        <h3>{{ __('messages.fresh_garlic') }}</h3>
                        <p>{{ __('messages.fresh_garlic_desc') }}</p>
                    </div>
                </div>
                <div class="image">
                    <img src="{{ asset('./image/productos/guinda.png') }}" alt="guindas">
                    <div class="text-overlay">
                        <h3>{{ __('messages.fresh_cherries') }}</h3>
                        <p>{{ __('messages.fresh_cherries_desc') }}</p>
                    </div>
                </div>
                <div class="image">
                    <img src="{{ asset('./image/productos/nueces.png') }}" alt="nueces">
                    <div class="text-overlay">
                        <h3>{{ __('messages.walnuts') }}</h3>
                        <p>{{ __('messages.walnuts_desc') }}</p>
                    </div>
                </div>
            </div>
            <div class="product-description"></div>
        </div>
    </div>
    
    <!-- Sobre Nosotros en PLANO 1 -->
    <section class="about-us-section">
        <div class="text-column">
            <h4 id="nosotros">{{ __('messages.about_us') }}</h4>
            <p>{{ __('messages.about_us_description') }}</p>
        </div>
        <div class="image-column">
            <div class="carousel">
                <img class="carousel-image active" src="{{ asset('./image/frutas secas.jpeg') }}" alt="{{ __('messages.carousel_image_1') }}">
                <img class="carousel-image" src="{{ asset('./image/pasas.jpeg') }}" alt="{{ __('messages.carousel_image_2') }}">
                <img class="carousel-image" src="{{ asset('./image/ciruela.png') }}" alt="{{ __('messages.carousel_image_3') }}">
                <img class="carousel-image" src="{{ asset('./image/Jefe.jpeg') }}" alt="{{ __('messages.carousel_image_4') }}">
            </div>
        </div>
    </section>
</div>
@endsection

@section('nosotros')
@endsection

<!-- PLANO 2: Sobre Nosotros (continuación) + Sliders -->
@section('productos')
<div class="plano-2">
    <div class="slider-container">
        <div class="main-slider">
            <div class="slider-item active">
                <img src="{{ asset('./image/carrusel/pasas-1.jpeg') }}" alt="{{ __('messages.slider_pasas') }}">
                <div class="slider-content">
                    <h3>{{ __('messages.slider_pasas') }}</h3>
                    <p>{{ __('messages.slider_pasas_description') }}</p>
                </div>
            </div>
            <div class="slider-item">
                <img src="{{ asset('./image/carrusel/agro.png') }}" alt="{{ __('messages.slider_agro') }}">
                <div class="slider-content">
                    <h3>{{ __('messages.slider_agro') }}</h3>
                    <p>{{ __('messages.slider_agro_description') }}</p>
                </div>
            </div>
            <div class="slider-item">
                <img src="{{ asset('./image/carrusel/agricultura.jpeg') }}" alt="{{ __('messages.slider_agriculture') }}">
                <div class="slider-content">
                    <h3>{{ __('messages.slider_agriculture') }}</h3>
                    <p>{{ __('messages.slider_agriculture_description') }}</p>
                </div>
            </div>
            <!-- Agregando los slides faltantes -->
            <div class="slider-item">
                <img src="{{ asset('./image/carrusel/trucks.jpg') }}" alt="{{ __('messages.slider_camion') }}">
                <div class="slider-content">
                    <h3>{{ __('messages.slider_camion') }}</h3>
                    <p>{{ __('messages.slider_camion_description') }}</p>
                </div>
            </div>
            <div class="slider-item">
                <img src="{{ asset('./image/carrusel/barco2.jpg') }}" alt="{{ __('messages.slider_barco') }}">
                <div class="slider-content">
                    <h3>{{ __('messages.slider_barco') }}</h3>
                    <p>{{ __('messages.slider_barco_description') }}</p>
                </div>
            </div>
        </div>
        
        <div class="thumbnail-slider">
            <div class="thumbnail-item active">
                <img src="{{ asset('./image/carrusel/agricultura.jpeg') }}" alt="{{ __('messages.slider_agriculture') }}">
            </div>
            <div class="thumbnail-item">
                <img src="{{ asset('./image/carrusel/agro.png') }}" alt="{{ __('messages.slider_agro') }}">
            </div>
            <div class="thumbnail-item">
                <img src="{{ asset('./image/carrusel/pasas-1.jpeg') }}" alt="{{ __('messages.slider_pasas') }}">
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
</div>
@endsection

<!-- PLANO 3: Mapa de mercados -->
@section('mercados')
<div class="plano-3">
    <section class="ambiente-section">
        <div class="ambiente-content" id="mercados" style="margin-left:10px";>More actions
            <h2>{{ __('messages.our_commitment') }}</h2>

            <img src="{{ asset('./image/Mapa-Onizzo.png') }}" alt="{{ __('messages.world') }}" style="width:100%" >
        </div>
    </section>
</div>
@endsection



<!-- 
@section('mercados')
<div class="plano-3">
    <div class="container-mapa" id="mercados">
        <h1>🌍 {{ __('messages.our_commitment') }}</h1>
        
        <svg class="mapa-mundial" viewBox="0 0 2754 1398" xmlns="http://www.w3.org/2000/svg">
          <image href="{{ asset('image/BlankMap-World.svg') }}" width="2754" height="1398" />
          
          
          
          <circle class="circulo-chile circulo-pais" cx="780" cy="950" r="12" data-pais="Chile">
            <title>Chile - Oficina Principal</title>
          </circle>
          
          <circle class="circulo-pais" cx="850" cy="950" r="9" data-pais="Argentina">
            <title>Argentina</title>
          </circle>
          
          <circle class="circulo-pais" cx="760" cy="820" r="9" data-pais="Perú">
            <title>Perú</title>
          </circle>
          
          <circle class="circulo-pais" cx="690" cy="710" r="9" data-pais="Ecuador">
            <title>Ecuador</title>
          </circle>
          
          <circle class="circulo-pais" cx="740" cy="680" r="9" data-pais="Colombia">
            <title>Colombia</title>
          </circle>
          
          <circle class="circulo-pais" cx="660" cy="600" r="9" data-pais="Panamá">
            <title>Panamá</title>
          </circle>
          
          <circle class="circulo-pais" cx="620" cy="580" r="9" data-pais="Costa Rica">
            <title>Costa Rica</title>
          </circle>
          
          <circle class="circulo-pais" cx="760" cy="530" r="9" data-pais="República Dominicana">
            <title>República Dominicana</title>
          </circle>
          
          <circle class="circulo-pais" cx="560" cy="530" r="18" data-pais="México">
            <title>México</title>
          </circle>
          
          <circle class="circulo-pais" cx="670" cy="380" r="18" data-pais="Estados Unidos">
            <title>Estados Unidos</title>
          </circle>
          
        
          <circle class="circulo-pais" cx="1300" cy="330" r="18" data-pais="España">
            <title>España</title>
          </circle>
          
          <circle class="circulo-pais" cx="1340" cy="320" r="18" data-pais="Francia">
            <title>Francia</title>
          </circle>
          
          <circle class="circulo-pais" cx="1800" cy="330" r="18" data-pais="Italia">
            <title>Italia</title>
          </circle>
          
          <circle class="circulo-pais" cx="1380" cy="280" r="18" data-pais="Alemania">
            <title>Alemania</title>
          </circle>
          
          <circle class="circulo-pais" cx="1800" cy="190" r="18" data-pais="Suiza">
            <title>Suiza</title>
          </circle>
          
          <circle class="circulo-pais" cx="1350" cy="270" r="18" data-pais="Países Bajos">
            <title>Países Bajos</title>
          </circle>
         
          <circle class="circulo-pais" cx="1300" cy="260" r="18" data-pais="Reino Unido">
            <title>Reino Unido</title>
          </circle>
          
          <circle class="circulo-pais" cx="1550" cy="370" r="18" data-pais="Turquía">
            <title>Turquía</title>
          </circle>
          
          <circle class="circulo-pais" cx="1850" cy="360" r="18" data-pais="Grecia">
            <title>Grecia</title>
          </circle>
          
          <circle class="circulo-pais" cx="1380" cy="420" r="18" data-pais="Túnez">
            <title>Túnez</title>
          </circle>
          
        
          <circle class="circulo-pais" cx="1900" cy="600" r="18" data-pais="India">
            <title>India</title>
          </circle>
          
          <circle class="circulo-pais" cx="2100" cy="450" r="18" data-pais="China">
            <title>China</title>
          </circle>
          
          <circle class="circulo-pais" cx="2110" cy="570" r="18" data-pais="Vietnam">
            <title>Vietnam</title>
          </circle>
          
          <circle class="circulo-pais" cx="2220" cy="380" r="18" data-pais="Corea del Sur">
            <title>Corea del Sur</title>
          </circle>
          
          <circle class="circulo-pais" cx="2300" cy="900" r="18" data-pais="Australia">
            <title>Australia</title>
          </circle>
          
        
          <circle class="circulo-pais" cx="1520" cy="900" r="18" data-pais="Sudáfrica">
            <title>Sudáfrica</title>
          </circle>
          
          <circle class="hover-circle" id="hover-circle" r="40"/>
          <text class="hover-text" id="hover-text"></text>
        </svg>
        
        <div class="leyenda">
          <div class="leyenda-item">
            <div class="leyenda-circulo leyenda-chile"></div>
            <span>Chile (Oficina Principal)</span>
          </div>
          <div class="leyenda-item">
            <div class="leyenda-circulo leyenda-otros"></div>
            <span>Otros Países</span>
          </div>
        </div>
    </div>
</div>
@endsection

<!-- PLANO 4: Contacto + Footer -->
@section('contacto')
<div class="plano-4">
    <section class="contact-section" >
        <!-- Columna izquierda con logo y título de contacto -->
        <div class="left-column" id="contact-info" >
            <!-- Logo de ONIZZO -->
            <img src="{{ asset('image/Onizzo-logo.png') }}" alt="Logo ONIZZO" class="onizzo-logo2"  id="contacto">
            
            <!-- Título de la sección de contacto -->
            <h3 id="contacto-title">{{ __('messages.contact_us') }} </h3>
            
            <!-- Datos de contacto -->
            <div class="contact-details">
                <div class="contact-item">
                    <div class="contact-info">
                        <i class="fas fa-envelope contact-icon"></i>
                        <div class="contact-text">
                            <strong>Agustín Marín Cobo:</strong>
                            <span>agustin@onizzo.com</span>
                        </div>
                    </div>
                    <a href="mailto:agustin@onizzo.com" class="contact-action">
                        <i class="fas fa-paper-plane"></i>
                        {{ __('messages.send_email') }}
                    </a>
                </div>
                
                <div class="contact-item">
                    <div class="contact-info">
                        <i class="fas fa-envelope contact-icon"></i>
                        <div class="contact-text">
                            <strong>Claudia Marangunic:</strong>
                            <span>cmarangunic@onizzo.com</span>
                        </div>
                    </div>
                    <a href="mailto:cmarangunic@onizzo.com" class="contact-action">
                        <i class="fas fa-paper-plane"></i>
                        {{ __('messages.send_email') }}
                    </a>
                </div>
                
                <div class="contact-item">
                    <div class="contact-info">
                        <i class="fas fa-envelope contact-icon"></i>
                        <div class="contact-text">
                            <strong>{{ __('messages.general_info') }}:</strong>
                            <span>info@onizzo.com</span>
                        </div>
                    </div>
                    <a href="mailto:info@onizzo.com" class="contact-action">
                        <i class="fas fa-paper-plane"></i>
                        {{ __('messages.send_email') }}
                    </a>
                </div>
                
                <div class="contact-item">
                    <div class="contact-info">
                        <i class="fas fa-phone contact-icon"></i>
                        <div class="contact-text">
                            <strong>{{ __('messages.phone') }}:</strong>
                            <span>+56 2 2927 0470</span>
                        </div>
                    </div>
                    <a href="tel:+56229270470" class="contact-action">
                        <i class="fas fa-phone-alt"></i>
                        {{ __('messages.call_us') }}
                    </a>
                </div>
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
                <p>{{ __('messages.address') }}</p>
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
</div>
@endsection

@extends('essencials.footer')

<script>
// Carrusel automático restaurado
document.addEventListener('DOMContentLoaded', function() {
    const images = document.querySelectorAll('.carousel-image');
    let currentIndex = 0;

    function showNextImage() {
        images[currentIndex].classList.remove('active');
        currentIndex = (currentIndex + 1) % images.length;
        images[currentIndex].classList.add('active');
    }

    // Cambiar imagen cada 3 segundos
    setInterval(showNextImage, 3000);
});


 // JavaScript para la interactividad con círculo morado alrededor del puntero
 const circulos = document.querySelectorAll('.circulo-pais');
    const hoverCircle = document.getElementById('hover-circle');
    const hoverText = document.getElementById('hover-text');
    
    circulos.forEach(circulo => {
      circulo.addEventListener('mouseenter', function(e) {
        const pais = this.getAttribute('data-pais');
        const cx = this.getAttribute('cx');
        const cy = this.getAttribute('cy');
        
        // Posicionar el círculo morado ALREDEDOR del puntero
        hoverCircle.setAttribute('cx', cx);
        hoverCircle.setAttribute('cy', cy);
        hoverCircle.classList.add('visible');
        
        // Posicionar y mostrar el texto DENTRO del círculo
        hoverText.setAttribute('x', cx);
        hoverText.setAttribute('y', cy);
        hoverText.textContent = pais;
        hoverText.classList.add('visible');
      });
      
      circulo.addEventListener('mouseleave', function() {
        hoverCircle.classList.remove('visible');
        hoverText.classList.remove('visible');
      });
      
      circulo.addEventListener('click', function() {
        const pais = this.getAttribute('data-pais');
        alert(`¡Has seleccionado ${pais}! 🌍\n\nEste país forma parte de nuestra red global.`);
      });
    });
</script>