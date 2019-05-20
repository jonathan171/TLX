
<?php
  # Iniciando la variable de control que permitirá mostrar o no el modal
  $exibirModal = true;
  # Verificando si existe o no la cookie
  if(!isset($_COOKIE["mostrarModal"]))
  {
    # Caso no exista la cookie entra aquí
    # Creamos la cookie con la duración que queramos
     
    //$expirar = 3600; // muestra cada 1 hora
    //$expirar = 10800; // muestra cada 3 horas
    //$expirar = 21600; //muestra cada 6 horas
    $expirar = 43200; //muestra cada 12 horas
    //$expirar = 86400;  // muestra cada 24 horas
    setcookie('mostrarModal', 'SI', (time() + $expirar)); // mostrará cada 12 horas.
    # Ahora nuestra variable de control pasará a tener el valor TRUE (Verdadero)
    $exibirModal = false;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mostrar Ventana Emergente</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
  <h2>Ejemplo</h2>
    <!-- Modal -->
    <div class="modal fade" id="modalInicio" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
       <div class="modal-content">
         <div class="modal-header">
            
            <h4 class="modal-title">Modal Header</h4>
         </div>
         <div class="modal-body">
           eres mayor de edad
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">si</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php if($exibirModal === true) : // Si nuestra variable de control "$exibirModal" es igual a TRUE activa nuestro modal y será visible a nuestro usuario. ?>
  <script>
  $(document).ready(function()
  {
    // id de nuestro modal
    $("#modalInicio").modal("show");
  });
  </script>
  <?php endif; ?>

  <a href="#" data-toggle="modal" data-target="#loginModal">Login</a>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="loginModaLabel"  id="loginModal">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header" >
  <button type="button" name="button" class="close" data-dismiss="modal" aria-label="close">
    <span aria-hidden="true">&times;</span>

  </button> 

    <h4 class="modal-title" id="loginModaLabel"> iniciar</h4>
  </div>
  <div class="modal-body">
    <p> esto es el form</p>
  </div>
  <div class="modal-footer">
    <p> este es el pie</p>
  </div>

</div>  

</div>  

</div>
</body>
</html>