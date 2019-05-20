@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css">
		<div class="col-md-8 col-md-offset-2">
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
			<div class="panel panel-default">
				<div class="panel-heading"><h2>Publicar artículos</h2></div>
				<div class="panel-body">
					<div class="tp">
						<h5>Colombia</h5>
					</div>
					<hr>
					<div id="dropzone_">
						<form  class="dropzone_" id="frmTarget" action="{{route("publicaciones")}}" method="POST" enctype="multipart/form-data">
							{{csrf_field()}}
							<input type="hidden" name="nombre" value= {{Auth::user()->name}}>
							<input type="hidden" name="email" value= {{Auth::user()->email}}>
							<input type="hidden" name="user_id" value= {{Auth::user()->id}}>
							<div class="form-group" {{ $errors->has('categoria') ? ' has-error' : '' }}>
								<select class="form-control input-lg" name="categoria" required="true">

									<option value="{{ old('categoria')== null? '' : old('categoria')}}" >{{ old('categoria')== null? "Seleccione categoría" : old('categoria')}}</option>

									@foreach ($lista_categorias as $categorias)
									<option value="{{ $categorias->categoria}}">{{ $categorias->categoria}}</option>
									@endforeach
								</select>
							</div>
							<div class="s-img">
								<img src="images/icon/camera-icon.png" class="logo_imagenes" ><br><br>
								Seleccione las imagenes que desea subir <b>(Maximo 2 imagenes)</b><br />
								<span class="note needsclick">El tamaño maximo de las  imagenes es de 2MB <strong>Formatos permitidos</strong> .JPG .PNG .GIF</span>
							</div>
							<div class="form-group{{ $errors->has('archivo') ? ' has-error' : '' }}">
								<div class="input-group">
									
									<span class="input-group-addon">seleccione la imagen de su anuncio</span>
									<input type="file"  name="archivo[]" id="file_form" onchange="return fileValidation()" class="form-control" id="focusedinput" multiple="" value="{{old('archivo')}} " required="true" size="20" multiple maxImg="8">
									<!-- Image preview -->
									<div id="imagePreview"></div>
									<span class="input-group-addon">|</span>
								</div>
								@if ($errors->has('archivo[]'))
								<span class="help-block">
									<strong>{{ $errors->first('archivo[]') }}</strong>
								</span>
								@endif
								<div class="col-sm-4 hp">
									<h5 class="format-img">(.JPG, .PNG, .GIF,)</h5>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
							<!--dropzone
							<div class="dz-message needsclick">
								<img src="images/icon/camera-icon.png" class="logo_imagenes" ><br><br>
								<div class="fallback">
								<input name="file" type="file" multiple id="archivos" />
							</div>
								Seleccione las imagenes que desea subir<br />
								<span class="note needsclick">El tamaño maximo de las  imagenes es de 2MB <strong>Formatos permitidos</strong> .JPG .PNG .GIF</span>
							</div>
							<!--///dropzone-->


							<div class="form-group">
								<select class="form-control input-lg" name="estado" required="true" id="state">
									
									@foreach ($estadosArray as $index =>  $estado)
									<option value="{{$index}}" {{old('estado_id')== $index ? 'selected': ''}}>{{ $estado}}</option>
									@endforeach
								</select>
                              
								
							</div>
							<div class="form-group">
							<select class="form-control input-lg" name="ciudad" required="true" id="city">

									
								</select>
								</div>
							<br>
							<div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
								<label for="exampleInputEmail1">Título </label>

								<input type="text" class="form-control" id="titulo_form" name="titulo" value="{{ old('titulo') }}"aria-describedby="emailHelp" placeholder="ingrese titulo de su anuncio"  required="true" maxlength="60">
								<small id="emailHelp" class="form-text text-muted"><div id="caracteres" style="float: left; margin-top:3px;"></div>Un buen título requiere por lo menos 60 caracteres. </small>
								@if ($errors->has('titulo'))
								<span class="help-block">
									<strong>{{ $errors->first('titulo') }}</strong>
								</span>
								@endif
							</div>
							<div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
								<label for="exampleFormControlTextarea1">Descripción</label>
								<textarea class="form-control" id="descripcion_form" name="descripcion" rows="3" required="true" maxlength="200" >{{ old('descripcion') }}</textarea>
								<small id="emailHelp" class="form-text text-muted"><div id="caracteres_descripcion" style=" margin-top:3px;"></div></small>
								@if ($errors->has('descripcion'))
								<span class="help-block">
									<strong>{{ $errors->first('descripcion') }}</strong>
								</span>
								@endif
							</div>
							<div class="form-group {{ $errors->has('contacto') ? ' has-error' : '' }}">
								<label for="exampleInputEmail1">Numero de contácto</label>
								<input type="text" class="form-control" id="contacto_form" name="contacto" value="{{ old('contacto') }}" aria-describedby="emailHelp" placeholder="ingrese numero de contacto" required="true" onkeypress="return valida_texto_numerico(event)" maxlength="14">
								<small id="emailHelp" class="form-text text-muted"><div id="caracteres_contacto" style=" margin-top:3px;"></div></small>

								@if ($errors->has('contacto'))
								<span class="help-block">
									<strong>{{ $errors->first('contacto') }}</strong>
								</span>
								@endif
							</div>

							<div class="form-group {{ $errors->has('precio') ? ' has-error' : '' }}">
								<label for="exampleInputEmail1">Precio del artículo</label>
								<input type="text" class="form-control" id="precio_form" name="precio" value="{{ old('contacto') }}" aria-describedby="emailHelp" placeholder="ingrese precio del artículo" required="true" onkeypress="return valida_texto_numerico(event)" maxlength="14">
								<small id="emailHelp" class="form-text text-muted"><div id="caracteres_precio" style=" margin-top:3px;"></div></small>

								@if ($errors->has('precio'))
								<span class="help-block">
									<strong>{{ $errors->first('precio') }}</strong>
								</span>
								@endif
							</div>
							<div class="form-check">
								<input type="checkbox" class="form-check-input" id="exampleCheck1" name="confirmacion" checked="true">
								<label class="form-check-label" for="exampleCheck1" >Confirme su publicación</label>
								@if ($errors->has('confirmacion'))
								<span class="help-block">
									<strong>{{ $errors->first('confirmacion') }}</strong>
								</span>
								@endif
							</div>
							<br>
							<div class="entrar">
								<button type="submit" class="btn btn-primary btn-block btn-lg" onclick="return confirm('Esta SEGURO que desea PUBLICAR su ANUNCIO ?')" >
									PUBLICAR
								</button>
							</div>



						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('content.categorias')
