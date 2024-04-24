<style>
    
    /*-------------------------------------------------
------------------------- Plan  --------------------
---------------------------------------------------*/
.card-container{
    display: flex;
    justify-content: center;
    gap: 3%;
}
.section-container h1{
        text-align: center;
        font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        text-align: center;
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 4rem;
        color:#898fa9 !important;
}
.card-container .card{
    min-width: 35%;
    padding-bottom: 10px;
}
.card{
    width:200px;
}
.card-body h5{
    font-size: 1.8rem;
    color:#00C040!important;
  
}
.card-body a{
    background-color: #898fa9;
    padding: .5rem .5rem;
    text-decoration: none;
    color: white;
    font-weight: bold;
}
.card-body h2 span{
    font-size: 2.3rem;
    font-weight: 650;
}
.card-h2{
    color:red!important;
      font-weight: bold;
}
.plan-section{
    background-color: #1C1F26 !important;
    padding:2rem;
}
.card-link{
    background-color: #00C040!important;
    font-size: 1.2rem;
    border-radius:15px;    
}
.card-link:hover{
    background-color:#6690F4!important;
}
.benefits{
    margin-bottom: 30px;
}
.benefits li{
    list-style-type: ""!important;
}

.recomendded{
    background-color: #00C040;
    color: white;
    border-radius: 7px;
    text-align: center;
    font-size: 22px;
    font-weight: 700;
    /* width: 50%; */
}
.card .recomendded1{
    color: white;
}
.card .recomendded3{
    color: white;
}
.card-container .card{
    border:1px solid rgba(0, 0, 0, 0.175);
    box-shadow: 0 10px 20px -3px #ced4da;
}
.card-container .card:is(:hover,:focus,:touch){
      border:1.5px solid #00C040;
}
.card-body,.card{
      background-color: #252932 !important;
}
 .benefits li::before {
            content:""!important;
            list-style-type: none!important;
            padding-right: 10px!important; 
            font-size:10px!important;
            background-image: url(<?= base_url("assets/images/right.png") ?>)!important;
            display: inline-block!important;
            height: 20px!important; /* ajuste para o tamanho desejado */
            width: 20px!important; /* ajuste para o tamanho desejado */
            background-size: cover!important;
            background-repeat: no-repeat!important;
        }
@media(max-width:800px){
    .card-container{
        display: flex;
        justify-content: center;
        flex-direction: column;
    }
    .card-container .card{
        min-width: 90%;
    }
    .card-container{        
        gap: 10px;
    }
    .card{
    width:100%;
    }
}
.section-container h1 span{
    color:#00C040!important;
}

 /* Estiliza o container para centralizar os radios */
    .radio-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        padding: 20px 0;
    }

    /* Esconde os inputs radio originais */
    .radio-container input[type="radio"] {
        display: none;
    }

    /* Cria uma caixa customizada para substituir o radio */
    .radio-container input[type="radio"] + label {
        padding: 10px 20px;
        border: 1px solid #ccc;
        border-radius: 20px;
        cursor: pointer;
        transition: all 0.3s;
    }

    /* Muda a cor quando o radio é selecionado */
    .radio-container input[type="radio"]:checked + label {
        background-color: #4CAF50;
        color: white;
    }
    .discount{
      color:#4CAF50;
      font-weight:550;
    }
</style>


  <section class="section-container plan-section" id="plan">
    
            <?php
    $six_months_descount = $admin['six_months_descount'];
    $one_year_descount = $admin['one_year_descount'];
    ?>
      <h1>Escolha agora mesmo seu Link de Pagamento Pic Pago</h1>
      
       <!-- Adicionando botões de rádio para escolher o período -->
  <div class="radio-container">
    <input type="radio" id="oneMonth" name="period" value="1" checked>
    <label for="oneMonth">1 mês</label>
    <input type="radio" id="sixMonths" name="period" value="6">
    <label for="sixMonths">6 meses</label>
    <input type="radio" id="twelveMonths" name="period" value="12">
    <label for="twelveMonths">12 meses</label>
