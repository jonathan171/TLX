<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model
{
    protected $table = "publicaciones";
/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
public function user(){

	return $this->belongsTo(User::class);

}

	//$r=App\RegistroUsuario::first()
protected $fillable = [
'_token',
'user_id',
'nombre',
'email',
'categoria',
'ciudad',
'titulo',
'descripcion',
'contacto',
'precio',
'url_carpeta',
'imagen_principal',
'confirmacion',
];
}
