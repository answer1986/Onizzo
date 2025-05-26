@section('footer')
<footer class="footer">
    <div class="footer-container">
        <div class="footer-content">
            <!-- Logo de la empresa -->
            <div class="footer-logo">
                <img src="{{ asset('./image/Onizzo-header.png') }}" alt="Logo Onizzo">
            </div>
            
            <!-- Sección Nuestra Empresa -->
            <div class="footer-section">
                <h4>Nuestra empresa</h4>
                <a href="#">Políticas y privacidad</a>
            </div>

            <!-- Sección Contacto -->
            <div class="footer-section2">
                <h4>Contacto</h4>
                <p>Mail: <a href="mailto:ventas@onizzo.com">ventas@onizzo.com</a></p>
                <p>Teléfono: <a href="tel:22682 9200">562 2682 9200</a></p>
            </div>

            <div class="footer-section footer-cert" id="cert">
                <h4>{{ __('messages.certificaciones') }}</h4>
                <img src="{{ asset('./image/icon/certificaciones.png') }}" id="cert1" alt="certificaciones"></a>
            </div>


            <!-- Sección Síguenos 
            <div class="footer-section footer-social" id="socials">
                <h4>Síguenos</h4>
                <a href="#"><img src="{{ asset('./image/insta.png') }}" alt="Instagram"></a>
                <a href="#"><img src="{{ asset('./image/facebook.png') }}" alt="Facebook"></a>
            </div>-->
            
        </div>
    </div>

    <!-- Sección inferior -->
    <div class="footer-bottom">
        <p>Desarrollo hecho por R3Q</p>
    </div>
</footer>

@endsection