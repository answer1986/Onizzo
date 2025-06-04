@section('header')
<header class="header">
    <div class="header-container">
        <div class="header-logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('image/Onizzo-header.png') }}" alt="Onizzo Logo">
            </a>
        </div>
        <nav class="nav-menu">
            <ul>
                <li><a href="#producto">{{ __('messages.productos') }}</a></li>
                <li><a href="#nosotros">{{ __('messages.nosotros') }}</a></li>
                <li><a href="#mercados">{{ __('messages.mercados') }}</a></li>
                <li><a href="#contacto">{{ __('messages.contacto') }}</a></li>
                <li class="language-switch">
                    <a href="{{ route('lang.switch', ['lang' => 'es']) }}" class="{{ app()->getLocale() == 'es' ? 'active' : '' }}">
                        <img src="{{ asset('image/icon/spain.webp') }}" alt="Español" style="width: 70px; height: 50px;">
                    </a>
                    <span>|</span>
                    <a href="{{ route('lang.switch', ['lang' => 'en']) }}" class="{{ app()->getLocale() == 'en' ? 'active' : '' }}">
                        <img src="{{ asset('image/icon/british.webp') }}" alt="English" style="width: 70px; height: 50px;">
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>
@endsection
