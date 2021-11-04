@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> 
            @include('inc.artists-options')
                <div class="card-header"> 
                    <img src="{{ URL::to('/') }}/{{ $artist->image }}" class="artist-img">
                    <h1>{{$artist->name}}</h1>
                    {!! Form::open(['action'=>['ArtistsController@show',$artist->id], 'method'=>'GET'])  !!}
                    <div class="input-group">
                    {{ Form::text('pretraga_pesama','',['class'=>'form-control mt-2','placeholder'=>'Pretraži pesme...'])}}
                        <div class="input-group-append">
                            <button class="mt-2 input-group-text" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    {!!Form::close()!!}
                </div> 
                
                <div class="card-body"> 
                @if(count($songs)>0) 
                    <ol>
                    @foreach($songs as $song)    
                    <li class="song-list1 p-2 m-0" onclick="location.href='../tekstpesme/{{$song->id}}'"> 
                                <p class="song-name">{{$song->name}}</p> 
                                <small >Dodao: <b>{{$song->user->name}}</b></small>   
                    </li>
                            </br>             
                    @endforeach    
                @else 
                    <p> 
                        Nema još dodatih tekstova ovog izvođača. Ali proverite uskoro! 
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