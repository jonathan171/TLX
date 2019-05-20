<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\ListaCategorias;
use App\ListaCiudadesColombia;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $ListaCategorias= ListaCategorias::all();
        $ListaCiudadesColombia=ListaCiudadesColombia::all();
           
       return view('home',compact('ListaCategorias','ListaCiudadesColombia'));
    }
    public function publicar()
    {
        return view('publicar');
    }
     public function publicaciones_usuario()
    {
        return view('publicaciones_usuario');
    }
     public function publicaciones_generales()
    {
        return view('publicaciones_generales');
    }
    public function ayuda()
    {
        return view('ayuda');
    }
}
