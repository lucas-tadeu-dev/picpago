<!DOCTYPE html>
<html>
<head>
    <title>Compra plano</title>
</head>
<body>
<h1>Finalização de Compra</h1>
    <p>Plano com <?= $package['coins_quantity']; ?> Créditos</p>
    <p><?= $package['package_value']; ?> Reais por PicCoins</p>
    <p>Preço Total: R$<?php
         $value = $package['package_value']; 
         $price = $value * $package['coins_quantity'];
         echo number_format($price, 2, ',','');
        ?></p>
    <!-- Adicione aqui o resto da sua estrutura de checkout -->


</body>
</html>
