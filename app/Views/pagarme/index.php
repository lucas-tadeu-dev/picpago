<!DOCTYPE html>
<html>
<head>
    <title>Pagamento PIX</title>
</head>
<body>
<?php if (isset($error)): ?>
    <p><?= $error ?></p>
<?php else: ?>
    <pre><?= print_r(json_decode($response, true), true) ?></pre>
<?php endif; ?>





    <h1>Resposta do Pagamento PIX</h1>
    <?php if(isset($transaction)): ?>
        <p>ID da Transação: <?= $transaction['id'] ?></p>
        <p>Status: <?= $transaction['status'] ?></p>
        <p>Valor: <?= $transaction['amount']/100 ?></p>
        <p>Data de Expiração do PIX: <?= $transaction['pix_expiration_date'] ?></p>
        <p>Qr Code: <img src="<?= $transaction['pix_qr_code']['base64'] ?>" alt="Qr Code PIX"></p>
    <?php else: ?>
        <p>Nenhuma transação encontrada</p>
    <?php endif; ?>
    <p>Erro: <?= $error ?></p>
</body>
</html>