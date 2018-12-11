<aside id="lateral">
                <div id="login" class="block_aside">

                    <?php if (!isset($_SESSION['identity'])): ?>
                    <h3>Entrar a la web</h3>
                    <form action="<?=base_url?>usuario/login" method="post">
                        <label for="email">email</label>
                        <input type="email" name="email" id="">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="">
                        <input type="submit" name="enviar" value="enviar" id="">
                    </form>

                    <?php else: ?>
                    <h3><?= $_SESSION['identity']->nombre;  ?> <?= $_SESSION['identity']->apellidos;  ?></h3>
                    <?php endif; ?>
       
                    <ul>
                      

                        <?php if(isset($_SESSION['admin'])): ?>
                        <li><a href="#">Gestionar Categorias</a></li>
                        <li><a href="#">Gestionar Productos</a></li>
                        <li><a href="#">Gestionar pedidos</a></li>
                        <?php endif; ?>

                        <?php if(isset($_SESSION['identity'])): ?>
                        <li><a href="#">Mis pedidos</a></li>
                        <li><a href="<?=base_url?>usuario/logout">Cerrar Sesion</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </aside>
        
       
            <div id="central">