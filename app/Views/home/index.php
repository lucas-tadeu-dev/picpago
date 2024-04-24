<?php echo view('includes/head'); ?>
<?php echo view('header/index'); ?>
<!-- TEXT ANIMATION CDN LIB JS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
   <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

<style>
   
@import url('https://fonts.googleapis.com/css2?family=Cedarville+Cursive&family=Overlock+SC&family=Roboto:ital,wght@0,500;0,700;0,900;1,400;1,500;1,700;1,900&family=Sofia&family=Tilt+Neon&family=Ubuntu:ital,wght@0,500;0,700;1,400;1,500;1,700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Cedarville+Cursive&family=Inter:wght@400;500;600;700;800&family=Overlock+SC&family=Roboto:ital,wght@0,500;0,700;0,900;1,400;1,500;1,700;1,900&family=Sofia&family=Tilt+Neon&family=Ubuntu:ital,wght@0,500;0,700;1,400;1,500;1,700&display=swap');
/*-------------------------------------------------
------------------    REUSED  ----------------------
---------------------------------------------------*/
.section{ display: flex;
    justify-content: center;
    }
    .f-cont{
        max-width: 1000px;
    }
.gat-container{
    max-width: 1000px;
}
@media(max-width:800px){
    .gat-container{
        max-width: 100%;
    }
    .f-cont{max-width: 100%}
    .home-container ol, ul {
       padding-right: 2rem!important;
   }
 }
 body{
     overflow-y:scroll;
    
 }
 html{
      background-color:#EEF1F9 !important;
 }
 h1, h2, h3, h4{
     color:black!important;
 }
 

a:hover, a:focus, a:active{
      color:white!important;
}

/*-------------------------------------------------
------------------------- HOME  --------------------
---------------------------------------------------*/

.home-container{
    display:flex;
    justify-content:center;
}
.home-presentation{
    max-width:1000px;
    display:flex;
    justify-content:center;
    margin-bottom:6rem;
}
.home-presentation-1 span{
    color: #097635;
}
.home-presentation-2 img{
    /*width:500px;*/
}
.home-presentation-1{
    width:75%;
}
.home-h1{
    font-size: 2.5rem;
    color: black;
    font-weight: bold;  
    font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif; 
    text-align:start;
}
.home-p{
    font-size: 1.3rem;
    color: darkslategray;
    margin-top:1.5rem;
    margin-bottom:1.5rem;
}
.home-a{
   background: #00C040;
    color: white;
    padding: 0.8rem 0.8rem;
    font-size: 1.5rem;
    font-weight: 600;
    border-radius: 4px; 
     text-decoration: none;
     /* border:1.5px solid black; */
     box-shadow: 0 10px 20px -3px #ced4da; 
}
.home-a:hover{
    background: #6690F4;
    color:white;
   font-weight: bold;
   padding:10px;
}

@media(max-width:1024px){
.home-presentation{
    margin:1%;
}
}

@media(max-width:800px){
    .home-presentation{
    max-width:100%!important;
    margin-left:5%;
}
.home-presentation-1{
    width:100%;
 
}
.home-presentation{
       margin-bottom: 3rem;
}
.home-presentation-1 h1{
    font-size:24px;
}
    .home-presentation {
    flex-direction: column-reverse;
}
.home-presentation-2 img {
    width: 95%;
}
.pt-section h4{
    font-size:22px!important;
    margin-left:2%;
}
.gat-desc{
    width: 100%!important;
}
.gat-desc li{
    width: 100%!important;
}
}



/*---------------------------------------------------
---------------------  ADVANTAGE  -------------------
---------------------------------------------------*/

.pt3-section {
  display: flex;
  flex-direction: column;
  justify-content: center;
  /*margin-top: 3rem;*/
  margin-bottom: 3rem;
  text-align: center;

}
.pt-section h4{
    font-size: 1.8rem; 
    margin-bottom: 2.7rem;
    font-weight: bolder;   
}
.pt-section span{
    color: #00C040;    
}
.pt-section{
    align-items: center;
}
.pt3-container {
    max-width:1000px;
}

