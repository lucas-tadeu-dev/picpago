<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
  <title>Shop PicCoins</title>
  <style>
      .float-shop{
              display: flex;
        flex-direction: row;
        align-content: center;
        justify-content: center;
        align-items: center;
          }
          label{
              width: 50%;
          }
          .form-control{
              width:30%;
          }
          .float-start{
              font-size:30px!important;
          }
          .shop-list{
            display: flex;
            flex-direction: row;
            align-content: center;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap:2%;
          }
          .shop-list li{
             width: 20%;
            display: flex;
            flex-direction: column;
            align-content: center;
            justify-content: center;
            align-items: center;
          }
          .shop-list li .piccoin-shop{
              width:80px;
          }
          .card-shop{
              padding:10px;
          }
          .card-shop a{
            background: #5b73e8!important;
            color: white;
            padding: 9px;
            border-radius: 7px;
            font-size: 17px;
          }
          .card-shop a:is(:hover,:focus,:touch){
              background: #00C040!important;
              color:white!important;
              transform:scale(1.1);
          }
           .card-shop p{
               font-size:21px;
               margin-bottom:10px!important;
               margin-top:10px!important;
           }
          .card-shop p:nth-child(3){
              border-top:1px solid white;
               border-bottom:1px solid white;
          }
          .btn-ct{
              transform: translateX(-15px);
          }
          @media (max-width:800px){
            .shop-list li{
             width: 90%;
          }  
           .header-shop{
             display: flex;
             justify-content: center;
             align-items: center;
          }
          }
          .pic-qtd{
           width: 35px!important;
           z-index: 1000;
           transform: translateY(-2px);
          }
          .float-pic-qtd{
              display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        align-content: center;
        justify-content: center;
        align-items: center;
        width: 150px;
          }
          .float-pic-qtd p{
            color: white!important;
            background-color: #252932 !important;
            padding: 8px 30px;
            border-radius: 10px;
            transform: translateX(10px);
          }
         
          .title-divider{
             display: inline-flex;
            flex-direction: column;
            text-align: justify;
            margin-bottom:10px;
          }
         
  </style>
</head>
<body>

<div id="page-content" class="page-wrapper clearfix">
    
    <div class="clearfix mb15 header-shop" >
        <h4 class="float-start">Loja de PicCoins</h4>
        
        <div class="float-end">
           <div class="float-pic-qtd">
               <?php if($login_user->is_admin){ ?>
                 <p style="font-size: 30px; font-family: Arial;">&infin;</p>
                 <style>.float-pic-qtd p {
    color: white!important;
    background-color: #252932 !important;
    padding: 0px 20px;
    border-radius: 10px;
    transform: translateX(10px);
}</style>
               <img class="pic-qtd" src="<?= base_url("assets/images/piccoin.png") ?>" alt="piccoin">
               <?php } else { ?>
               <p><?=  $formattedBalance = $piccoinData['balance']; ?></p>
               <img class="pic-qtd" src="<?= base_url("assets/images/piccoin.png") ?>" alt="piccoin">
               <?php }  ?>
           </div>
        </div>
    </div>
   
         <div class="title-divider">
            <h5>Compre PicCoins aqui de seu Revendedor.</h5>
        </div>

    <div class="row" id="items-container">
       <ul class="shop-list">
    <?php foreach ($packages as $package) : ?>
         <li class="card card-shop">
                <img class="piccoin-shop" src="<?= base_url("assets/images/piccoin.png") ?>" alt="piccoin">
                <p>Plano com <?= $package['coins_quantity']; ?> Créditos</p>
                <p><?=  $package['package_value']; ?> Reais por PicCoins</p>
                <p>R$<?php
                 $value = $package['package_value']; 
                 $price = $value * $package['coins_quantity'];
                 echo number_format($price, 2, ',','');
                ?></p>
               <a href="<?= site_url('package_payment/index/'.$package['package_id']); ?>" class="btn-shop">Comprar</a>
            
         </li>
    <?php endforeach; ?>

</ul>
    </div>
</div>






<script type="text/javascript">
$(document).ready(function(){
    $('#valueForm').appForm({
        isModal: false,
        onSuccess: function(result) {
            appAlert.success(result.message, {duration: 10000});

            var reloadUrl = "<?php echo site_url('shop/index'); ?>";
            if (reloadUrl) {
                setTimeout(function () {
                    window.location.href = reloadUrl;
                }, 500);
            }
        }
    });
});
</script>

</body>
</html>