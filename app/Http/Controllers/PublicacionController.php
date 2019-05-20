<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\app;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\flash;
use App\ListaCiudadesColombia;
use App\ListaCategorias;
use App\Publicaciones;
use App\estadosColombia;

use Session;
use Redirect;
use DateTime;



class PublicacionController extends Controller
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
    /*registrando usuarios clientes*/

    public function editar_finalizar_publicacion(Request $request){
     // dd($request->all());

      $id = $request->input('id');

      switch ($request->input('op_anuncios')) {
        case 'editar':
          # code...
        break;
        case 'finalizar':
        Publicaciones::destroy($id);
        break;
        default:
           return Redirect::back()->with('alert_danger', 'ERROR, su anuncio no se puede eliminar');
        break;
        
      }
      return Redirect::back()->with('alert', 'Usted ELIMINÓ anuncio con éxito !!!');


      switch (variable) {
        case 'value':
          # code...
          break;
        
        default:
          # code...
          break;
      }
    }

    public function List_publicaciones_usuario(){
      $listaPublicaciones = Publicaciones::where('user_id', '=',Auth::user()->id )->orderBy('id', 'DESC')->get();
      return view('publicaciones_usuario',compact('listaPublicaciones'));
    }

    public function List_form_publicar(){
      $estados=estadosColombia::all();
  $estadosArray['']='Selecciona un Estado';
  foreach ($estados as  $estado) {
    $estadosArray[$estado->id]=$estado->name;
    # code...
  }
    	$lista_ciudades = ListaCiudadesColombia::all();
    	$lista_categorias = ListaCategorias::all();
      $lista_estados=estadosColombia::all();



    	return view('publicar',compact('lista_ciudades','lista_categorias','estadosArray'));
    }


    public function registro_pubicacion(Request  $request){
        //variable
      $Fecha = new \DateTime();
      $nombre_carp = $Fecha->format('YmdHis');
      $cantidad_imagenes = 0;
      $this->validate($request,[
        '_token'=>'required',
        'nombre'=>'required|max:60',
        'email' => 'required|email',
        'categoria'=>'required|max:100',
        'ciudad'=>'required|max:100',
        'titulo'=>'required|max:60',
        'descripcion'=>'required|max:200',
        'contacto'=>'numeric|required|digits_between:0,14',
        'precio'=>'numeric|required|digits_between:0,14',
        'confirmacion'=>'required',
        'user_id'=>'required',
          //'archivo' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
      ]);
      $files = $request->file('archivo');
        //validamos que sean solo dos imagenes
      foreach($files as $file) {
        $cantidad_imagenes++;
        if($cantidad_imagenes>2){
          return Redirect::back()->withInput()->with('alert_danger', 'Solo se pueden subir dos(2) imagenes !!!');
        }
      }
        // ruta de las imagenes guardadas
      $ruta =  'img/'.$nombre_carp.$this->random_string()."-".Auth::user()->id."/";
     // $ruta =  $_SERVER['DOCUMENT_ROOT'].'/img/'.$nombre_carp.$this->random_string()."-".Auth::user()->id."/";
      if (!file_exists($ruta)) {
        if(!mkdir($ruta, 0777, true)) {
         return redirect()->to('publicar')->with('alert_danger', 'FALLÓ  la creación de su anuncio!!!');
       }
     } 
        //dd($request->all());
     $cantidad_imagenes =0;
    // recorremos cada archivo y lo subimos individualmente
     foreach($files as $file_) {
      $cantidad_imagenes++;
      $extension = $file_->getClientOriginalExtension();
    // return 'extensión :'.$extension;
      $filename =  $this->random_string().'.'.$file_->getClientOriginalExtension();
      $upload_success = $file_->move($ruta, $filename);
      if($cantidad_imagenes == 1){
        $registro  = new Publicaciones;
        $registro->_token  = $request->input('_token');
        $registro->nombre  = $request->input('nombre');
        $registro->email  = $request->input('email');
        $registro->categoria  = $request->input('categoria');
        $registro->ciudad  = $request->input('ciudad');
        $registro->titulo  = $request->input('titulo');
        $registro->descripcion  = $request->input('descripcion');
        $registro->contacto  = $request->input('contacto');
        $registro->precio  = $request->input('precio');
        $registro->imagen_principal  = $filename;
        $registro->url_carpeta  = $ruta;
        $registro->confirmacion  = $request->input('confirmacion');
        $registro->user_id  = $request->input('user_id');
        $registro->save();
      }
    }
        // Demas codigo para crear producto
    return redirect()->to('publicar')->with('alert', 'Su ANUNCIO fue creado con éxito!!!');
 // dd($request->all());
  }
  function random_string()
  {
   $key = '';
   $keys = array_merge( range('a','z'), range(0,9) );

   for($i=0; $i<10; $i++)
   {
    $key .= $keys[array_rand($keys)];
  }

  return $key;

}
public function getEstado(){

  
  return $estadosArray;
}
public function getCiudad(Request $request){

      if($request->ajax()){

     $lista_ciudades=ListaCiudadesColombia::where('estado_id',$request->estado_id)->get();
     foreach ($lista_ciudades as $ciudad) {
      $ciudadesArray[$ciudad->id]= $ciudad->ciudad;
     }
    return response()->json($ciudadesArray);
  }
}

}
