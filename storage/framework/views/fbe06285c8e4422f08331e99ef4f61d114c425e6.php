<?php $__env->startSection('content'); ?>

<?php echo $__env->make('content.carrousel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('content.publicaciones_generales', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('content.categorias', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('content.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>