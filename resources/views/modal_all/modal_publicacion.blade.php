

<!-- Modal Habitaciones_disponibles -->
<div class="modal fade" id="publicacion{{ $public->id }}" role="dialog" data-backdrop="static" 
	data-keyboard="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="result-colombia">
					<h5> 
						<a href="{{ url('/') }}"><img src="images/icon/logo.png"  style="width: 10%; margin-right: 15px; "></a>inicio <b>&nbsp;&nbsp;>&nbsp;&nbsp;  </b> Resultados  para Colombia &nbsp;&nbsp;>&nbsp;&nbsp;<b>{{ $public->ciudad }}</b>&nbsp;&nbsp;>&nbsp;&nbsp;Categoría &nbsp;&nbsp;>&nbsp;&nbsp;<b> {{ $public->categoria }}<b>  </h5>
							<hr>
							<div class="public-precio">
								<h1>PRÉCIO : $ {{ $public->precio }}</h1>
							</div>
						</div>
					</div>
					<div class="modal-body">
						<h1 ><span  class="glyphicon glyphicon-gift" style="color: #585858; font-size: 140%; text-align: right;"></span>&nbsp;&nbsp;<b> {{ $public->titulo }} </b></h1>
						<hr>
						<div class="content-img-public">
							<?php
							$mydir = $public->url_carpeta;
							if(file_exists( $mydir))
							{
								?>
								<?php
								if ($handle = opendir($mydir)) {
									while (false !== ($file = readdir($handle))) {

										if ($file != '.' && $file != '..') {
											$ext = pathinfo( $file,PATHINFO_EXTENSION );
											if($ext == "jpg"||$ext == "jpeg"||$ext == "png"||$ext == "JPG"||$ext == "JPEG"||$ext == "PNG"||$ext == "gif"||$ext == "GIF"){
												?>
												<div class="sub_img_kml" >
													<a href='<?php echo $mydir."/".$file; ?>' rel="lightbox[galeria]" title="Colombia - {{ $public->ciudad }}"><img src='<?php echo $mydir."/".$file; ?>' /></a>
												</div>
												<?php
											}
										}
									}
									closedir($handle);
								}else{
									echo  "Carpeta Vacía<br><br>";
								}
							}
							?>
							<div class="clearfix"></div>
							<!--presentar fotografías-->
							
						</div>
						<hr>
						<h1> <b>Descripción</b></h1>
						<h4> {{ $public->descripcion }}</h4><br><br>
						<h1> <b>Contácto </b> </h1>
						<h4>
							<ul>
								<li>&nbsp;&nbsp;>&nbsp;&nbsp;<b>Nombre: </b>{{ $public->nombre }}</li>
								<li>&nbsp;&nbsp;>&nbsp;&nbsp;<b>Télefono : </b>{{ $public->contacto }}</li>
								<li>&nbsp;&nbsp;>&nbsp;&nbsp;<b>E-mail : </b>{{ $public->email }}</li>
								<li>&nbsp;&nbsp;>&nbsp;&nbsp;<b>Ciudad : </b>{{ $public->ciudad }}</li>
							</ul>
						</h4>
						<hr>
						<div class="mod-public">
							<h5> <span  class="glyphicon glyphicon-check" style="color:#D8D8D8"></span>&nbsp;&nbsp; {{$public->categoria}} - {{$public->ciudad}}<br><br>
								Fecha de publicación : {{$public->created_at}}
							</h5>
							<hr>
						</div>			
					</div>
				</div>
			</div>
		</div>
</div>

	
	



