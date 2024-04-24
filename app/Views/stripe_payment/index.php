<html>
<head>
    <title>Resposta do Pagamento</title>
</head>

<body>
<?php  echo form_open('stripe_payment/charge'); ?>
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_51NH61gKAnvBgk0fi10hrkln9IlM3zUAYJ03fXVbkYNpzgHBJH9BOLkC3X5ruwKwDf4qCTWsTwJ4TsNKEKi9wdfIl00T6za4yBE"
    data-amount="100"
    data-name="Exemplo de pagamento"
    data-description="Exemplo de item"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto">
  </script>

<?php  echo form_close(); ?>
    
    
<h1>Saldo da Conta Stripe</h1>

<p>Saldo Disponível:</p>
<ul>

    <li><?= $item['amount'] ?> <?= $item['currency'] ?></li>

</ul>

<p>Saldo Pendente:</p>
<ul>

    <li><?= $item['amount'] ?> <?= $item['currency'] ?></li>

</ul>



</body>
</html>