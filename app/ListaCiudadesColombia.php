<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaCiudadesColombia extends Model
{
    protected $table = "ciudades_colombia";
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

'codigo',
'ciudad','estado_id'
];

}
