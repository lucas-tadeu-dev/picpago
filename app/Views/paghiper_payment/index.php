<h1>Ocorreu um erro ao realizar o pagamento</h1>
<p><?= $erro ?></p>

<h1>Ocorreu um erro ao consultar o saldo</h1>
<p><?= $erro ?></p>


<h1>Seu saldo é:</h1>
<p><?= $saldo ?></p>


<h1>Pagamento Realizado!</h1>
<p>ID da transação: <?= $transaction_id ?></p>
<p>Linha response_message: <?= $response_message ?></p>
<p>Linha created_date: <?= $created_date ?></p>
<p>Linha value_cents: <?= $value_cents ?></p>
<p>Linha order_id: <?= $order_id ?></p>
<p>Linha due_date: <?= $due_date ?></p>
<p>Linha qrcode_base64: <?= $qrcode_base64 ?></p>
<p>Linha emv: <?= $emv ?></p>
<p>URL do Pix: <a href="<?= $pix_url ?>"><?= $pix_url ?></a></p>
<p>URL do Pix bacen_url: <a href="<?= $bacen_url ?>"><?= $bacen_url ?></a></p>



<h1>Pagamento Boleto Realizado!</h1>
    <p>ID da transação: <?= $transaction_id ?></p>
    <p>URL do boleto: <a href="<?= $url_slip ?>"><?= $url_slip ?></a></p>
    <p>Linha Digitável: <?= $digitable_line ?></p>
    
  <h1>Erro no Pagamento</h1>
    <p><?= $erro ?></p>