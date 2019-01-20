    <h1>Algunos de nuestros Productos</h1>

    <?php while ($product = $productos->fetch_object()) :?>
        <div class="product">
        <?php if($product->imagen!= null): ?>
        <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" alt="" srcset="">
        <?php else: ?>
        <img src="assets/img/camiseta.png" alt="" srcset="">
        <?php endif; ?>
        <h2><?=$product->nombre?></h2>
        <p><?=$product->precio?></p>
        <a  class="button" href="#">Comprar</a>
        </div>
    <?php endwhile; ?>
    
    
