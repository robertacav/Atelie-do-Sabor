<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ateliê do Sabor</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<section id="produtos" class="produtos">
        <h2>Nossos Produtos</h2>
        <div class="product-list">
            <div class="product-item">
                <img src="doces1.jpg" alt="Bolo de Chocolate">
                <h3>Bolo de Chocolate</h3>
                <p>Uma fatia de felicidade, feita com muito amor e chocolate.</p>
            </div>
            <div class="product-item">
                <img src="doces2.jpg" alt="Trufas">
                <h3>Trufas</h3>
                <p>Doces trufados com os melhores recheios e coberturas.</p>
            </div>
            <div class="product-item">
                <img src="doces3.jpg" alt="Cupcakes">
                <h3>Cupcakes</h3>
                <p>Pequenos bolos, grandes sabores, perfeitos para qualquer ocasião.</p>
            </div>
        </div>
    </section>
<?php
session_start();

if(!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
?>
</body>
</html>