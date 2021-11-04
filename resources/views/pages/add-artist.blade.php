@extends('layouts.app')
@include('inc.error')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                {!! Form::open(['action'=>'ArtistsController@store','method'=>'POST','files' => true]) !!}
                        @csrf
                        <div class="form-group">
                            {{Form::label('name', 'Ime autora')}} 
                            {{Form::text('name', ' ', ['class' =>'form-control', 'placeholder' => 'Ime autora...'])}} 
                        </div>
                        <div class="form-group">
                            {{Form::file('image')}}
                            
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