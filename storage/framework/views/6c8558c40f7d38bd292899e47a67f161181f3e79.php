<?php $__env->startSection('content'); ?>
<?php echo $__env->make('content.carrousel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- de aqui para abajo   -->
 <div id="Advertencia" class="mayor"  style="display: fixed" >
 	
<div class="modal-dialog" role="document">
<div class="modal-content">
	<div class="modal-header" >

    <h4 class="modal-title" id="loginModaLabel"> Advertencia</h4>
	</div>
	<div class="modal-body">
		<p> este sitio requiere que para poder seguir navegando  seas mayor de edad lo eres?</p>
	</div>
	<div class="modal-footer">
		<table>
			<th width="50%">
				<button type="submit" class="btn btn-success" onclick="mostrar('Advertencia')" >
									SI
								</button>

			</th ><th width="50%">	<button type="submit" class="btn btn-danger" onclick="location.href='http://google.com'">
									NO
								</button></th>
		</table>
		
	</div>

</div>	

</div>	
</div>
   
    <script type="text/javascript">
    	if( !localStorage.getItem('ingreso') ){

    document.getElementById('Advertencia').style.display= 'fixed';
    // estableces el localstorage en 1 para que no se vuelva a cumplir la condicion
    localStorage.setItem('ingreso',1); 

} else {
    document.getElementById('Advertencia').style.display= 'none';
}
        function mostrar(id){
            var NuevaCapa = document.getElementById(id);
            if(NuevaCapa.className == 'ocultar'){
                NuevaCapa.className = 'mayor';
            }
            else{
                NuevaCapa.className = 'ocultar';
            }
        }
    </script>  
   
  <!-- hasta aqui   --> 
<?php echo $__env->make('content.publicaciones_generales', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('content.categorias', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('content.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>