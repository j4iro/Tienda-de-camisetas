<h1>Registrarse</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register']=="completed" ) : ?> 
     <strong class="alert-green">Registro Completado Correctamente</strong>    
<?php elseif(isset($_SESSION['register']) && $_SESSION['register']=="failed"): ?>
     <strong class="alert-red" >Registro Fallido, Introduce bien los datos</strong>
<?php endif; ?>

<?php Utils::deleteSession('register'); ?>

<form action="<?=base_url?>usuario/save" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="" >

    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" id="" >

    <label for="email">Email</label>
    <input type="email" name="email" id="" >

    <label for="password">Password</label>
    <input type="password" name="password" id="" >

    <input type="submit" value="Registrarse">
</form>