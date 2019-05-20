<?php $__env->startSection('content'); ?>
<div class="form-group">
                              <?php echo Form::select('depa',$lista_estados,['id'=>'depa']); ?>

                              <?php echo Form::select('town',['placeholder'=>'Selecciona'],null,['id'=>'town']); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>