<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<?php if(session('alert')): ?>
		<div class="alert alert-success" >
			<?php echo e(session('alert')); ?>

		</div>
		<?php endif; ?>

		<?php if(session('alert_danger')): ?>
		<div class="alert alert-danger" role="alert">
			<?php echo e(session('alert_danger')); ?>

		</div>
		<?php endif; ?>
		
		<div class="col-md-14">
			<div class="col-md-14 col-md-offset-0">
				<div class="panel panel-default">
					<div class="panel-heading" style="background-color:#5882FA;color: white; "><h2>Mis Anuncios</h2></div>
					<div class="panel-body">
						<div class="container">
							<div class="row">
								<?php if(count($listaPublicaciones)<1): ?>
								<h1 >NO TIENE ANUNCIOS </h1>
								<?php else: ?>
								<?php foreach($listaPublicaciones as $publicaciones): ?>
								<div class="row">
									<div class="col-md-3">
										<div class="content-img">
											<img src='<?php echo e($publicaciones->url_carpeta.$publicaciones->imagen_principal); ?>' border="0" width="200px" height="200px;" align="center" >
										</div>
									</div>
									<div class="col-md-7">
										<div class="t-publicaciones">
											<?php echo e($publicaciones->titulo); ?>

										</div>
										<br>
										<h5> <span  class="glyphicon glyphicon-check"></span>&nbsp;&nbsp; <?php echo e($publicaciones->categoria); ?> - <?php echo e($publicaciones->ciudad); ?><br><br>
											Fecha de publicación : <?php echo e($publicaciones->created_at); ?>

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
												<?php echo e($publicaciones->precio); ?>

											</h2>
										</div>
										<br><br><br>
										<form   id="form" action="<?php echo e(route("editar_finalizar_publicacion")); ?>" method="POST" >
											<?php echo e(csrf_field()); ?>


											<input type="hidden" name="id"  value="<?php echo e($publicaciones->id); ?>">
											<div class="sl-form-ed">
												<div class="form-group" <?php echo e($errors->has('op_anuncios') ? ' has-error' : ''); ?> >
													<select class="form-control input-lg" name="op_anuncios" required="true" onchange = "validar_finalizar_anuncio(this);"  >
														<option value="<?php echo e(old('op_anuncios')== null? '' : old('op_anuncios')); ?>" ><?php echo e(old('op_anuncios')== null? "*" : old('op_anuncios')); ?></option>
													<!--	<option value="editar">Editar</option>-->
														<option value="finalizar">Finalizar</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<hr>
								</form>
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
</div>
<?php echo $__env->make('content.categorias', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('content.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<script>
	function validar_finalizar_anuncio(this_){
		if (confirm('Esta seguro que desea eliminar la publicación ? ')) {
			this_.form.submit();
		} 
		



	}

</script>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>