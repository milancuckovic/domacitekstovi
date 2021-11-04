<nav class="navbar navbar-expand-md navigacioni-meni navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <img src="{{ URL::to('/') }}/image/domacitekstovi-logo.png" class="slika-logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">{{ __('Početna') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/kontakt">{{ __('Kontakt') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/onama">{{ __('O nama') }}</a>
                        </li>
                    </ul>
                    <hr>
                    <ul class="navbar-nav ml-auto"> 
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Prijava') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->role == 'admin')
                                    <a class="dropdown-item" href="/admin-home">
                                        {{ __('Admin panel') }}
                                    </a>
                                    <a class="dropdown-item" href="/dodajtekst">
                                        {{ __('Dodaj tekst') }}
                                    </a>
                                    <a class="dropdown-item" href="/autor-dodaj">
                                        {{ __('Dodaj autora') }}
                                    </a>
                                    @else
                                    <a class="dropdown-item" href="/dodajtekst">
                                        {{ __('Dodaj tekst') }}
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Odjava') }}
                                    </a>     
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>