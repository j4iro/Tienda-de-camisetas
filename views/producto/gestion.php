<h1>Gestión de productos</h1>

<a href="<?=base_url?>producto/crear" class="button boton-peque">
    Crear Producto
</a>


<?php if(isset($_SESSION['producto']) && $_SESSION['producto']=='completed'):?>
<strong class="alert_green">El producto se ha añadido correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto']=='failed'):?>
<strong class="alert_red">El producto NO se ha añadido correctamente</strong>
<?php endif; ?>

<?php Utils::deleteSession('producto') ?>

<table>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
    <?php while ($pro = $productos->fetch_object()) :?>
    <tr>       
        <td><?=$pro->id?></td>
        <td><?=$pro->nombre?></td>      
        <td><?=$pro->precio?></td>      
        <td><?=$pro->stock?></td>      
    </tr>
    <?php endwhile; ?>
</table>