@include('content.footer')

<script >
	
$(document).ready(function(){

 $('#state').on('change',function(){
  var estado_id=$(this).val();
  if($.trim(estado_id !='')){

  	$.get('ciudades',{estado_id: estado_id}, function(ciudades){
        
        $('#city').empty();
        $('#city').append("<option value= ''> Seleccione una ciudad </option>");
        
        $.each(ciudades, function(index,value){
        	$('#city').append("<option value= '"+index+"'> "+value+" </option>");
        });
  	});
  }

 });
});

</script>

<script >
	function fileValidation(){
		var fileInput = document.getElementById('file_form');
		var filePath = fileInput.value;
		var required_file = "";
		var allowedExtensions = /(.jpg|.jpeg|.png|.gif|.JPG|.JPEG|.PNG|.GIF)$/i;
		required_file = ".jpg, .png, .gif" ;
		if(!allowedExtensions.exec(filePath)){
			alert('Su anuncio solo puede contener los archivos requeridos : ' +required_file);
			fileInput.value = '';
			return false;
		}else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
        	var reader = new FileReader();
        	reader.onload = function(e) {
              //  document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
          };
          reader.readAsDataURL(fileInput.files[0]);
      }
  }
}

</script>




<script>
	function valida_texto_numerico(e){
		tecla = (document.all) ? e.keyCode : e.which;
    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
    	return true;
    }
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>

<script>

	$("#precio_form")
	.keyup(function() {
		var resultado_precio = $( this ).val();
		var total_precio = resultado_precio.length;
		if(total_precio == "60"){
			$( "#caracteres_precio" ).text("(Maximo  "+total_precio+" carácteres ), ");
			return;
		}
		$( "#caracteres_precio" ).text( "("+total_precio+" Caracteres), " );
	})
	.keyup();



	$("#titulo_form")
	.keyup(function() {
		var resultado = $( this ).val();
		var total = resultado.length;
		if(total == "60"){
			$( "#caracteres" ).text("(Maximo  "+total+" carácteres ), ");
			return;
		}
		$( "#caracteres" ).text( "("+total+" Caracteres), " );
	})
	.keyup();

	$("#descripcion_form")
	.keyup(function() {
		var resultado_descripcion = $( this ).val();
		var total_descripcion = resultado_descripcion.length;
		if(total_descripcion == "200"){
			$( "#caracteres_descripcion" ).text("(Maximo  "+total_descripcion+" carácteres ), ");
			return;
		}
		$( "#caracteres_descripcion" ).text( "("+total_descripcion+" Caracteres), " );
	})
	.keyup();

	$("#contacto_form")
	.keyup(function() {
		var resultado_contacto = $( this ).val();
		var total_contacto = resultado_contacto.length;
		if(total_contacto == "14"){
			$( "#caracteres_contacto" ).text("(Maximo  "+total_contacto+" números ), ");
			return;
		}
		$( "#caracteres_contacto" ).text( "("+total_contacto+" números), " );
	})
	.keyup();



</script>

<script type="text/javascript">
	//FLATA  IMPLEMENTAR
  /* Dropzone.options.frmTarget = {

        autoProcessQueue: false,
        paramName: 'file',
        clickable: true,
        maxFilesize: 5,
        uploadMultiple: true, 
        maxFiles: 5,
        addRemoveLinks: true,
        acceptedFiles: 'image/*',
        paramName: 'archivos',

        url: '{{route("publicaciones")}}',
        
        init: function () {

            var myDropzone = this;

        // Update selector to match your button
        $("#button").click(function (e) {
            e.preventDefault();
            myDropzone.processQueue();
        });

        this.on('sending', function(file, xhr, formData) {
            // Append all form inputs to the formData Dropzone will POST
            var data = $('#frmTarget').serializeArray();
            $.each(data, function(key, el) {
                formData.append(el.name, el.value);
            });
        });
        // con esta sentencia le decimos a dropzone que no se active automaticamente, solo cuando le demos clic
Dropzone.autoDiscover = false;
    }
}*/
</script>


@endsection