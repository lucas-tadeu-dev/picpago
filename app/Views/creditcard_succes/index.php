<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Result</title>
    <!-- Inclua qualquer biblioteca CSS que você esteja usando, como Bootstrap, aqui -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .payment-data {
            margin: 1em 0;
        }
        .payment-data h2 {
            color: #444;
        }
        .payment-data p {
            font-size: 1.2em;
            line-height: 1.4;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Parabéns agora você é um Revedendor Master!</h1>
        <?php if (!empty($paymentData)) { ?>
            <div class="payment-data">
                <h2>Valor da Transação: <?php echo $paymentData['transaction_amount']; ?></h2>
                <h2>Descrição: <?php echo $paymentData['description']; ?></h2>
                <h2>Email: <?php echo $paymentData['payer']['email']; ?></h2>
                <h2>Método de pagamento: <?php echo $paymentData['payment_method_id']; ?></h2>
            </div>
        <?php } else { ?>
            <h2>No payment data available.</h2>
        <?php } ?>
    </div>
</body>
</html>
