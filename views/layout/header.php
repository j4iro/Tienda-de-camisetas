<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda online</title>
    <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css">
</head>
<body>
   <div id="container">

        <header id="header">
            <div id="logo">
                <img src="<?=base_url?>assets/img/camiseta.png" alt="Camiseta Logo" >
                <a href="index.php">
                    Tienda de Camisetas
                </a>
            </div>
        </header>
       <?php $cats = Utils::showCategorias(); ?>
        <nav id="menu">
            <ul>
            <li><a href="<?=base_url?>">Inicio</a></li>
            <?php while($cat = $cats->fetch_object()) : ?>
                <li><a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a></li>
            <?php endwhile; ?>
            </ul>
        </nav>
       
        <div id="content">