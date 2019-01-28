<?php if(isset($_SESSION['identity'])): ?>
<h1>Hacer pedido</h1>

<p>
<a href="<?=base_url?>carrito/index">Ver los productos y el precio del pedido</a>
</p>

<h3>Dirección para el envio</h3>
<form action="<?=base_url?>pedido/add" method="post">
    <label for="txtProvincia">Provincia</label>
    <input type="text" name="txtProvincia" id="" required>

    <label for="txtLocalidad">Localidad</label>
    <input type="text" name="txtLocalidad" id="" required>

    <label for="txtDireccion">Dirección</label>
    <input type="text" name="txtDireccion" id="" required>

    <input type="submit" value="Confirmar Pedido">
</form>

<?php else: ?>
<h1>Necesitas estar identificado </h1>
<p>Necesitas estar logeado en la web para poder realizar tu pedido</p>
<?php endif; ?>