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
        .form-container1{
             max-width:350px;
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
         
}}
.button{
    background:#00C040!important;
    color:white;
    font-weight:800;
    height: 40px;
    width: 100px;
    border-radius: 10px;
    font-size:17px;
}
        
    </style>
</head>
<body>
    <h1>Dados do CEO da PicPago, Israel.</h1>
    
    <div class="all-form">
        
        <!----------------------------------------------------------------------------------------------
        ----------------------------------- CHAVE SECRETA ----------------------------------------------
        ----------------------------------------------------------------------------------------------->
    <div class="form-container1">
        <h2>SecretKey:</h2>
    <?php echo form_open('admin/store'); ?>
        <div class="form-input">   
        <label for="mercadopago">Mercado Pago:</label>
        <input class="form-control" type="text" id="mercadopago" name="mercadopago" value="<?= $admin['mercadopago']; ?>">
        </div> 
        
        <div class="form-input">  
        <label for="stripe">Stripe:</label>
        <input class="form-control" type="text" id="stripe" name="stripe" value="<?= $admin['stripe']; ?>">
        </div> 
        
        <div class="form-input">  
        <label for="pagarme">Pagar.me:</label>
        <input class="form-control" type="text" id="pagarme" name="pagarme" value="<?= $admin['pagarme']; ?>">
        </div> 
        
        <div class="form-input">  
        <label for="paghiper">PagHiper:</label>
        <input class="form-control" type="text" id="paghiper" name="paghiper" value="<?= $admin['paghiper']; ?>">
        </div> 
        
        <input class="button" type="submit" value="Salvar">
     <?php echo form_close();
    ?>
    </div>
    
           <!----------------------------------------------------------------------------------------------
        ----------------------------------- CHAVE PLÚBICA ----------------------------------------------
        ----------------------------------------------------------------------------------------------->
    
    <div class="form-container1">
        <h2>PublicKey:</h2>
    <?php echo form_open('admin/store'); ?>
        
         <div class="form-input">   
        <label for="pkmercadopago">Mercado Pago:</label>
        <input class="form-control" type="text" id="pkmercadopago" name="pkmercadopago" value="<?= $admin['pkmercadopago']; ?>">
        </div>   
        
         <div class="form-input">   
        <label for="pkstripe">Stripe:</label>
        <input class="form-control" type="text" id="pkstripe" name="pkstripe" value="<?= $admin['pkstripe']; ?>">
         </div>
        
         <div class="form-input">   
        <label for="pkpagarme">Pagar.me:</label>
        <input class="form-control" type="text" id="pkpagarme" name="pkpagarme" value="<?= $admin['pkpagarme']; ?>">
        </div>

         <div class="form-input">   
        <label for="pkpaghiper">PagHiper:</label>
        <input class="form-control" type="text" id="pkpaghiper" name="pkpaghiper" value="<?= $admin['pkpaghiper']; ?>">
        </div>
         
        <input class="button" type="submit" value="Salvar">
     <?php echo form_close(); ?>
    </div>
    
    
         <!------------------------------------------------------------------------------------------
        ----------------------------------- PLANOS---- ----------------------------------------------
        --------------------------------------------------------------------------------------------->
    <div class="form-container1">
        <h2>Valor dos Planos Master e Ultra em Reais R$:</h2>
    <?php echo form_open('admin/store'); ?>
        
         <div class="form-input">   
        <label for="master_value">Valor do plano Master:</label>
        <input class="form-control" type="text" id="master_value" name="master_value" value="<?= $admin['master_value']; ?>">
        </div>
    
         <div class="form-input">   
        <label for="ultra_value">Valor do plano Ultra:</label>
        <input class="form-control" type="text" id="ultra_value" name="ultra_value" value="<?= $admin['ultra_value']; ?>">
        </div>
        
         <div class="form-input">   
        <label for="six_months_descount">Desconto em % para 6 meses:</label>
        <input class="form-control" type="text" id="six_months_descount" name="six_months_descount" value="<?= $admin['six_months_descount']; ?>">
        </div>    
        
         <div class="form-input">   
        <label for="one_year_descount">Desconto em % para 1 ano:</label>
        <input class="form-control" type="text" id="one_year_descount" name="one_year_descount" value="<?= $admin['one_year_descount']; ?>">
        </div>    

        <input class="button" type="submit" value="Salvar">
     <?php echo form_close(); ?>
    </div>
    
 </div> 
</body>
</html>
