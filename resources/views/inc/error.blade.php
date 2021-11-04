@if(count($errors) > 0) 
    @foreach($errors->all() as $error) 
        <div class="alert alert-danger"> 
            {{$error}} 
        </div> 
    @endforeach 
@endif 
 
@if(session('uspesno')) 
    <div class="alert alert-success"> 
        {{session('uspesno')}} 
    </div> 
@endif
@if(session('neuspesno')) 
    <div class="alert alert-danger"> 
        {{session('neuspesno')}} 
    </div> 
@endif