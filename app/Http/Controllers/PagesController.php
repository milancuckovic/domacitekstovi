<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\Artist;


class PagesController extends Controller
{
    public function welcome(Request $pretraga)
    {
        $trazenpojam=$pretraga->input('pretraga');
        $song= Song::query()->where('text','LIKE',"%{$trazenpojam}%")->orWhere('name', 'LIKE',"%{$trazenpojam}%")->orderBy('created_at','desc')->take(15)->get();
        $trazeniautori=$pretraga->input('pretraga_autora');
        $artist = Artist::query()->where('name','LIKE',"%{$trazeniautori}%")->orderBy('name','asc')->take(10)->get();
        return view('pages.welcome')->with('songs',$song)->with('artists',$artist);
    }
    public function about()
    {
        return view('pages.about');
    }
    public function contact()
    {
        return view('pages.contact');
    }
}
