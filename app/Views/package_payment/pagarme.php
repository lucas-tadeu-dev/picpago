<!DOCTYPE html>
<html>
<head>
    <title>Pagamento com Cartão</title>
    <!-- Inclua a biblioteca do Mercado Pago -->
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
    <style>
        form{
            background:white;
        }
        .logo-plans {
            display: flex;
            flex-direction: column;
            width: 60%;
            margin-left: 20%;
            justify-content: center;
            align-items: center;
            margin-top:20px;
        }
        .logo-plans img{
            width:20%!important;
        }
        .logo-plans h2 {
            font-size:24px;
            }
        .logo-plans h2 span{
            color:#00C040;
        }
        .select-plans{
            display: flex;
            flex-direction: column;
            align-content: center;
            justify-content: center;
            align-items: center;
        }
        .form-head{
            background:#252932;
            padding: 1px;
            border: 2px solid black;
            border-bottom:none;
        }
        .general-form{
            border: 2px solid black;  
            border-top: none;
        }
        .form-head h2{
            font-weight:700;
            font-size: 26px;
            color:#00C040;
        }
        .form-head p{
            font-weight:500;
            font-size: 15px;
        }
        #selecaoConteudo, #issuer_id,#month_quantity,#installments{
            border-radius: 5px;
            border: 1px solid white;
            color:white;
            background-color:#00C040;
            font-weight:800;
            height: 28px;
             font-size: 14px;
        }
        label {
            font-weight: 800;
            max-width: 100%;
            margin-bottom: 5px;
            margin-bottom:10px;
        }
        .card-pix{
            font-size:18px;
        }
       #conteudo2,#conteudo1{
           margin-top:-40px;
       }
        .logo-white{
        color:white;
         font-size:32px;
         font-weight:bold;
         font-family:"Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
       }
       
       .logo-white span{
        background-color:#00C040;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        padding: 3px;
        }
        .logo-white:hover{
            background-color:#00C040;
            color:white!important;
            padding: 3px;
            border-radius:5px;
        }
        .select-month{
           background-color:#252932 !important;
        }
        .card-body div{
            margin-bottom:10px;
        }
    </style>
