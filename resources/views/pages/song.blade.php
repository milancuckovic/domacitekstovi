@extends('layouts.app')
@section('content')
@include('inc.song-options')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card"> 
                <div class="card-header"> 
                    <img src="{{ URL::to('/') }}/{{ $song->artists->first()->image }}" class="artist-img">
                    <h1>{{$song->name}}</h1>
                    <small>Dodao: <b>{{$song->user->name}}</b></small><br>                   
                    <small>Napisan je: <b>{{$song->created_at->format('d/m/Y')}}</b></small><br> 
                </div> 
                <div class="card-body"> 
                    <p class="card-text">{!! $song->text !!}</p><hr>
                    <a href="/kontakt" class="btn btn-warning">Prijavi grešku</a>
                    <small>Poslednji put ažuriran: {{$song->updated_at->format('d/m/Y')}}</small>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection