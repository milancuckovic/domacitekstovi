<div class="container">
    <div class="navbar navbar-expand-md">
        <div class="container">
        @guest
        <ul class="navbar-nav md-auto">
            <li class="nav-item">
                <a class="btn btn-primary m-2" href="{{ URL::previous() }}">Vrati se nazad!</a> 
            </li>
        </ul>
        @else
        <ul class="navbar-nav md-auto">
            <li class="nav-item">
                <a class="btn btn-primary m-2" href="{{ URL::previous() }}">Vrati se nazad!</a> 
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="btn btn-success m-2" href="{{ url('dodajtekst') }}" title="Dodaj novi tekst">Dodaj tekst!</a> 
            </li>
            @if(Auth::user()->role == 'admin')
            <li class="nav-item">
                {!!Form::open(['action'=>['SongsController@edit',$song->id], 'method'=>'POST'])!!} 
                {{Form::submit('Izmeni', ['class' => 'btn btn-warning mt-2 ml-2'])}} 
                {!!Form::close()!!} 
            </li>
            <li class="nav-item">
                {!!Form::open(['action'=>['SongsController@destroy',$song->id], 'method'=>'POST'])!!} 
                {{Form::submit('Obriši', ['class' => 'btn btn-danger mt-2 ml-2'])}} 
                {!!Form::close()!!} 
            </li>
            @endif
        </ul>
        @endguest
        </div>
    </div>
</div>