.pt3-services {
  display: flex;
  flex-direction: row;
  justify-content: center;
  width: 100%;
  gap: 5px;
}
.pt3-services li {
  display: flex;
  justify-content: center;
  align-items: center;
  color:black;
}
.pt3-services li:is(:hover,:focus){
    box-shadow: 0 0.2rem 0.5rem #00C040;
  border-left: 0.35rem solid #00C040;
  border-right: 0.35rem solid #00C040;
  background-color:white;
  /* padding:1rem 1rem; */
}
.pt3-desc {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  text-align: center;
  padding:1rem 0rem;
}
.fa-brands, .fab {
    font-size: 1.7rem;
    color:#00C040;
}
.fa-solid, .fas {
    font-size: 1.7rem;
        color:#00C040;
}

@media (max-width: 800px) {
    .pt3-container {
    max-width:100%;
}
.pt-section h4 {
    font-size: 1.4rem;
}
  .pt3-services {
    /* flex-direction: column;
     */
     flex-wrap: wrap;
    width: 100%;
    gap: 20px;
 align-items: center;
  }
  .pt3-desc {
flex-direction: column;
    gap: 15px;
  }
  .pt3-desc p {
    min-width: 20ch;
  }
}



/*-------------------------------------------------
------------------------- GATEWAY--------------------
---------------------------------------------------*/

.gateway{
display: flex;
justify-content: center;
flex-direction: column;
margin-top: 2rem;
margin-bottom: 2rem;
font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
}
.gateway h4{
    text-align: center;
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 4rem;
}
.gateways{
    display: flex;
    flex-direction: row-reverse;
    align-items: center;
    justify-content: center;
   
}
.section-gateway{
    margin-right:2.5%;
}
.pt3-desc h4{
    margin-bottom: 2rem!important;
}
.gat-desc {
    display: grid;
    flex-direction: row;
    grid-template-columns: 1fr 1fr 1fr;
}
.gat-desc li{
    
}
.gat-desc li:hover{
    box-shadow: 0 0.2rem 0.5rem #6690F4;
  border-left: 0.35rem solid #6690F4;
  border-right: 0.35rem solid #6690F4;
  font-weight: bold; 
}
.gat-desc li:hover img{
   transform: scale(1.1);
}
.gat-img{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 50%;
    margin-top: 2rem;
    margin-bottom: 2rem;
}
.gat-img img{
    width: 100%;
    border-radius: 4px;
}
.mercado-pago{
    width: 150px!important;
}
.pagarme{
    width: 150px!important; 
}
.gateway span{
    color:#097635 ;
}
.about-desc{
    min-height: 350px;
    padding: 3.55rem 2rem 1.95rem;
    box-shadow: 0 10px 20px -3px #ced4da; 
    background-color:white;
}
ul li{
    font-size:17px!important;
}

