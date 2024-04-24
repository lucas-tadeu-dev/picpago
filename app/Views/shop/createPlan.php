<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Pagamento</title>
    <style>
        .secret-key,.pk-secret-key{
            margin:30px;
        }
        label{
            font-size:20px;
        }
        .button{
            margin-top:20px;
        }      
        form{
            border-bottom:1px solid white;  
            padding-bottom: 20px;
        }
        .form-input{
            display:flex;
            flex-direction:column;
        }
        .all-form{
            display: flex;
        flex-wrap: wrap;
        gap:40px;
        margin:20px;
        }
        .all-form span{
            color:#00C040;
        }
        .form-container1{
             max-width:320px;
             background-color: #252932 !important;
             padding:20px;
            border-radius:10px;
        }
        @media(max-width:800px){
            form{
            display: flex;
            flex-direction: column;
            align-content: center;
            justify-content: center;
            align-items: center;
         
          }
        }
            .text-form{
                 display: flex;
                 flex-direction:column;
                   margin-left: 20px;
            }
                .text-form h3{
                    margin-left:20px;
                }
                 .text-form span{
                  color:#00C040;
                }
        .submit{
            background: #00C040!important;
            color: white;
            padding: 9px;
            border-radius: 7px;
            font-size: 17px;
            margin-top:15px;
          }
          .submit:is(:focus,:hover,:touch){
            background: #5b73e8 !important;
            color: white;
            padding: 11px;
          }
          .Create-plan-container{
              display: flex;
          }
           @media(max-width:800px){
             .Create-plan-container{
              flex-direction:column;
          }   
             .form-container1 {
                max-width: 100%;
                text-align: center;
            }
               
           }
    </style>
</head>
<body>
    <div class="text-form">
    <h2><span>Crie Planos</span> para que seus revendedores possam comprar PicCoins de você!</h2>
      <h4><span>1.</span> É muito fácil, primeiro defina o valor que você quer para cada PicCoin (Defina apenas uma vez.)</h4>
      <h4><span>2.</span>  Agora vá em Criar planos e defina quantas moedas PicCoin terá no seu plano</h4>
      <h4><span>3.</span>  Pronto, você será redirecionado para Loja de PicCoins e seus revendedores poderão comprar seus planos!</h4>
      <h4><span>Obs:</span> Recomendamos que você utilize o valor do Euro por PicCoin!</h4>
    </div>
    
    <div class="Create-plan-container">
   
     
    <!--Second Box-->
    <div class="all-form">
    <div class="form-container1">
        <h2><span>Crie</span> um Plano aqui:</h2>
        <?php echo form_open('shop/createPackage',['id' => 'valueFormPackage']); ?>
        <div class="form-input">   
        <label for="coins_quantity">Quantidade de PicCoins por plano:</label>
        <p>(valor númerico)</p>
        <input class="form-control" type="number" id="coins_quantity" name="coins_quantity">
        </div> 
        
        <div class="form-input">   
        <label for="package_value">Valor da moeda PicCoin por plano:</label>
        <p>(valor númerico)</p>
        <input class="form-control" type="number" id="package_value" name="package_value">
        </div> 
        
        <input class="submit" type="submit" value="Criar Plano">
        <?php echo form_close();
        ?>
        </div>
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
                }, 1000);
            }
        }
    });
});
</script> 
<script type="text/javascript">
$(document).ready(function(){
    $('#valueFormPackage').appForm({
        isModal: false,
        onSuccess: function(result) {
            appAlert.success(result.message, {duration: 10000});

            var reloadUrl = "<?php echo site_url('shop/index'); ?>";
            if (reloadUrl) {
                setTimeout(function () {
                    window.location.href = reloadUrl;
                }, 1000);
            }
        }
    });
});
</script> 
</body>
</html>
