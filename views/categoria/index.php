<h1>Gestionar Categorias</h1>
<a href="<?=base_url?>categoria/crear" class="button boton-peque">
    Crear Categoria
</a>
<hr>
<table>
        <th>ID</th>
        <th>NOMBRE</th>
    <?php while ($cat = $categorias->fetch_object()) :?>
    <tr>       
        <td><?=$cat->id?></td>
        <td>
            <?=$cat->nombre?>
        </td>      
    </tr>
    <?php endwhile; ?>
</table>

