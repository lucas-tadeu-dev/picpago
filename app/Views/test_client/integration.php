<style>
    h5{
        font-size:16px;
    }
    .integration-response span{
     
    }
    .sucess{
        color:green;
    }
    .error{
        color:red;
    }
    /*.row-option label{*/
    /*width:30%!important;*/
    /*}*/
    /* .row-option .col-md-10{*/
    /*width:70%!important;*/
    /*}*/
</style>
<div class="tab-content">
    <?php echo form_open(get_uri("api_secretkey/updateSecretKeys/"), array("id" => "general-info-form", "class" => "general-form dashed-row white", "role" => "form")); ?>
    <div class="card">
        <div class=" card-header">
            <h4> <?php echo 'Integre seus meio de pagamento preferidos na nossa plataforma (obrigatório para receber pagamentos)!'; ?></h4>
        </div>
        <div class="card-body">
             <h5 class="integration-response">Escolha a forma com que você irá receber os pagamentos (método padrão Mercado Pago)!</h5>
             <div class="form-group">
                 
           
             <div class="form-group">
                  <div class="row row-option">
                    <label for="option" class="col-md-2"><?php echo 'Forma de Pagamento'; ?></label>
                    <div class="col-md-10">
                        <?php
                        echo form_dropdown(
                            'option',
                            array(
                                '1' => 'Mercado Pago',
                                '2' => 'Pagarme',
                                '3' => 'Stripe',
                                '4' => 'PagHiper'
                            ),
                            '1', // Default selection value
                            'id="option" class="form-control"'
                        );
                        ?>
                    </div>
               </div>
            </div>

                      
                      
            <!-- ---------------------------------------------------------------------------------------------------------------------------------------
             --------------------------------------------------------------MERCADO PAGO----------------------------------------------------------------- --------------------------------------------------------------------------------------------------------------------------------------->
             <h5 class="integration-response">Mercado Pago <?php if($secretkey['mercadopago'] && $secretkey['pkmercadopago']){ ?> <span class="sucess">integrado com sucesso!</span>  <?php } else{ ?> <span class="error">ainda não integrado!</span> <?php } ?> Importante: Sempre confira se suas chaves estão atualizadas!</h5>
             <p>Com o Mercado Pago seus clientes conseguem fazer pagamento em Pix e Cartão de Crédito (uso gratuito).</p>
                      
             <div class="form-group">
                <div class="row">
                    <label for="pkmercadopago" class=" col-md-2"><?php echo 'PublicKey Mercado Pago'; ?></label>
                    <div class=" col-md-10">
                        <?php
                        echo form_password(array(
                            "id" => "pkmercadopago",
                            "name" => "pkmercadopago",
                            "class" => "form-control",
                            "placeholder" => 'Cole aqui sua SecretKey - Seus dados são confidenciais!',
                            "autocomplete" => "off",
                            "data-rule-minlength" => 6,
                            "data-msg-minlength" => app_lang("enter_minimum_6_characters"),
                        ));
                        ?>
                    </div>
                </div>
            </div>
               
                <div class="form-group">  
                <div class="row">
                    <label for="mercadopago" class=" col-md-2"><?php echo 'SecretKey Mercado Pago'; ?></label>
                    <div class=" col-md-10">
                        <?php
                        echo form_password(array(
                            "id" => "mercadopago",
                            "name" => "mercadopago",
                            "class" => "form-control",
                            "placeholder" => 'Cole aqui sua SecretKey - Seus dados são confidenciais!',
                            "autocomplete" => "off",
                            "data-rule-minlength" => 6,
                            "data-msg-minlength" => app_lang("enter_minimum_6_characters"),
                        ));
                        ?>
                    </div>
                </div>
          </div>
            
           
            
            
            <!-- ---------------------------------------------------------------------------------------------------------------------------------------
             --------------------------------------------------------------PAGARME----------------------------------------------------------------- --------------------------------------------------------------------------------------------------------------------------------------->
            
            <h5 class="integration-response">Pagarme <?php if($secretkey['pagarme'] && $secretkey['pkpagarme']){ ?> <span class="sucess">integrado com sucesso!</span>  <?php } else{ ?> <span class="error">ainda não integrado!</span> <?php } ?> Importante: Sempre confira se suas chaves estão atualizadas!</h5>
            <p>Com a Pagarme seus clientes conseguem fazer pagamento com cartão de crédito (lembre-se que para ter conta na pagarme, tem que ser PJ e pagar o plano deles.</p>
              <div class="form-group">
                <div class="row">
                    <label for="pkpagarme" class=" col-md-2"><?php echo 'PublicKey Pagarme '; ?></label>
                    <div class=" col-md-10">
                        <?php
                        echo form_password(array(
                            "id" => "pkpagarme",
                            "name" => "pkpagarme",
                            "class" => "form-control",
                            "placeholder" => 'Cole aqui sua SecretKey - Seus dados são confidenciais!',
                            "autocomplete" => "off",
                            "data-rule-minlength" => 6,
                            "data-msg-minlength" => app_lang("enter_minimum_6_characters"),
                        ));
                        ?>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <label for="pagarme" class=" col-md-2"><?php echo 'PagarMe'; ?></label>
                    <div class=" col-md-10">
                        <?php
                        echo form_password(array(
                            "id" => "pagarme",
                            "name" => "pagarme",
                            "class" => "form-control",
                            "placeholder" => 'Cole aqui sua SecretKey - Seus dados são confidenciais!',
                            "autocomplete" => "off",
                            "data-rule-minlength" => 6,
                            "data-msg-minlength" => app_lang("enter_minimum_6_characters"),
                        ));
                        ?>
                    </div>
                </div>
            </div>
            
            
            
            <!-- ---------------------------------------------------------------------------------------------------------------------------------------
             --------------------------------------------------------------STRIPE----------------------------------------------------------------- --------------------------------------------------------------------------------------------------------------------------------------->
            
            <h5 class="integration-response">Stripe <?php if($secretkey['stripe'] && $secretkey['pkstripe']){ ?> <span class="sucess">integrado com sucesso!</span>  <?php } else{ ?> <span class="error">ainda não integrado!</span> <?php } ?>Importante: Sempre confira se suas chaves estão atualizadas!</h5>
            <p>Com a Stripe seus clientes conseguem fazer pagamento com Cartão de Crédito (uso gratuito, porém contêm taxas da própria stripe).</p>
              <div class="form-group">
                <div class="row">
                    <label for="pkstripe" class=" col-md-2"><?php echo 'PublicKey Stripe'; ?></label>
                    <div class=" col-md-10">
                        <?php
                        echo form_password(array(
                            "id" => "pkstripe",
                            "name" => "pkstripe",
                            "class" => "form-control",
                            "placeholder" => 'Cole aqui sua SecretKey - Seus dados são confidenciais!',
                            "autocomplete" => "off",
                            "data-rule-minlength" => 6,
                            "data-msg-minlength" => app_lang("enter_minimum_6_characters"),
                        ));
                        ?>
                    </div>
                </div>
            </div>
            
             <div class="form-group">
                <div class="row">
                    <label for="stripe" class=" col-md-2"><?php echo 'Stripe'; ?></label>
                    <div class=" col-md-10">
                        <?php
                        echo form_password(array(
                            "id" => "stripe",
                            "name" => "stripe",
                            "class" => "form-control",
                            "placeholder" => 'Cole aqui sua SecretKey - Seus dados são confidenciais!',
                            "autocomplete" => "off",
                            "data-rule-minlength" => 6,
                            "data-msg-minlength" => app_lang("enter_minimum_6_characters"),
                        ));
                        ?>
                    </div>
                </div>
            </div>
            
        
        <!-- ---------------------------------------------------------------------------------------------------------------------------------------
             --------------------------------------------------------------PAGHIPER----------------------------------------------------------------- --------------------------------------------------------------------------------------------------------------------------------------->
        
        <h5 class="integration-response">Paghiper <?php if($secretkey['paghiper'] && $secretkey['pkpaghiper']){ ?> <span class="sucess">integrado com sucesso!</span>  <?php } else{ ?> <span class="error">ainda não integrado!</span> <?php } ?> Importante: Sempre confira se suas chaves estão atualizadas!</h5>
        <p>Com a PagHiper seus clientes conseguem fazer pagamento em Pix e Boleto (uso gratuito).</p>
        
                <div class="form-group">
                <div class="row">
                    <label for="pkpaghiper" class=" col-md-2"><?php echo 'PublicKey Paghiper'; ?></label>
                    <div class=" col-md-10">
                        <?php
                        echo form_password(array(
                            "id" => "pkpaghiper",
                            "name" => "pkpaghiper",
                            "class" => "form-control",
                            "placeholder" => 'Cole aqui sua SecretKey - Seus dados são confidenciais!',
                            "autocomplete" => "off",
                            "data-rule-minlength" => 6,
                            "data-msg-minlength" => app_lang("enter_minimum_6_characters"),
                        ));
                        ?>
                    </div>
                </div>
            </div>
              <div class="form-group">
                <div class="row">
                    <label for="paghiper" class=" col-md-2"><?php echo 'PagHiper'; ?></label>
                    <div class=" col-md-10">
                        <?php
                        echo form_password(array(
                            "id" => "paghiper",
                            "name" => "paghiper",
                            "class" => "form-control",
                            "placeholder" => 'Cole aqui sua SecretKey - Seus dados são confidenciais!',
                            "autocomplete" => "off",
                            "data-rule-minlength" => 6,
                            "data-msg-minlength" => app_lang("enter_minimum_6_characters"),
                        ));
                        ?>
                    </div>
                </div>
            </div>
    </div>
            <?php echo view("custom_fields/form/prepare_context_fields", array("custom_fields" => $custom_fields, "label_column" => "col-md-2", "field_column" => " col-md-10")); ?> 

        </div>
        <div class="card-footer rounded-0">
            <button type="submit" class="btn btn-primary"><span data-feather="check-circle" class="icon-16"></span> <?php echo app_lang('save'); ?></button>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#general-info-form").appForm({
            isModal: false,
            onSuccess: function (result) {
                appAlert.success(result.message, {duration: 4000});
                setTimeout(function () {
                    window.location.href = "<?php echo get_uri("team_members/view/" . $user_info->id); ?>" + "/general";
                }, 500);
            }
        });
        $("#general-info-form .select2").select2();

        setDatePicker("#dob");

    });
</script>    