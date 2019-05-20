@extends('layouts.app')
@section('content')
<div class="form-group">
                              {!! Form::select('depa',$lista_estados,['id'=>'depa'])!!}
                              {!! Form::select('town',['placeholder'=>'Selecciona'],null,['id'=>'town'])!!}

@endsection