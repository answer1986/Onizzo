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
                <h4>{{ __('messages.our_company') }}</h4>
                <a href="#">{{ __('messages.privacy_policy') }}</a>
            </div>

            <!-- Sección Contacto -->
            <div class="footer-section2">
                <h4>{{ __('messages.contact') }}</h4>
                <div class="footer-contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>{{ __('messages.mail') }}: <a href="mailto:ventas@onizzo.com">ventas@onizzo.com</a></span>
                </div>
                <div class="footer-contact-item">
                    <i class="fas fa-phone"></i>
                    <span>{{ __('messages.phone') }}: <a href="tel:22682 9200">562 2682 9200</a></span>
                </div>
            </div>

            <div class="footer-section footer-cert" id="cert">
                <h4>{{ __('messages.certificaciones') }}</h4>
                <img src="{{ asset('./image/icon/certificaciones.png') }}" id="cert1" alt="certificaciones">
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
        <p>{{ __('messages.development_by') }}</p>
    </div>
</footer>

@endsection