<?php echo view('includes/head'); ?>

 <header class="header-container">
     <div class="header">
    <a class="bio" href="https://picpago.com.br/"><img src="https://picpago.com.br/files/system/_file63f0c3d0aea6d-site-logo.png" alt="logo" class="logo"></a>
    <div class="menu-section">
      <div class="menu-toggle">
        <div class="one"></div>
        <div class="two"></div>
        <div class="three"></div>
      </div>
      <nav class="menuNav">
        <ul class="menu">
          <li><a class="btn" href="<?php echo site_url('documentation/index') ?>">Documentação</a></li>
          <li><a class="btn" href="#about-us">Sobre nós</a></li>
          <li><a class="btn" href="#plan">Planos</a></li>
          <li><a class="btn" href="<?php echo site_url('contact/index') ?>">Contate-nos</a></li>
          <li><a class="btn" id="ctaHeader" href="<?php echo site_url('signin/index') ?>">Entrar</a></li>
        </ul>
      </nav>
    </div>
    </div>
    </div>
  </header>



<script>
// MENU RESPONSIVO

let show = true

const menuSection = document.querySelector('.menu-section')
const menuToggle = document.querySelector('.menu-toggle')

menuToggle.addEventListener('click',()=>{
  // document.body.style.overflow = show ? "hidden" : "initial" 

  menuSection.classList.toggle('on', show)
  show = !show
  
})
</script>