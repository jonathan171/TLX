<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Ingresar</h2></div>
                <div class="panel-body">

                    <div class="btn-facebook">
                       <div class="form-group" >
                        <label for="email" class="col-md-4 control-label"></label>

                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary btn-lg btn-block"><i class="fa fa-facebook-official"></i>&nbsp;&nbsp;&nbsp;Iniciar sesión con Facebook
                            </button>
                        </div>
                    </div>
                </div>
                <br>
                <hr>

                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                    <?php echo e(csrf_field()); ?>


                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <label for="email" class="col-md-4 control-label">E-Mail</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">

                            <?php if($errors->has('email')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                        <label for="password" class="col-md-4 control-label">Contraseña</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password">

                            <?php if($errors->has('password')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Recordar contraseña
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="entrar">
                                <button type="submit" class="btn btn-primary" >
                                    <i class="fa fa-btn fa-sign-in"></i> Entrar
                                </button>
                           

                            <a class="btn btn-link" href="<?php echo e(url('/password/reset')); ?>">¿Olvidaste tu contraseña?</a>
                             </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="registrate">
        Si no tienes una cuenta o nunca publicaste un anuncio en TLX &nbsp;<a href="<?php echo e(url('/register')); ?>">Regístrate</a></li>
        </div>
    </div>

</div>
</div>
<br><br>
<?php echo $__env->make('content.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>