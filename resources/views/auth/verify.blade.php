@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Potvrdite vašu E-Mail adresu') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Link za potvrdu vaše E-Mail adrese poslat je na vaš E-Mail.') }}
                        </div>
                    @endif

                    {{ __('Pre nastavka, proverite da li vam je stigao link za potvrdu E-Mail adrese.') }}
                    {{ __('Ukoliko niste dobili E-Mail') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Pošalji novi link') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
