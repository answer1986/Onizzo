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
            <li><a href="#producto">{{ __('productos') }}</a></li>
                <li><a href="#nosotros">{{ __('nosotros') }}</a></li>
                <li><a href="#ambiente">{{ __('medio ambiente') }}</a></li>
                <li><a href="#contacto">{{ __('contacto') }}</a></li>
                <li class="language-switch">
                    <a href="{{ route('lang.switch', ['lang' => 'es']) }}" class="{{ app()->getLocale() == 'es' ? 'active' : '' }}">ES</a>
                    <span>|</span>
                    <a href="{{ route('lang.switch', ['lang' => 'en']) }}" class="{{ app()->getLocale() == 'en' ? 'active' : '' }}">EN</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
@endsection