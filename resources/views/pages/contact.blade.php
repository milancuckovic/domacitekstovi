@extends('layouts.app')
@section('content')
@include('inc.error')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>Možete nas kontaktirati pomoću forme:</h4>
                    {!! Form::open(['action'=>'ContactsController@kontakt','method'=>'POST']) !!}
                    @guest
                        
                        <div class="form-group">
                            {{Form::label('email', 'Email')}} 
                            {{Form::email('email', ' ', ['class' =>'form-control', 'placeholder'  =>'email...'])}} 
                        </div>
                        <div class="form-group">
                            {{Form::label('naslovporuke', 'Naslov')}} 
                            {{Form::text('naslovporuke', ' ', ['class' =>'form-control', 'placeholder'  =>'Naslov...'])}} 
                        </div>
                        <div class="form-group">
                            {{Form::label('poruka', 'Poruka')}} 
                            {{Form::textarea('poruka', ' ', ['class' =>'form-control', 'placeholder'  =>'Napišite sadržaj poruke...'])}} 
                        </div>
                        <div class="form-group">
                        {{Form::submit('Pošalji', ['class'=>'btn btn-danger'])}} 
                        </div>
                    @else
                    <div class="form-group">
                            {{Form::label('email', 'Email')}} 
                            {{Form::email('email', Auth::User()->email, ['class' =>'form-control', 'placeholder'  =>'email...','readonly'])}} 
                        </div>
                        <div class="form-group">
                            {{Form::label('naslovporuke', 'Naslov')}} 
                            {{Form::text('naslovporuke', ' ', ['class' =>'form-control', 'placeholder'  =>'Naslov...'])}} 
                        </div>
                        <div class="form-group">
                            {{Form::label('poruka', 'Poruka')}} 
                            {{Form::textarea('poruka', ' ', ['class' =>'form-control', 'placeholder'  =>'Napišite sadržaj poruke...'])}} 
                        </div>
                        <div class="form-group">
                        {{Form::submit('Pošalji', ['class'=>'btn btn-danger'])}} 
                        </div>
                    @endguest
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3>Kontakt:</h3>
                    <hr>
                    <p>Adresa: <br> Bulevar Oslobođenja 25, Novi Sad</p>
                    <p>Telefon: <nr> 021/212-1212</p>
                    <p>Email: <br> contact@domacitekstovi.com</p>
                    <hr>
                    <h4>Lokacija:</h4>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2808.2795544861847!2d19.82892731545822!3d45.26235945490988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475b10505f8c86e5%3A0x66db08883c30e6ac!2z0JHRg9C70LXQstCw0YAg0L7RgdC70L7QsdC-0ZLQtdGa0LAgMi0xMCwg0J3QvtCy0Lgg0KHQsNC0IDIxMDAw!5e0!3m2!1ssr!2srs!4v1579988600217!5m2!1ssr!2srs" width="400" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection