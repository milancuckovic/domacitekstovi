@extends('layouts.app')
@include('inc.error')
@section('content')
<div class="container">
    {!! Form::open(['action'=>'PagesController@welcome','method'=>'GET'])  !!}
        <div class="input-group">
            {{ Form::text('pretraga','',['class'=>'form-control','placeholder'=>'Pretraži pesme...'])}}
            <div class="input-group-append">
                <button class="input-group-text" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    {!!Form::close()!!}
</div>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if(count($songs)>0) 
                        @foreach($songs as $song)                         
                            <div class="song-list" onclick="location.href='tekstpesme/{{$song->id}}'"> 
                                <img src="{{ URL::to('/') }}/{{ $song->artists->first()->image }}" class="artist-img">
                                <h1 class="song-name">{{$song->name}}</h1>
                                <small class="song-user">Dodao: {{$song->user->name}}</small>   
                            </div> 
                        </br>                      
                        @endforeach 
                        
                    @else 
                        <p> 
                        Trenutno nemamo traženi tekst pesme. Ali proverite uskoro! 
                        </p> 
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Autori:
                    {!! Form::open(['action'=>'PagesController@welcome','method'=>'GET'])  !!}
                    <div class="input-group">
                    {{ Form::text('pretraga_autora','',['class'=>'form-control','placeholder'=>'Pretraži autore...'])}}
                        <div class="input-group-append">
                            <button class="input-group-text" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    {!!Form::close()!!}
                </div>
                <div class="card-body">
                @if(count($artists)>0) 
                    <ul>     
                        @foreach($artists as $artist)                         
                            <li>
                                <a href="/autor/{{ $artist->id }}">{{ $artist->name }}</a>                              
                            </li>                      
                        @endforeach 
                    </ul>
                    @else 
                        <p> 
                        Trenutno nemamo traženog izvođača. Ali proverite uskoro! 
                        </p> 
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
