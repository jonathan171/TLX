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
	                                   </b><b>Todos</b>  <b> &nbsp;&nbsp; >&nbsp;&nbsp;  </b> <?php echo e($cant); ?> Resultados  para  Colombia</h5>  </div></th>
                                  <th scope="col" width="40%">

                                  	<div class="form-group">
                      <h2>Select</h2>
                       <select class="form-control">
                    <?php foreach($ListaCategorias as $category): ?>
                   <option><?php echo e($category->categoria); ?></option>
                <?php endforeach; ?>
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

                    <?php foreach($ListaCiudadesColombia as $category): ?>
                   <option><?php echo e($category->ciudad); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
						<div class="form-group">
                      
                       <select class="form-control">
                    <?php foreach($ListaCategorias as $category): ?>
                   <option><?php echo e($category->categoria); ?></option>
                <?php endforeach; ?>
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
						<?php foreach($listaPublicacionesG as $ciudad): ?>
						<?php
						if (!in_array($ciudad->ciudad,$array_destino)){ 
							$array_destino[]=$ciudad->ciudad; 
						}
						?>
						<?php endforeach; ?>
						<?php foreach($array_destino as $c): ?>
						<b>&nbsp;&nbsp;>&nbsp;&nbsp;  </b><?php echo e($c); ?> <hr>
						<?php endforeach; ?>		
					</div>
				</div>
				<div class="col-md-8" >
					<div class="panel panel-default">	
						<div class="panel-body">
							<?php if(count($listaPublicacionesG)<1): ?>
							<h1 >NO TIENE ANUNCIOS </h1>
							<?php else: ?>
							<?php foreach($listaPublicacionesG as $public): ?>
							<div class="row">
								<div class="col-md-3">
									<div class="content-img-G">
										<a data-toggle="modal" data-target="#publicacion<?php echo e($public->id); ?>"><img src='<?php echo e($public->url_carpeta.$public->imagen_principal); ?>' border="0" align="center" ></a>
									</div>
									<br>		
								</div>
								<div class="col-md-7 "  >
									<div class="t-publicaciones_G">
										<h4><?php echo e($public->titulo); ?></h4>
									</div>
									<br>
									<h5> <span  class="glyphicon glyphicon-check"></span>&nbsp;&nbsp; <?php echo e($public->categoria); ?> - <?php echo e($public->ciudad); ?><br><br>
										Fecha de publicación : <?php echo e($public->created_at); ?>

									</h5>	
									<div class="entrar_public">
										<button type="submit" class="btn btn-primary  btn-xs" data-toggle="modal" data-target="#publicacion<?php echo e($public->id); ?>">
											<span  class="glyphicon glyphicon-ok-sign" style="color: white;font-size: 100%;"></span>&nbsp;&nbsp;<b>VER PUBLICACIÓN
											</button>
											<?php echo $__env->make('modal_all.modal_publicacion', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
										</div>
										<div class="col-md-2 "  style="padding: 1em 1em 1em 0em;">
											<h4><b>$ <?php echo e($public->precio); ?></b></h4>
										</div>
									</div>
									<hr>
									<?php endforeach; ?>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>


