.about-desc img{
    margin-bottom: 2rem;
    width: 70px;
}
@media(max-width:1024px){
.about-desc{
    padding:2rem;
}
}
@media(max-width:800px){
    .gat-desc{
    grid-template-columns: 1fr;   
    }
    .gateways{        
        flex-direction: column-reverse;
    }
    .gat-img{        
        width:90%;
    }
    .gateway h4 {
    font-size: 1.4rem;
    margin-bottom: 2rem;
}
}
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
        color:black;
}
.card-container .card{
    min-width: 50%;
    padding-bottom: 10px;
}
.card{
    width:200px;
}
.card-body h5{
    font-size: 1.8rem;
    color:#00C040!important;
    text-align:center;
}
.card-subtitle{
    text-align:center;
}
.card-body a{
    background-color: #6690F4;
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
    background-color: white;
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
    color:black!important;
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
    background-color:white!important;
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

/*-------------------------------------------------
------------------------- CONTACT  --------------------
---------------------------------------------------*/
.redirect-about{
    margin-top: 50px;
    margin-bottom: 100px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-left: 20px;
}
.redirect-about a{
    background-color: #00C040;
    padding: 1rem 2rem;
    border-radius: 4px;
    color: white;
    text-decoration: none;
    font-weight: bold;
    font-size: 22px;
    margin-top: 10px;
}

/*-------------------------------------------------
-----------------------  WHATSAPP --------------------
---------------------------------------------------*/
.whatsapp-link {
  position: fixed;
  width: 60px;
  height: 60px;
  bottom: 40px;
  right: 40px;
  background-color: #25d366;
  color: white!important;
  border-radius: 50px;
  text-align: center;
  font-size: 4rem;
  box-shadow: 1px 1px 2px #888;
  z-index: 1000;
  overflow: hidden;
}

.fa-wtp12 {
  margin-top: 10px;
   color:white!important;
   margin-top: 10px;
    font-size: 40px;
}


/*.fa-whatsapp {*/
/*    margin-top: 10px;*/
/*    font-size: 40px;*/
/*}*/
body{
    background-color:#EEF1F9 !important;
}
</style>


<!-----------------------------------------------------------------
    -------------------------- HOME  ----------------------------
    ------------------------------------------------------------------>

<div class="home">
    <div class="home-container" >
        
    <div class="home-presentation">
    
    <div class="home-presentation-1">
    <h1 class="home-h1" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400"> Bem-vindo ao <span>mais completo Gerenciador de Pagamentos </span>para sua empresa</h1>
    <p class="home-p" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">Faça cobranças, capte leads e gerencie clientes, tudo em apenas um lugar. </p>
    <a href="<?php echo site_url('signup/index') ?>" class="home-a" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">Cadastra-se Grátis</a>
    </div>
    
    <div class="home-presentation-2">
    <img src="<?= base_url("assets/images/home/presentation.png") ?>" alt="imagem" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
    </div>
    
     </div>   
    
    </div>
  
    
    
    <!-----------------------------------------------------------------
    -------------------------- ADVANTAGE  ----------------------------
    ------------------------------------------------------------------>
 
  <section class="pt3-section pt-section ">
    <div class="f-cont" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
      <h4>Entregamos os <span>melhores serviços</span>
        e otimizamos seu tempo.</h4>
        <div class="pt3-container">
        <ul class="pt3-services">
            <li>
                <div class="pt3-desc">
                    <i class="fa-solid fa-link"></i>
                    <h4>link de pagamento</h4>
                    <p>Facilite os pagamentos enviando links personalizados para seus clientes</p>
                </div>
            </li>
            <li>
                <div class="pt3-desc">
                    <i class="fa-brands fa-pix"></i>
                    <h4>Pix</h4>
                    <p>Faça cobranças e realize pagamentos de forma facilitada com o PIX</p>
                </div>
            </li>
            <li>
                <div class="pt3-desc">
                    <i class="fa-brands fa-whatsapp"></i>
                   <h4>WhatsApp</h4>
                    <p>Faça a cobrança mensalmente por WhatsApp para seus clientes</p>
                </div>
            </li>
            <li>
                <div class="pt3-desc">
                   <i class="fa-solid fa-user"></i>
                    <h4>Área de clientes</h4>
                    <p>Ofereça uma área de clientes para exclusiva para maiores conversões</p>
                </div>
            </li>
            <li>
                <div class="pt3-desc">
                    <i class="fa-solid fa-arrow-up"></i>
                    <h4>Controle Financeiro</h4>
                    <p>Tenha total controle das suas finanças de forma prática e intuitiva</p>
                </div>
            </li>
        </ul>
    </div>
  </div>
    </section>
  

        <!-----------------------------------------------------------------
    -------------------------- ABOUT-US  ----------------------------
    ------------------------------------------------------------------>
    <section class="section section-gateway" id="about-us">
        <div class="gateway f-cont">
        <h4>Porque o PicPago é o <span>Gerenciador de Pagamentos mais completo</span>
           do que os outros?</h4>
        
    
        <div class="gat-container">
            <div class="gateways">
                <ul class="pt3-services gat-desc">
                    <li>
                        <div class="pt3-desc about-desc">
                           <img class="mercado-pago" src="https://http2.mlstatic.com/frontend-assets/mp-web-navigation/ui-navigation/5.32.2/mercadopago/logo__large@2x.png" alt="imagem">
                            <p>Somos integrado com o Mercado Pago. Facilite os pagamentos enviando links personalizados para seus clientes</p>
                        </div>
                    </li>
                    <li>
                        <div class="pt3-desc about-desc">
                        <img class="pagarme" src="https://pagar.me/static/logo_pagarme-f40e836118f75338095ebb5b461cd5ed.svg" alt="pagarme">
                            <p>Somos integrado com a PagarMe. A Melhor Infraestrutura em Pagamentos Online. Descomplique e Venda Mais. Venda mais oferecendo a melhor experiência de pagamento para seus clientes com Pagar.me</p>
                        </div>
                    </li>  
                    <li>
                      <div class="pt3-desc about-desc">
                      <img class="pagarme" src="<?= base_url("assets/images/home/stripe.png") ?>" alt="pagarme">
                          <p>Milhões de empresas de todos os tamanhos - de startups a grandes empresas - usam o software e as APIs da Stripe para aceitar pagamentos, enviar pagamentos e gerenciar seus negócios online</p>
                      </div>
                  </li> 
                  <li>
                    <div class="pt3-desc about-desc">
                    <img class="pagarme" src="https://www.paghiper.com/img/logo.gif" alt="pagarme">
                        <p>Somos integrado com a PagHiper que oferece as melhores ferramentas e recursos que irão possibilitar o completo gerenciamento de seus recebíveis por boleto bancário</p>
                    </div>
                </li>  
                <li>
                  <div class="pt3-desc about-desc">
                      <img src="https://uploads-ssl.webflow.com/61afa420e611dbd8b4a5856e/629a2134db8efae6010dc188_icon-360-vision.png" alt="">
                      <p>Gerencie seus clientes, com nosso sistema facilitardo. Você consegue controlar cada detalhe da sua equipe!</p>
                  </div>
              </li>
              <li>
                <div class="pt3-desc about-desc">
                    <img src="https://uploads-ssl.webflow.com/61afa420e611dbd8b4a5856e/629a213464c6713be4c19343_icon-laptop.png" alt="">
                    <p>Facilitamos todo o gerenciamento de Pagamentos da sua empresa, com gráficos.</p>
                </div>
            </li>          
                </ul> 
            </div>        
        </div>
    </div>
    </section>
    
 <!-----------------------------------------------------------------
    ---------------------------   API   ----------------------------
    ------------------------------------------------------------------>
    <style>
        .api-section{
            background-image:url(<?= base_url("assets/images/home/api.png") ?>);
            height: 570px;
            display:flex;
            justify-content:center;
            width: 100%;
            background-size: cover;
        }
        .api-container{
         /*transform: translateX(510px);*/
        display: flex;
        justify-content: center;
        align-content: center;
        align-items: center;
        }
        .api{
        display: flex;
        flex-direction: row;
        gap: 40px;
        max-width:1000px;
        }
        .api-img{
            width:520px;
            border: 1px solid rgba(0, 0, 0, 0.175);
             box-shadow: 0px 10px 20px -3px #ced4da
        }
         .api-img img{
             height: 100%;
         }
        .api-img:is(:hover,:focus,:touch){
        transform:scale(1.1);
        }
        .api-text h6{
            color:#00C040;
        }
        .api-text{
              max-width: 50%;
        }
        .api-text h2{
          font-weight:bold;
          color:white!important;
          font-size: 30px;
        }
        .api-text p{
             margin-top:25px;
            margin-bottom:25px;
            color:white!important;
            font-size: 16px;
        }
        .api-integrations{
           background-color:rgb(33, 35, 47);
            height: 130px;
            display:flex;
            justify-content:center;
            width: 100%;
            background-size: cover;
            flex-direction:row;
            align-items:center;
            gap:100px;
        }
        .api-integrations img{
        width: 150px!important;
        }
         .api-integrations:is(:hover,:focus,:touch){
        transform:scale(1.1);
        }
        @media(max-width:800px){
         .api-section{
                height:100%;
            }
         .api{
                flex-direction:column-reverse;
            }
        .api-integrations{
            display:none;
        }
        .api-img{
            width: 90%;
            margin-left:5%;
        }
        .api-text{
            min-width: 90%;
            margin-left:5%;
        }
            
        }
    </style>
    <div class="api-more">
    <section class="api-section">
        <div class="api-container">
            
            
            <div class="api">
                <div class="api-img">
                    <img src="<?= base_url("assets/images/home/code.png") ?>" alt="pagarme">
                </div>
                 <div class="api-text">
                     <h6>Criado para desenvolvedores</h6>
                     <h2>Faça cobranças com Pix, Cartão de crédito ou Boleto usando nossa API</h2>
                     <p>Integre nossa API em seu sistema e faça cobranças de forma facilitada usando seu gateway de pagamento preferido: Mercado Pago, Pagarme, PagHiper e Stripe. Cadastre-se em nossa plataforma e use nossa API, com documentação completa, qualquer desenvolvedor consegue integrar ela de forma facilitada!</p>
                     <a class="home-a" href="https://picpago.com.br/index.php/documentation/index">Documentação</a>
                 </div>
            </div>
            
        </div>
    </section>
        <div class="api-integrations">
             <img class="mercado-pago" src="https://http2.mlstatic.com/frontend-assets/mp-web-navigation/ui-navigation/5.32.2/mercadopago/logo__large@2x.png" alt="imagem">
             <!--<img class="pagarme" src="https://pagar.me/static/logo_pagarme-f40e836118f75338095ebb5b461cd5ed.svg" alt="pagarme">-->
             <img class="pagarme" src="https://www.paghiper.com/img/logo.gif" alt="pagarme">
             <img class="pagarme" src="<?= base_url("assets/images/home/stripe.png") ?>" alt="pagarme">
        </div>
    </div>
    
    
  <!-----------------------------------------------------------------
    ---------------------------   PLAN   ----------------------------
    ------------------------------------------------------------------>

<style>
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
      <div class="card">
        <div class="recomendded1">Recomendado</div>
          <div class="card-body">   
            <h5 class="card-title">REVENDA SIMPLES</h5>        
            <h6 class="card-subtitle mb-2 text-body-secondary">Compre créditos do Master e gerencie nosso painel</h6>
            <h2 class="card-h2">Grátis</h2>
              <hr>
            <ul class="benefits">
              <li>Compre PicCoins</li>
              <li>Acesso permitido por revendedores Master</li>
              <li>Uso limitado para API PicPago</li>
              <li>Integração com WhatsApp</li>
              <li>Uso limitado do ChatBot</li>
              <li>Não pode criar revendedores</li>
              <li>Sem acesso a informações da equipe</li>
              <li>beneficio do plano</li>
              <li>beneficio do plano</li>
              <li>beneficio do plano</li>
            </ul>
            <a href="<?php echo site_url('signup/index') ?>" class="card-link">Quero contratar</a>          
          </div>
        </div>
  
        <div class="card .f-cont">
          <div class="recomendded">Recomendado</div>
          <div class="card-body">
            <h5 class="card-title">PLANO MASTER</h5>
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
            <a href="<?php echo site_url('master_signup/index') ?>" class="card-link">Quero contratar</a>          
          </div>
        </div>
  
        <div class="card .f-cont">
          <div class="recomendded3">Recomendado</div>
          <div class="card-body">
            <h5 class="card-title">PLANO ULTRA</h5>
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
            <a href="<?php echo site_url('ultra_signup/index') ?>" class="card-link">Quero contratar</a>          
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





  
  
 <!-----------------------------------------------------------------
    -------------------------- CONTACT--------------------------------
    ------------------------------------------------------------------>
      <div class="section">
        <div class="redirect-about btn-cont">
          <h4>Ainda restam dúvidas? Entre em contato com a nossa equipe agora mesmo!</h4>
          <a href="<?php echo site_url('contact/index') ?>">Contato</a>
        </div>
      </div>
  
  <div>
      <a class="whatsapp-link" href ="https://wa.me/553123420537?text=Olá PicPago, gostaria de saber mais sobre seus serviçoes ou fazer um orçamento!" target="_blank" ><i class="fab fa-whatsapp fa-wtp12"></i></a>
    </div>
  
    </div>
    <!--      FOOTER         -->
    <?php echo view('footer/index'); ?>


<!-- TEXT ANIMATION CDN LIB JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<!-- TEXT ANIMATION JS -->
<script> AOS.init()</script>
    