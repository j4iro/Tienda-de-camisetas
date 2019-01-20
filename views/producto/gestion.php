<h1>Gestión de productos</h1>

<a href="<?=base_url?>producto/crear" class="button boton-peque">
    Crear Producto
</a>
<hr>
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