</head>
<body>
    
    <!-- Formulário de pagamento do mercado pago--> 
    
    <div class="logo-plans">
            <a class="logo-white" href="https://picpago.com.br/"><span>PIC</span>PAGO</a>
        <h2>Agora escolha seu método de pagamento e finalize a compra de <?php echo $package['coins_quantity']; ?> PicCoins!</h2>
    </div>

     
     <div class="select-plans">
         <h4>Selecione a forma com pagamento</h4>
     <select id="selecaoConteudo" onchange="alternarConteudo()">
          <option value="conteudo1">Pague com:</option>
          <option value="conteudo1">Pix</option>
          <option value="conteudo2">Cartão de Crédito</option>
        </select>
    </div>
    
        <!--CONTEUDO AQUI-->
        <div id="conteudo1" >
            
            <div class="form-signin">
         <div class="card-header text-center form-head">
                <h2 class="form-signin-heading">Pacote de <?php echo $package['coins_quantity']; ?> PicCoins.</h2>
                <p>No cartão parcele em até 12 vezes, a sua assinatura mensal!</p>
        </div>
             <?php $amount = $package['coins_quantity']*$package['package_value']; ?>
    <?php echo form_open('package_payment/pixPayment', ['id' => 'pix-form', "class" => "general-form"]); ?>
     <div class="card-body card-pix p30 rounded-bottom">
           <div id="value">Valor: <?php echo $amount; ?> R$</div> 
            <div>Descrição: Pacote com <?php echo $package['coins_quantity']; ?> PicCoins!</div>
            <div>Método de Pagamento: Pix</div>
            <div>Email: <?php echo $email; ?></div>
            <input type="hidden" name="amount" value="<?php echo $amount; ?>">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
        <button class="w-100 btn btn-lg btn-primary" type="submit">Gerar QR Code</button>
        </div>
         <?php echo form_close(); ?>
     </div>
    </div>
        
        <!--CONTEUDO 2 AQUI-->
        <div id="conteudo2" style="display: none;">
         <div class="form-signin">
         <div class="card-header text-center form-head">
                 <h2 class="form-signin-heading">Pacote com <?php echo $package['coins_quantity']; ?> PicCoins.</h2>
                <p>No cartão parcele em até 12 vezes, a sua assinatura mensal!</p>
        </div>
    <?php echo form_open('package_payment/creditCard', ['id' => 'pay', "class" => "general-form"]); ?>
     <div class="card-body p30 rounded-bottom">
        <label for="issuer_id">Escolha o tipo de cartão:</label>
          <select name="issuer_id" id="issuer_id">
            <option value="">Selecione o tipo do cartão</option>
            <option value="0">Mastercard</option>
            <option value="1">Visa</option>
          </select>
         <div class="form-group">
        <label for="installments">Quantidade de parcelas:</label>
        <select id="installments" name="installments">
            <?php for ($i = 1; $i <= 12; $i++) : ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
        </select>
    </div>
         <input type="hidden" name="amount" value="<?php echo $amount; ?>">
        <div class="form-group"><div id="value">Valor Total: <?php echo $amount; ?> R$</div> </div>
        <div class="form-group"><input class="form-control" type="text" id="cardNumber" placeholder="Número do Cartão"/></div>
        <div class="form-group"><input class="form-control" type="text" id="cardExpirationMonth" placeholder="Mês de Expiração"/></div>
        <div class="form-group"><input class="form-control" type="text" id="cardExpirationYear" placeholder="Ano de Expiração"/></div>
        <div class="form-group"><input class="form-control" type="text" id="cardholderName" placeholder="Nome do Titular"/></div>
        <div class="form-group"><input class="form-control" type="text" id="securityCode" placeholder="Código de Segurança"/></div>
        <div class="form-group"><input class="form-control" type="text" id="docType" placeholder="Tipo de Documento"/></div>
        <div class="form-group"><input class="form-control" type="text" id="docNumber" placeholder="Número do Documento"/></div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Pagar</button>
       </div>
     <?php echo form_close(); ?>
     </div>
    </div>
     
      <script>
        // Configure seu public key
        Mercadopago.setPublishableKey("<?php echo $pkmercadopagoKey; ?>");

        // Quando o formulário é submetido
        document.getElementById('pay').addEventListener('submit', function(e) {
            e.preventDefault();

            // Crie um objeto de cartão
            var card = {
                cardNumber: document.getElementById('cardNumber').value,
                cardExpirationMonth: document.getElementById('cardExpirationMonth').value,
                cardExpirationYear: document.getElementById('cardExpirationYear').value,
                cardholderName: document.getElementById('cardholderName').value,
                securityCode: document.getElementById('securityCode').value,
                docType: document.getElementById('docType').value,
                docNumber: document.getElementById('docNumber').value
            };

            // Crie o token
            Mercadopago.createToken(card, function(status, response) {
                if (status != 200 && status != 201) {
                var errorMessage = "Verifique os dados do cartão.";
                if (response && response.cause && response.cause.length > 0) {
                    errorMessage = response.cause[0].description;
                }
                alert(errorMessage);
                } else {
                    var form = document.getElementById('pay');
                    var card = document.createElement('input');
                    card.setAttribute('name', 'token');
                    card.setAttribute('type', 'hidden');
                    card.setAttribute('value', response.id);
                    form.appendChild(card);
                    form.submit();
                }
            });
        });
    </script>
     
     
     
     
     
<script>
function alternarConteudo() {
  var selecao = document.getElementById('selecaoConteudo').value;
  
  // Esconde todos os conteúdos
  document.getElementById('conteudo1').style.display = 'none';
  document.getElementById('conteudo2').style.display = 'none';
  
  // Mostra o conteúdo selecionado
  if (selecao) {
    document.getElementById(selecao).style.display = 'block';
  }
}
</script>
</body>
</html>