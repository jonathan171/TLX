<?php
use App\Http\Requests;
use Illuminate\Http\Request;
use App\ListaCategorias;
use App\ListaCiudadesColombia;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	$ListaCategorias= ListaCategorias::all();
   $ListaCiudadesColombia=ListaCiudadesColombia::all();
           
       return view('welcome',compact('ListaCategorias','ListaCiudadesColombia'));
});


Route::auth();

	
Route::get('/home', ['as' => 'form', 'uses' => 'HomeController@index']);

Route::get('/publicaciones_usuario', 'HomeController@publicaciones_usuario');
Route::get('/ayuda', 'HomeController@ayuda');


/*lista de  ciudades  y  categorias*/
Route::get('/publicar', 'PublicacionController@List_form_publicar');
/*------------------------------------------------*/

/*lista de publicaciones del usuario*/
Route::get('/publicaciones_usuario', 'PublicacionController@List_publicaciones_usuario');
/*------------------------------------------------*/



/*guarda registro de publicación */
Route::post('registro_pubicacion', 'PublicacionController@registro_pubicacion')->name('publicaciones');
/*------------------------------------------------*/


/*guarda registro de publicación */
Route::post('editar_finalizar_publicacion', 'PublicacionController@editar_finalizar_publicacion')
->name('editar_finalizar_publicacion');
/*------------------------------------------------*/

Route::get('/ciudades','PublicacionController@getCiudad')->name('ciudades');






