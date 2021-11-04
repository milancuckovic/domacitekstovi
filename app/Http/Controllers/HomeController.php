<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Song;
use App\Artist;
use App\Contact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $pretraga)
    {
        if(Auth::User()->role == 'admin'){
            $songs=Song::orderBy('created_at','desc')->get();
            $users=User::orderBy('created_at','desc')->get();
            $contacts=Contact::orderBy('created_at','desc')->get();
            $artists=Artist::orderBy('created_at','desc')->get();
            return view('pages.admin-home')->withArtists($artists)->withUsers($users)->withSongs($songs)->withContacts($contacts)->with('uspesno','Dobrodošao nazad!');
        }
        else{
            $trazenpojam=$pretraga->input('pretraga');
            $song= Song::query()->where('text','LIKE',"%{$trazenpojam}%")->orWhere('name', 'LIKE',"%{$trazenpojam}%")->orderBy('created_at','desc')->take(10)->get();
            $trazeniautori=$pretraga->input('pretraga_autora');
            $artist = Artist::query()->where('name','LIKE',"%{$trazeniautori}%")->orderBy('name','asc')->take(10)->get();
            return view('pages.home')->with('songs',$song)->with('artists',$artist)->with('uspesno','Dobrodošao nazad!');
        }
    }
}
