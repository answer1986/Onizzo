@section('footer')
<footer class="footer">
    <div class="footer-container">
        <div class="footer-content">
            <!-- Logo de la empresa -->
            <div class="footer-logo">
                {!! editableImage('footer_logo', './image/Onizzo-header.png', 'Logo Onizzo', 'footer') !!}
            </div>
            
            <!-- Sección Nuestra Empresa -->
            <div class="footer-section">
                <h4>{!! editableContent('footer_company_title', 'footer', __('messages.our_company')) !!}</h4>
                <a href="{!! strip_tags(editableContent('footer_privacy_url', 'footer', '#')) !!}">{!! editableContent('footer_privacy_text', 'footer', __('messages.privacy_policy')) !!}</a>
            </div>

            <!-- Sección Contacto -->
            <div class="footer-section2">
                <h4>{!! editableContent('footer_contact_title', 'footer', __('messages.contact')) !!}</h4>
                <!--<div class="footer-contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>{!! editableContent('footer_email_label', 'footer', __('messages.mail')) !!}: <a href="mailto:{!! strip_tags(editableContent('footer_email', 'footer', 'ventas@onizzo.com')) !!}">{!! editableContent('footer_email', 'footer', 'ventas@onizzo.com') !!}</a></span>
                </div>-->
                <div class="footer-contact-item">
                    <i class="fas fa-phone"></i>
                    <span>{!! editableContent('footer_phone_label', 'footer', __('messages.phone')) !!}: <a href="tel:{!! str_replace([' ', '-', '(', ')', '+'], '', strip_tags(editableContent('footer_phone', 'footer', '562 2682 9200'))) !!}">{!! editableContent('footer_phone', 'footer', '562 2682 9200') !!}</a></span>
                </div>
            </div>

            <div class="footer-section footer-cert" id="cert">
                <h4>{!! editableContent('footer_cert_title', 'footer', __('messages.certificaciones')) !!}</h4>
                <div id="cert1" style="height: 150%;">
                    {!! editableImage('footer_cert_image', './image/icon/certificaciones.png', 'certificaciones', 'footer', '', 'height: 150%; width: auto; object-fit: contain;') !!}
                </div>
            </div>


            <!-- Sección Síguenos 
            <div class="footer-section footer-social" id="socials">
                <h4>{!! editableContent('footer_social_title', 'footer', 'Síguenos') !!}</h4>
                <a href="{!! strip_tags(editableContent('footer_instagram_url', 'footer', '#')) !!}">{!! editableImage('footer_instagram_icon', './image/insta.png', 'Instagram', 'footer') !!}</a>
                <a href="{!! strip_tags(editableContent('footer_facebook_url', 'footer', '#')) !!}">{!! editableImage('footer_facebook_icon', './image/facebook.png', 'Facebook', 'footer') !!}</a>
            </div>-->
            
        </div>
    </div>

    <!-- Sección inferior -->
    <div class="footer-bottom">
        <p><a href="https://r3q.cl" target="_blank" rel="noopener noreferrer">{{ __('messages.development_by') }}</a></p>
    </div>
</footer>

@endsection