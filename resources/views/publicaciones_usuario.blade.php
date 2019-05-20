
@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		@if (session('alert'))
		<div class="alert alert-success" >
			{{ session('alert') }}
		</div>
		@endif

		@if (session('alert_danger'))
		<div class="alert alert-danger" role="alert">
			{{ session('alert_danger') }}
		</div>
		@endif
		
		<div class="col-md-14">
			<div class="col-md-14 col-md-offset-0">
				<div class="panel panel-default">
					<div class="panel-heading" style="background-color:#5882FA;color: white; "><h2>Mis Anuncios</h2></div>
					<div class="panel-body">
						<div class="container">
							<div class="row">
								@if (count($listaPublicaciones)<1)
								<h1 >NO TIENE ANUNCIOS </h1>
								@else
								@foreach ($listaPublicaciones as $publicaciones)
								<div class="row">
									<div class="col-md-3">
										<div class="content-img">
											<img src='{{$publicaciones->url_carpeta.$publicaciones->imagen_principal}}' border="0" width="200px" height="200px;" align="center" >
										</div>
									</div>
									<div class="col-md-7">
										<div class="t-publicaciones">
											{{$publicaciones->titulo}}
										</div>
										<br>
										<h5> <span  class="glyphicon glyphicon-check"></span>&nbsp;&nbsp; {{$publicaciones->categoria}} - {{$publicaciones->ciudad}}<br><br>
											Fecha de publicación : {{$publicaciones->created_at}}
										</h5>
										<br><br>
										<div class="entrar">
											<button type="submit" class="btn btn-primary  btn-sm" >
												DESTACAR ANUANCIO
											</button>
											<button type="submit" class="btn btn-primary  btn-sm" >
												MARCAR COMO VENDIDO
											</button>
										</div>
									</div>
									<div class="col-md-2">
										<div class="pr_publicaciones" >
											<h4>Precio</h4> 
											<h2>
												$
												{{$publicaciones->precio}}
											</h2>
										</div>
										<br><br><br>
										<form   id="form" action="{{route("editar_finalizar_publicacion")}}" method="POST" >
											{{csrf_field()}}

											<input type="hidden" name="id"  value="{{ $publicaciones->id }}">
											<div class="sl-form-ed">
												<div class="form-group" {{ $errors->has('op_anuncios') ? ' has-error' : '' }} >
													<select class="form-control input-lg" name="op_anuncios" required="true" onchange = "validar_finalizar_anuncio(this);"  >
														<option value="{{ old('op_anuncios')== null? '' : old('op_anuncios')}}" >{{ old('op_anuncios')== null? "*" : old('op_anuncios')}}</option>
													<!--	<option value="editar">Editar</option>-->
														<option value="finalizar">Finalizar</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<hr>
								</form>
								@endforeach
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@include('content.categorias')
@include('content.footer')
@endsection

<script>
	function validar_finalizar_anuncio(this_){
		if (confirm('Esta seguro que desea eliminar la publicación ? ')) {
			this_.form.submit();
		} 
		



	}

</script>