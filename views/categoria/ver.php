<?php if(isset($categoria)): ?>
    <h1><?=$categoria->nombre?></h1>
    <?php if($productos->num_rows==0): ?>
        <h3>No hay Productos para mostrar</h3>
    <?php else: ?>
        <?php while ($product = $productos->fetch_object()) :?>
            <div class="product">
            <a href="<?=base_url?>producto/ver&id=<?=$product->id?>" >
            <?php if($product->imagen!= null): ?>
            <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" alt="" srcset="">
            <?php else: ?>
            <img src="<?=base_url?>assets/img/camiseta.png" alt="" >
            <?php endif; ?>
            <h2><?=$product->nombre?></h2>
            </a>
            <p><?=$product->precio?></p>
            <a  class="button" href="<?=base_url?>carrito/add&id=<?=$product->id?>">Comprar</a>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php else: ?>
    <h1>La categoria no existe</h1>
<?php endif; ?>
