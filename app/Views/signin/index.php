<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo view('includes/head'); ?>
        <style>
            .card .card-header{
                background-color:white!important;
            }
            .card-body{
                background-color:white!important; 
            }
             .general-form .form-control{
              background-color:white!important;    
            }
           .general-form .form-control:focus{
              background-color:#EEF1F9!important;    
            }
            .form-signin{
                    display: flex;
                flex-direction: row;
                max-width:100%!important;
                gap:15%;
            }
            .welcome-signin{
                width:40%;
            }
            .form-signin .card{
                width:30%;
                margin-left:10%;
                 max-height: 350px;
                 transform: translateY(140px);
            }
             .form-signin .card-header{
                 border: 3px solid #adb5bd!important;
                 border-bottom:none!important;
             }
              .form-signin .card-body {
                  border: 3px solid #adb5bd;
              }
            body{
                background: linear-gradient(to right, #EEF1F9 50%, white 50%)!important;
            }
            @media (max-width: 1024px) {
             .welcome-signin {
                transform: translateY(100px);
            }  
            }
            @media (max-width: 800px) {
                body{
                    background: linear-gradient(to bottom, #EEF1F9 50%, white 50%)!important;
                }
                .form-signin {
                   flex-direction: column;
                   margin:0!important;
                }
                .form-signin .card{
                    width: 90%;
                    margin-left: 10%;
                    max-height: 350px;
                     transform: translateY(30px);
                }
                .welcome-signin {
                    width: 100%;
                }
            }
        </style>
    </head>
    <body>
        <?php
        if (get_setting("show_background_image_in_signin_page") === "yes") {
            $background_url = get_file_from_setting("signin_page_background");
            ?>
            <style type="text/css">
                html, body {
                    background-image: url('<?php echo $background_url; ?>');
                    background-size:cover;
                }
            </style>
        <?php } ?>

        <?php if (get_setting("enable_footer")) { ?>
            <div class="scrollable-page">
            <?php } ?>
            
            <!----------------------------------------------------------------------------------------
            -------------------------------NEW EDIT LOGIN WELCOME-------------------------------------
            ----------------------------------------------------------------------------------------->

            <div class="form-signin">
                <?php
                if (isset($form_type) && $form_type == "request_reset_password") {
                    echo view("signin/reset_password_form");
                } else if (isset($form_type) && $form_type == "new_password") {
                    echo view('signin/new_password_form');
                } else {
                    echo view("signin/signin_form");
                }
                ?>
             <div class="welcome-signin">
            <img src="<?= base_url("assets/images/login.png") ?>" alt="imagem">
             </div>         
            </div>
            
            
            

            <?php if (get_setting("enable_footer")) { ?>
            </div>
        <?php } ?>

        <?php echo view("includes/footer"); ?>
    </body>
</html>