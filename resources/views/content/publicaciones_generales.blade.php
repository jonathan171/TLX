<?php
$listaPublicacionesG = \DB::table('publicaciones')->orderBy('id', 'DESC')->get();
?>

<br><div class="container"><div class="social">
                         <ul>
                               
                              <li > <a href="http://www.facebook.com" target="_blank" class="icon-facebook"></a></li>
                              <li><a href="http://twitter.com" target="_blank" class="icon-twitter"></a></li> 	
                               <li><a href="http://www.instagram.com" target="_blank" class="icon-instagram"></a></li>   	
                             <li><a href="http://www.youtube.com" target="_blank" class="icon-youtube"></a></li>   	
                         </ul>
                      
                       </div></div>
<br><br>
<div class="container">
	<div class="row">
		<div class="col-md-14">
			<div class="col-md-14 col-md-offset-0">

				<div class="panel panel-default">

					<div class="panel-heading" style="background-color:#5882FA;color: white; "><h2>Anuncios</h2></div>
					<div class="panel-body">
						
						<?php
						$cant  =  0 ;  
						$cant_ciudades  =  0 ;
						$array_destino=array();  
						foreach ($listaPublicacionesG as $LPG){
							$cant++;
						}
						
						?>
						<table class="table table-sm">
                          <thead>
                            <tr>
                               <th scope="col"><div class="result-colombia">
						            	<h5>inicio <b>&nbsp;&nbsp; >&nbsp;&nbsp; 
	                                   </b><b>Todos</b>  <b> &nbsp;&nbsp; >&nbsp;&nbsp;  </b> {{ $cant }} Resultados  para  Colombia</h5>  </div></th>
                                  <th scope="col" width="40%">

                                  	<div class="form-group">
                      <h2>Select</h2>
                       <select class="form-control">
                    @foreach($ListaCategorias as $category)
                   <option>{{$category->categoria}}</option>
                @endforeach
            </select>
        </div>
                                </th>
                                 
                         </thead>
                      </table>							                        
         			</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-16 col-md-offset-0">
			<div class="panel-body" ><h3>Busqueda Avanzada</h3></div>
			<div class="panel-default">
				<div class="col-md-4" >
					<div class="tp" >
						
						<div class="form-group">
                      
                       <select class="form-control"  >

                    @foreach($ListaCiudadesColombia as $category)
                   <option>{{$category->ciudad}}</option>
                @endforeach
            </select>
        </div>
						<div class="form-group">
                      
                       <select class="form-control">
                    @foreach($ListaCategorias as $category)
                   <option>{{$category->categoria}}</option>
                @endforeach
            </select>
        </div>
               <div class="form-group">
               	<input type="text" class="form-control" name="Buscar">
               </div>
               <div class="entrar">
                                <button type="submit" class="btn btn-primary" >
                                    <i class="fa fa-btn fa-sign-in"></i> Buscar
                                </button>
                             </div>
						
					</div>
					<h3 style="text-align: left!important;">Colombia&nbsp;&nbsp;-&nbsp;&nbsp;ciudades </h3><hr>
					<div class="result-colombia">
						@foreach ($listaPublicacionesG as $ciudad)
						<?php
						if (!in_array($ciudad->ciudad,$array_destino)){ 
							$array_destino[]=$ciudad->ciudad; 
						}
						?>
						@endforeach
						@foreach ($array_destino as $c)
						<b>&nbsp;&nbsp;>&nbsp;&nbsp;  </b>{{ $c }} <hr>
						@endforeach		
					</div>
				</div>
				<div class="col-md-8" >
					<div class="panel panel-default">	
						<div class="panel-body">
							@if (count($listaPublicacionesG)<1)
							<h1 >NO TIENE ANUNCIOS </h1>
							@else
							@foreach ($listaPublicacionesG as $public)
							<div class="row">
								<div class="col-md-3">
									<div class="content-img-G">
										<a data-toggle="modal" data-target="#publicacion{{ $public->id }}"><img src='{{$public->url_carpeta.$public->imagen_principal}}' border="0" align="center" ></a>
									</div>
									<br>		
								</div>
								<div class="col-md-7 "  >
									<div class="t-publicaciones_G">
										<h4>{{$public->titulo}}</h4>
									</div>
									<br>
									<h5> <span  class="glyphicon glyphicon-check"></span>&nbsp;&nbsp; {{$public->categoria}} - {{$public->ciudad}}<br><br>
										Fecha de publicación : {{$public->created_at}}
									</h5>	
									<div class="entrar_public">
										<button type="submit" class="btn btn-primary  btn-xs" data-toggle="modal" data-target="#publicacion{{ $public->id }}">
											<span  class="glyphicon glyphicon-ok-sign" style="color: white;font-size: 100%;"></span>&nbsp;&nbsp;<b>VER PUBLICACIÓN
											</button>
											@include('modal_all.modal_publicacion')
										</div>
										<div class="col-md-2 "  style="padding: 1em 1em 1em 0em;">
											<h4><b>$ {{$public->precio}}</b></h4>
										</div>
									</div>
									<hr>
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


