</div>
    
      <div class="section">
          
      <div class="card-container f-cont">
  
        <div class="card .f-cont">
          <div class="recomendded">Recomendado</div>
          <div class="card-body">
            <h5 class="card-title">Revendendor Master</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">Compre e venda Créditos, gerencie seus clientes</h6>
            <h2>por              
              <span id="masterPrice">R$<?= $admin['master_value']; ?></span>/mês</h2>
               <p class="discount">Desconto de 0%</p>
            <hr>
            <ul class="benefits">
              <li>Loja de PicCoins</li>
              <li>Gerencia revendedores Clientes</li>
              <li>Uso ilimitado para API PicPago</li>
              <li>Integração com WhatsApp</li>
              <li>Uso ilimitado do ChatBot</li>
              <li>Cria revendedores Cliente ilimitado</li>
              <li>Acesso limitado a informações de seus membros</li>
              <li>Acompanhe a jornada completa da sua equipe</li>
              <li>beneficio do plano</li>
              <li>beneficio do plano</li>
            </ul>
            <a href="<?php echo site_url('master_payment/index') ?>" class="card-link">Quero contratar</a>          
          </div>
        </div>
  
        <div class="card .f-cont">
          <div class="recomendded">Melhor Custo-benefício</div>
          <div class="card-body">
            <h5 class="card-title">Revendendor Ultra</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">Venda Créditos, gerencie seus masters e clientes</h6>
            <h2>por              
           <span id="ultraPrice">R$<?= $admin['ultra_value']; ?></span>/mês</h2>
              <p class="discount">Desconto de 0%</p>
            <hr>
            <ul class="benefits">
              <li>Loja de PicCoins personalizada</li>
              <li>Gerencia revendedores Master e Clientes</li>
              <li>Uso ilimitado para API PicPago</li>
              <li>Integração com WhatsApp</li>
              <li>Uso ilimitado do ChatBot</li>
              <li>Cria revendedores Master e Cliente ilimitado</li>
              <li>Acesso a todas informações de seus membros</li>
              <li>Acompanhe a jornada completa da sua equipe</li>
              <li>beneficio do plano</li>
              <li>beneficio do plano</li>
            </ul>
            <a href="<?php echo site_url('ultra_payment/index') ?>" class="card-link">Quero contratar</a>          
          </div>
        </div>
      </div>
     </div>
    </section>  
<script>
    var masterPrice = document.getElementById('masterPrice');
    var ultraPrice = document.getElementById('ultraPrice');
    var discountElements = document.getElementsByClassName('discount');

    document.getElementsByName('period').forEach(function(radio) {
        radio.addEventListener('change', function() {
            var period = parseInt(this.value);
            var masterValue = <?= $admin['master_value']; ?>;
            var ultraValue = <?= $admin['ultra_value']; ?>;
            var discount = 0;
            var discountPercent = "0%";

            if (period === 6) {
                discount = 1 - <?= $six_months_descount; ?> / 100;
                discountPercent = "<?= $six_months_descount; ?>%";
            } else if (period === 12) {
                discount = 1 - <?= $one_year_descount; ?> / 100;
                discountPercent = "<?= $one_year_descount; ?>%";
            }

            if (discount > 0) {
                masterValue *= discount * period;
                ultraValue *= discount * period;
            } else {
                masterValue *= period;
                ultraValue *= period;
            }

            masterPrice.innerHTML = "R$" + masterValue;
            ultraPrice.innerHTML = "R$" + ultraValue;
            
            // Atualiza todos os elementos com a classe 'discount'
            for (var i = 0; i < discountElements.length; i++) {
                discountElements[i].innerHTML = "Desconto de " + discountPercent + "!";
            }
        });
    });
</script>
    