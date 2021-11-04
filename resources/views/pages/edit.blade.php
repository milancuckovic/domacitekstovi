@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <p>Molimo Vas da se pridržavate pravila prilikom izmena postova, ukoliko niste upućeni u pravila možete ih pročitati na stranici o nama</p>              
                <div class="card-header"> 
                    <img src="{{ URL::to('/') }}/{{ $song->artists->first()->image }}" class="artist-img">
                    <h1>{{$song->name}}</h1>
                    <small>Dodao: <b>{{$song->user->name}}</b></small><br>                   
                    <small>Napisan je: <b>{{$song->created_at->format('d/m/Y')}}</b></small><br> 
                </div> 
                {!! Form::open(['action'=>['SongsController@update',$song->id],'method'=>'POST']) !!}
                        <div class="form-group mt-4">
                            {{Form::label('text', 'Tekst pesme:')}} 
                            {{Form::textarea('text', $song->text, ['class' =>'form-control'])}} 
                        </div>
                        <div class="form-group">
                        
                        {{Form::submit('Sačuvaj', ['class'=>'btn btn-primary'])}} 
                        </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection