<div class="container-fluid">
    <input type="hidden" name="contact_id" value="<?php echo $model_info->id; ?>" />
    <input type="hidden" name="client_id" value="<?php echo $model_info->client_id; ?>" />
    
    
    <div class="form-group">
                <div class="row">
                    <label for="mercadopago" class=" col-md-2"><?php echo 'Mercado Pago'; ?></label>
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
            
    
    
    
    <?php
//show these filds during new contact creation
    if (!$model_info->id) {
        ?>
        <div class="form-group">
            <div class="row">
                <label for="email" class="<?php echo $label_column; ?>"><?php echo app_lang('email'); ?></label>
                <div class="<?php echo $field_column; ?>">
                    <?php
                    echo form_input(array(
                        "id" => "email",
                        "name" => "email",
                        "value" => $model_info->email,
                        "class" => "form-control",
                        "placeholder" => app_lang('email'),
                        "data-rule-email" => true,
                        "data-msg-email" => app_lang("enter_valid_email"),
                        "data-rule-required" => true,
                        "data-msg-required" => app_lang("field_required"),
                        "autocomplete" => "off"
                    ));
                    ?>
                </div>
            </div>
        </div>
    <?php } ?>


    <?php echo view("custom_fields/form/prepare_context_fields", array("custom_fields" => $custom_fields, "label_column" => $label_column, "field_column" => $field_column)); ?> 

    <?php
//show these filds during new contact creation
//also check the client login setting

    if (!$model_info->id && !get_setting("disable_client_login")) {
        ?>
        <div class="form-group">
            <div class="row">
                <label for="login_password" class="col-md-3"><?php echo app_lang('password'); ?></label>
                <div class=" col-md-8">
                    <div class="input-group">
                        <?php
                        $password_field = array(
                            "id" => "login_password",
                            "name" => "login_password",
                            "class" => "form-control",
                            "placeholder" => app_lang('password'),
                            "readonly" => "readonly",
                            "onfocus" => "this.removeAttribute('readonly');",
                            "style" => "z-index:auto;"
                        );
                        if (!$model_info->id) {
                            //this filed is required for new record
                            $password_field["data-rule-required"] = true;
                            $password_field["data-msg-required"] = app_lang("field_required");
                            $password_field["data-rule-minlength"] = 6;
                            $password_field["data-msg-minlength"] = app_lang("enter_minimum_6_characters");
                        }
                        echo form_password($password_field);
                        ?>
                        <label for="password" class="input-group-text mb-0 clickable" id="generate_password"><span data-feather="key" class="icon-16"></span> <?php echo app_lang('generate'); ?></label>
                    </div>
                </div>
                <div class="col-md-1 p0">
                    <a href="#" id="show_hide_password" class="btn btn-default" title="<?php echo app_lang('show_text'); ?>"><span data-feather="eye" class="icon-16"></span></a>
                </div>
            </div>
        </div>

        <div class="form-group ">
            <div class="col-md-12">  
                <?php
                echo form_checkbox("email_login_details", "1", true, "id='email_login_details' class='form-check-input'");
                ?> <label for="email_login_details"><?php echo app_lang('email_login_details'); ?></label>
            </div>
        </div>
         <div class="card-footer">
            <button type="submit" class="btn btn-primary"><span data-feather="check-circle" class="icon-16"></span> <?php echo "Salvar"; ?></button>
        </div>
    <?php } else if ($login_user->is_admin) { ?>
        <div class="form-group ">
            <div class="row">
                <label for="is_primary_contact"  class="<?php echo $label_column; ?>"><?php echo app_lang('primary_contact'); ?></label>

                <div class="<?php echo $field_column; ?>">
                    <?php
                    //is set primary contact, disable the checkbox
                    $disable = "";
                    if ($model_info->is_primary_contact) {
                        $disable = "disabled='disabled'";
                    }
                    echo form_checkbox("is_primary_contact", "1", $model_info->is_primary_contact, "id='is_primary_contact' class='form-check-input mt-2' $disable");
                    ?> 
                </div>
            </div>
        </div>
    <?php } ?>
</div>

