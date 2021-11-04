@extends('layouts.app')
@include('inc.error')
@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-3">
        <p class="naslov-admin">Korisnici</p>
            <div class="admin-polje"> 
                @if(count($users)>0) 
                    @foreach($users as $user)       
                    <div class="admin-podatak">
                        <p class="lead">{{$user->name}}</p>
                    </div>                       
          
                    @endforeach 
                @else 
                        <p> 
                        Trenutno nema korisnika! 
                        </p> 
                @endif
            </div>
        </div>
        <div class="col-md-3">
        <p class="naslov-admin">Izvođači</p>
            <div class="admin-polje">              
                @if(count($artists)>0)  
                    @foreach($artists as $artist)       
                        <div class="admin-podatak" onclick="location.href='autor/{{$artist->id}}'">
                            <div class="d-inline-block">
                                <p class="lead">{{$artist->name}}</p>   
                            </div>
                            <div class="d-inline-block float-right">
                                {!!Form::open(['action'=>['ArtistsController@edit',$artist->id], 'method'=>'POST'])!!} 
                                {{Form::submit('&#10000;', ['class' => 'd-inline mr-1 btn btn-warning', 'title' => 'Izmeni'])}} 
                                {!!Form::close()!!}
                            </div>
                            <div class="d-inline-block float-right">
                                {!!Form::open(['action'=>['ArtistsController@destroy',$artist->id], 'method'=>'POST'])!!} 
                                {{Form::submit('&#128465;', ['class' => 'd-inline mr-1 btn btn-danger','title' => 'Izbriši'])}} 
                                {!!Form::close()!!}
                            </div>
                        </div>                                
                    @endforeach 
                @else 
                        <p> 
                        Trenutno nema izvođača! 
                        </p> 
                @endif
            </div>
        </div>
        <div class="col-md-3">
        <p class="naslov-admin">Pesme</p>
            <div class="admin-polje">  
                @if(count($songs)>0)         
                    @foreach($songs as $song)                         
                    <div class="admin-podatak" onclick="location.href='tekstpesme/{{$song->id}}'">
                            <div class="d-inline-block">
                                <p>{{$song->name}}</p>   
                            </div>
                            <div class="d-inline-block float-right">
                                {!!Form::open(['action'=>['SongsController@edit',$song->id], 'method'=>'POST'])!!} 
                                {{Form::submit('&#10000;', ['class' => 'd-inline mr-1 btn btn-warning', 'title' => 'Izmeni'])}} 
                                {!!Form::close()!!}
                            </div>
                            <div class="d-inline-block float-right">
                                {!!Form::open(['action'=>['SongsController@destroy',$song->id], 'method'=>'POST'])!!} 
                                {{Form::submit('&#128465;', ['class' => 'd-inline mr-1 btn btn-danger','title' => 'Izbriši'])}} 
                                {!!Form::close()!!}
                            </div>
                        </div>                    
                    @endforeach       
                @else 
                        <p> 
                        Trenutno nemamo traženi tekst pesme. Ali proverite uskoro! 
                        </p> 
                @endif
            </div>
        </div>
        <div class="col-md-3">
        <p class="naslov-admin">Poruke</p>
            <div class="admin-polje">
                @if(count($contacts)>0) 
                    @foreach($contacts as $contact)                         
                        <div class="poruka">
                            <p class="naslov-poruke">{{$contact->email}} - {{$contact-> naslovporuke}}</p> 
                            <p class="sadrzaj-poruke">{{$contact-> poruka}}</p> 
                            <p class="datum-poruke">{{$contact-> created_at}}</p>
                        </div>                    
                    @endforeach   
                @else 
                        <p> 
                        Trenutno nema poruka! 
                        </p> 
                @endif
            </div>
        </div>
    </div>
</div>
@endsection