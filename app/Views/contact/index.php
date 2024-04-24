<?php echo view('header/index'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

<style>
body{
    overflow-Y:scroll;
}
body,
ul,
li,
p,h1,h2,h3,h4 {
  margin: 0;
  padding: 0;
  list-style: none;
  font-size: 1.2rem;
  font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
}
.contact-us{
    width: 100%;
    height: 100px;
    line-height: 100px;
    font-size: 60px;
    text-align: center;
    color: #FFFFFF;
    font-weight: bold;
    background-image: linear-gradient(#707070, #282828);
    margin-bottom: 30px;
}



.form-Container{
    display: flex;
    justify-content:center;
}
.form-content{
    width:600px;
}
form{
    display: flex;
    flex-direction: column;
}
input{
    border:3px solid black;
    height:38px;
}
input:hover{
   border:3px solid #00C040; 
}
label{
    font-size:16px;
    font-weight:700;
    color:#898fa9!important;
}
textarea{
     border:3px solid black; 
        height: 150px!important;
}
textarea:hover{
   border:3px solid #00C040; 
}
input,label{
    max-width:100%;
}
.botao{
    background:#6690F4;
    height:40px;
    color:white;
    font-size:20px;
    font-weight:700;
    margin-top:5px;
}

.form-content h3{
   color:#898fa9!important;
    font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size:25px;
    margin-bottom:20px;
    font-weight:bold;
}
.form-content h3 span{
    color:#00C040;
}
@media(max-width:500px){
    .form-content h3{
        margin-left:5%;
    }
   input,textarea,label{ 
    max-width:90%;
    margin-left:5%;
   }
    .contact-us{
    font-size: 30px;
}
}
@media(max-width:350px){
   input,textarea,label{ 
    max-width:300px;
    margin-left:10px;
   }
    
}
</style>

<!----------------------------------------------------------------------
------------------------------CONTACT-US---------------------------------
------------------------------------------------------------------------->
<div class='contact-us'>
FALE CONOSCO
</div>

<!----------------------------------------------------------------------
------------------------------CONTACT-US---------------------------------
------------------------------------------------------------------------->
<div class="form-Container">
    <div class="form-content">
        <h3>Você pode nos deixar <span>uma mensagem:</span></h3>
<?php 
    if(isset($erro)):
       echo  $erro->listErrors();
    endif;
    echo form_open('contact/submit');
    echo form_label('Seu nome*','nome');
    echo form_input('nome', set_value('nome'), ['class' => 'form-control']);
    echo form_label('Seu email*','email');
    echo form_input('email', set_value('email') , ['class' => 'form-control']);
    echo form_label('Seu Telefone*','phone');
    echo form_input('phone', set_value('telefone') , ['class' => 'form-control']);
    echo form_label('Assunto*','assunto');
    echo form_input('assunto', set_value('assunto') , ['class' => 'form-control']);
    echo form_label('Mensagem*','mensagem');
    echo form_textarea('mensagem', set_value('mensagem'), ['class' => 'form-control']);
    echo form_submit('enviar', 'Enviar mensagem >>', array('class'=>'botao'));
    echo form_close();
?>

    </div>
</div>

<!----------------------------------------------------------------------
------------------------------FOOTER---------------------------------
------------------------------------------------------------------------->
<?php echo view('footer/index'); ?>










