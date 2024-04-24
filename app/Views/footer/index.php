<style>
.social-container{
    background-color:black;
     display: flex;
    justify-content:center;
    width:100%;
    /*bottom: 0;*/
    /*position: absolute;*/
    height: 300px;
}
.social{
    display: flex;
    align-items: center;
    gap: 100px;
}
.social-1{
    display: flex;
    flex-direction: column;
    gap:10px;
    border-right: 1px solid rgb(34, 34, 34);
    padding-right: 60px;
}
.social-1 a i{
    color:white!important;
}
.social-1 a i:hover{
   color:#6690F4;
}
.social-midias{
     display: flex;
    flex-direction: row;
    /*gap:10px;*/
}
.social-midias a{
    padding:8px;
}
.social-midias a:hover{
    background:#00C040;
    border-radius:100%;
}
.social-2{
    display: flex;
    flex-direction: column;
}

.footer-icon{
    font-size:25px!important;
}

ul li {
    list-style:none;
    font-size:17px;
   color:#00C040;
}
ul li a{
    color:white;
}
.social-ul li a{
    padding:1rem .4rem;
}

.social-ul li a:hover{
    background:#00C040;
    color:white;
    font-weight:700;
    border-radius:4px;
}
.social-ul{
   display: flex;
    flex-direction: column;
    gap:17px;
}
.logo-white{
    color:white;
     font-size:30px;
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

@media(max-width:500px){
  .social-container{
    height: auto;
}  
   .social{
    flex-wrap: wrap;
    margin: 20px;
} 
.social{
    gap:20px;
}
.social-1{
    border:none;
}
}
@media(max-width:1024px){
.social{
    gap:20px;
}
}
</style>


<div class='social-container'>
<div class='social'>
    
    <div class="social-1">
        <div class="social-ul social-logo">
        <!--<a class="bio" href="https://picpago.com.br/"><img src="https://picpago.com.br/files/system/_file63f0c3d0aea6d-site-logo.png" alt="logo" class="logo"></a>-->
        <a class="logo-white" href="https://picpago.com.br/"><span>PIC</span>PAGO</a>
        </div>
            <div class="social-midias">
                <a href = "https://wa.me/553123420537?text=Olá PicPago, gostaria de saber mais sobre seus serviçoes ou fazer um orçamento!" target="_blank"><i class="fa-brands fa-whatsapp footer-icon footer-icon1"></i></a>
                <a href="https://www.instagram.com/picpago/" target="_blank"><i class="fa-brands fa-instagram footer-icon"></i></a>
                <a href="" target="_blank"><i class="fa-brands fa-facebook footer-icon"></i></a>
                <a href="http://tiktok.com/@PicPagoOficial" target="_blank"><i class="fa-brands fa-tiktok footer-icon"></i></a>
                <a href="" target="_blank"><i class="fa-brands fa-twitter footer-icon"></i></a>
            </div>
        </div>
        
    <div class="social-2">
        <ul class="social-ul ul-social">
            <li>Navegação</li>
            <li><a href="#about-us">Sobre nós</a></li>
            <li><a href="#plan">Planos</a></li>
            <li><a href="<?php echo site_url('signin/index') ?>">Entrar</a></li>
        </ul>
    </div>
    
    <div class="social-3">
        <ul class="social-ul ul-social">
            <li>Suporte</li>
            <li><a href="<?php echo site_url('home/contact') ?>">Contate-nos</a></li>
            <li><a href="">FAQ</a></li>
            <li><a href="">Documentação</a></li>
        </ul>
    </div>
    
    <div class="social-4">
        <ul class="social-ul ul-social">
            <li>PicPago</li>
            <li><a href="">Sobre nós</a></li>
            <li><a href="">Planos</a></li>
            <li><a href="">Contate-nos</a></li>
        </ul>
    </div>
    
    <div class="social-5">
        <ul class="social-ul ul-social">
            <li>Contato</li>
           <li><a href="#plan">Quero ser cliente</a></li>
            <li><a href="calto:3123420537">31 2342-0537</a></li>
            <li><a href="<?php echo site_url('home/contact') ?>">Contate-nos</a></li>
        </ul>
    </div>
    
</div>
</div>




