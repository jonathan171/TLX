<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaCategorias extends Model
{
     protected $table = "categorias";
/**
     * The attributes that are mass assignable.
     
     * @var array
     */
public function user(){

	return $this->belongsTo(User::class);

}

	//$r=App\RegistroUsuario::first()
protected $fillable = ['categoria'];
}
