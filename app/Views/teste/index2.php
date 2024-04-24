<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Pagamento</title>
</head>
<body>
    <?php echo var_dump($gateways['mercadopago']); ?>
    <h2>Chave secretas</h2>
    <?php echo form_open('admin/store'); ?>
    <form method="post" action="/admin/store">
        <label for="mercadopago">Mercado Pago</label>
        <input type="text" id="mercadopago" name="mercadopago">

        <label for="stripe">Stripe</label>
        <input type="text" id="stripe" name="stripe">

        <label for="pagarme">Pagar.me</label>
        <input type="text" id="pagarme" name="pagarme">

        <label for="paghiper">PagHiper</label>
        <input type="text" id="paghiper" name="paghiper">

        <input type="submit" value="Submit">
     <?php echo form_close();
?>
</body>
</html>
