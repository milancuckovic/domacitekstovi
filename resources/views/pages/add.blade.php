@extends('layouts.app')
@section('content')
@include('inc.error')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <p>Molimo Vas da se pridržavate pravila prilikom kreiranja postova, ukoliko niste upućeni u pravila možete ih pročitati na stranici o nama</p>
                {!! Form::open(['action'=>'SongsController@store','method'=>'POST']) !!}
                        <div class="form-group" id="izvodjaci">
                            {{Form::label('artist_id', 'Izvođač pesme:')}}    
                            <input type="hidden" name="artists" id="artists">                 
                            <select class="form-control mt-1" id="artist_id" name="artist_id" >
                            <option value="blank" disabled selected></option>
                            @foreach($artists as $artist)  
                                <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                            @endforeach
                            </select>
                            <input type="button" class="mt-2 btn btn-secondary" value="Dodaj izvođača +" id="dodajizvodjaca" onclick="dodaj()">
                        </div>
                        <div class="form-group">
                            {{Form::label('name', 'Naziv Pesme')}} 
                            {{Form::text('name', ' ', ['class' =>'form-control', 'placeholder' => 'Naslov...'])}} 
                        </div>
                        <div class="form-group">
                            {{Form::label('text', 'Tekst pesme')}} 
                            {{Form::textarea('text', ' ', ['class' =>'form-control', 'placeholder' => 'Napišite text...'])}} 
                        </div>
                        <div class="form-group">
                        {{Form::submit('Pošalji', ['class'=>'btn btn-primary'])}} 
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection