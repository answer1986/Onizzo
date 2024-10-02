<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Onizzo</title>


<!--script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> <!-- (Opcional) Para tooltips y popovers -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link href="{{asset('../resources/css/app.css') }}" rel="stylesheet">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> 
   <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">




</head>

<body>

                @yield('header')
                @yield('video')
                @yield('productos')
                @yield('nosotros')
                @yield('contacto')
                @yield('ambiente')
                @yield('footer')

<script>
// Seleccionar todas las imágenes del carrusel
const images = document.querySelectorAll('.carousel-image');
let currentImageIndex = 0;

// Función para cambiar las imágenes
function showNextImage() {
    images[currentImageIndex].classList.remove('active'); // Ocultar imagen actual
    currentImageIndex = (currentImageIndex + 1) % images.length; // Mover al siguiente índice
    images[currentImageIndex].classList.add('active'); // Mostrar la siguiente imagen
}

// Mostrar la primera imagen al cargar la página
images[currentImageIndex].classList.add('active');

// Cambiar imagen cada 3 segundos
setInterval(showNextImage, 3000);
 
</script> 


<script>
document.addEventListener('DOMContentLoaded', function() {
    const mainSlider = document.querySelector('.main-slider');
    const thumbnailSlider = document.querySelector('.thumbnail-slider');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const slides = document.querySelectorAll('.slider-item');
    const thumbnails = document.querySelectorAll('.thumbnail-item');
    let currentIndex = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
        });
        thumbnails.forEach((thumb, i) => {
            thumb.classList.toggle('active', i === index);
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        showSlide(currentIndex);
    }

    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);

    thumbnails.forEach((thumb, index) => {
        thumb.addEventListener('click', () => {
            currentIndex = index;
            showSlide(currentIndex);
        });
    });

    // Avance automático cada 7 segundos
    setInterval(nextSlide, 7000);
});

</script>  



</body>
</html>