@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <h1>{{$artist->name}}</h1> 
                {!! Form::open(['action'=>['ArtistsController@update',$artist->id],'method'=>'POST','files' => true]) !!}
                        @csrf
                        
                        <div class="form-group">
                            <div class="d-block">
                            <p>Trenutna fotografija:</p>
                            <img src="{{ URL::to('/')}}/{{ $artist->image}}" class="artist-img">
                            </div>
                            <div class="d-block">
                            <p>Dodaj novu:</p>
                            {{Form::file('image')}}
                            </div>
                            
                            <br>
                            
                        </div>
                        <div class="form-group">
                        {{Form::submit('Pošalji', ['class'=>'btn btn-primary'])}} 
                        </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection