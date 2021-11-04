<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;   
use Illuminate\Support\Str;
use App\Song;
use App\Artist;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::all(); 
        return view('pages.welcome')->with('songs', $songs); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            
            $artist = Artist::all();
            return view('pages.add')->with('artists',$artist);
        }
        else{
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 
            'name' => 'required', 
            'text' => 'required',
            'artists' => 'required'
            ]);  
            $song = new Song;  
            $song->user_id= $request->user()->id;
            $artistInput=$request->input('artists');
            if(Str::contains($artistInput, ',')){
                $artists=explode(",",$request->input('artists'));
                $artistsName=[];
                for($i=0;$i<count($artists);$i++)
                {
                    $artistsFind=Artist::find($artists);
                    $artistsName[$i]=$artistsFind[$i]->name;
                }
                $song->name = implode(", ",$artistsName) . ' - ' . $request->input('name');
            }
            else{
                $artists=$artistInput;
                $artistsFind[0]=Artist::find($artists);
                $artistsName[0]=$artistsFind[0]->name;
                $song->name = $artistsName[0] . ' - ' . $request->input('name');
            }
            $findSong=Song::query()->where('name','LIKE',"%{$song->name}%")->get();
            if(count($findSong)>0)
            {
                return redirect('/')->with('neuspesno', "Tekst pesme je već dodat! Hvala");
            }
            $song->text = str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n"),'</br>',$request->input('text')); 
            $song->save(); 
            $song->artists()->attach($artists);
            return redirect('/')->withSong($song)->with('uspesno', 'Tekst pesme je dodat! Hvala!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $song=Song::find($id);
        
        return view('pages.song')->withSong($song);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check())
        {
            $song = Song::find($id);
            if(Auth::user()->role=="admin"){
                $song->text=str_replace('</br>',"\r\n",$song->text); 
                return view('pages.edit')->withSong($song);
            }
            else{
                echo "Nemate pristup";
            }
        }
        else{
            return redirect('/login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::check())
        {
            $this->validate($request,[ 
                'text' => 'required' 
                ]);
            $song = Song::find($id);
            $song->text = str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n"),'</br>',$request->input('text')); 
            $song->save(); 
            return redirect('/home')->with('uspesno', 'Tekst pesme je uspešno izmenjen! Hvala!');  
        }
        else
            return redirect('/login')->with('neuspesno', 'Nemate pravo pristupa!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check())
        {
            if(Auth::user()->role=="admin"){
            $song = Song::find($id); 
            $song->delete(); 
            return redirect('/home')->with('uspesno', 'Tekst pesme je izbrisan!');
            }
            else{
                echo "Nemate pristup";
            }
        }
        else
            return redirect('/login')->with('neuspesno', 'Nemate pravo pristupa!');
    }
}
