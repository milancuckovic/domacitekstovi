<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;   
use Illuminate\Support\Facades\Storage;
use App\Artist;
use App\Song;


class ArtistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::all(); 
        
        return view('pages.welcome')->with('artists', $artists); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check())
        {
            if(Auth::User()->role == 'admin'){
            return view('pages.add-artist');
            }
            else{
                return redirect('/home');
            }
        }
        else
            return redirect('/login');
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
            'name' => 'required|unique:artists', 
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);  
            $artist = new Artist; 
            $artist->name = $request->input('name'); 
            if ($request->has('image')) {
                $image = $request->file('image');
                $folder = 'image\autori';
                $name = $request->input('name') . '.' . $image->getClientOriginalExtension();
                $image->move($folder, $name);                
            }
            $artist->image = $folder . "\\" . $name;
      
            $artist->save(); 
            return redirect('/home')->withArtist($artist)->with('uspesno', 'Autor pesme je dodat! Hvala!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $pretraga)
    {
        $pretragaPesama=$pretraga->input('pretraga_pesama');
        $artist=Artist::find($id);
        $artists=Artist::all();
        $songs= Song::query()->where('name','LIKE',"%{$artist->name}%")->where('name','LIKE',"%{$pretragaPesama}%")->orderBy('name','desc')->take(10)->get();
        return view('pages.artist')->withArtist($artist)->withArtists($artists)->withSongs($songs);
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
            if(Auth::User()->role == 'admin'){
            $artist = Artist::find($id);
            return view('pages.edit-artist')->withArtist($artist); 
            }
            else{
                return redirect('/home');
            }
        }
        else
            return redirect('/login');
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
            if(Auth::User()->role == 'admin'){
            $this->validate($request,[ 
                'image' => 'required' 
                ]);
                $artist = Artist::find($id); 
                if ($request->has('image')) {
                    $image = $request->file('image');
                    $folder = 'image\autori';
                    $name = $request->input('name') . '.' . $image->getClientOriginalExtension();
                    $image->move($folder, $name);                
                }
                $artist->image = $folder . "\\" . $name;
                $artist->save();  
            return redirect('/home')->with('uspesno', 'Autor pesme je uspešno izmenjen! Hvala!');  
            }
            else{
                return redirect('/home');
            }
        }
        else
            return redirect('/login');
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
            if(Auth::User()->role == 'admin'){
            $artist = Artist::find($id); 
            $songs = Song::query()->where('name','LIKE',"%{$artist->name}%")->get();
            
            foreach($songs as $song)
            {
                $song->delete();
            }
            $artist->delete(); 
           
            return redirect('/home')->with('uspesno', 'Autor je izbrisan!');
            }
            else{
                return redirect('/home');
            }
        }
        else
            return redirect('/login');
    }
}
