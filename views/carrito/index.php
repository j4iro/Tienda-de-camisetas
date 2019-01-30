<h1>Carrito de compra</h1>

<?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito'])>=1 ) : ?>
<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
        <th>Eliminar</th>
    </tr>
    <?php 
        foreach ($carrito as $indice => $elemento):
         $producto = $elemento['producto'];   
         //var_dump($producto);
    ?>
        <tr>
            <td> 
                <?php if($producto->imagen!= null): ?>
                <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>"  class="img_carrito" >
                <?php else: ?>
                <img src="<?=base_url?>assets/img/camiseta.png" class="img_carrito"  >
                <?php endif; ?>
            </td>
            <td><a href="<?=base_url?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a></td>
            <td><?=$producto->precio?></td>

            <td>
            
            <?=$elemento['unidades']?>
            <div class="updown-unidades">
                <a class="button" href="<?=base_url?>carrito/up&index=<?=$indice?>">+</a>
                <a class="button" href="<?=base_url?>carrito/down&index=<?=$indice?>">-</a>
            </div>      
            </td>

            <td><a href="<?=base_url?>carrito/delete&index=<?=$indice?>" class="button  button-carrito button-red">Quitar Producto</a></td>
        </tr>

    <?php endforeach; ?>
</table>
<br>

<div class="delete-carrito">
<a href="<?=base_url?>carrito/delete_all" class="button button-delete button-red">Vaciar Carrito</a>
</div>

<div class="total-carrito">
    <?php $stats = Utils::statsCarrito();?>
    <h3>Precio Total: <?=$stats['total']?></h3>
    <a href="<?=base_url?>pedido/hacer" class="button button-pedido">Hacer pedido</a>
</div>

<?php else: ?>

<h4>El carrito esta vacio, añade algun producto</h4>

<?php endif; ?>
