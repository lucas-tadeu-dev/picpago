<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Apresentação da API - Nossa Empresa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #F9FAFB;
            color: #1F2937;
            max-width:100%!important;
        }

        h1, h2 {
            color: #00C040;
            margin-left: 10px;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            border-bottom: 1px solid #E5E7EB;
            padding-bottom: 10px;
            margin-left: 10px;
        }

        h2 {
            font-size: 2em;
            margin: 30px 0;
            margin-left: 10px;
        }

        p {
            font-size: 1.2em;
            margin-bottom: 20px;
            text-align: justify;
            margin-left: 10px;
        }

        ul {
            margin-bottom: 40px;
            margin-left: 10px;
        }
        ul li:nth-child(6){
            list-style:none;
        }
        
        .highlight {
            color: #00C040!important;
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
     /*box-shadow: 0 10px 20px -3px #ced4da; */
}
    </style>
</head>
<body>
    <h1>Bem-vindo à Nossa Plataforma de API!</h1>
    <h2>Impulsione Seu Negócio com Nossa Integração de API</h2>
    <p>Libere o potencial do seu negócio integrando a nossa API ao seu sistema. Desfrute de faturamento simplificado e facilitado usando o seu gateway de pagamento preferido. Oferecemos suporte a provedores renomados como Mercado Pago, Pagarme, PagHiper e Stripe.</p>
    
    
    
    
    <?php if ($role_id == 13 or $is_admin == 1): ?>
    <h2>Você é um revendedor Ultra e pode usar nossa API completamente!</h2>
    <ul>
        <li><p>Processos de faturamento e pagamento simplificados</p></li>
        <li><p>Integração com os principais gateways de pagamento</p></li>
        <li><p>Documentação de API abrangente para integração suave</p></li>
        <li><p>Acesse agora mesmo nossa documentação e começe a usar!</p></li>
        <li><p>Integração facilitada, e suporte!</p></li>
        <li><a class="home-a" href="https://picpago.com.br/index.php/documentation/index">Documentação</a></li>
    </ul>
<?php else: ?>
    <h2>Participe da Nossa Plataforma</h2>
    <p>Faça seu cadastro em nossa plataforma e obtenha acesso exclusivo à nossa API de última geração. Nossa documentação abrangente garante a integração perfeita por qualquer desenvolvedor!</p>

    <h2>Benefícios da Integração</h2>
    <ul>
        <li><p>Processos de faturamento e pagamento simplificados</p></li>
        <li><p>Integração com os principais gateways de pagamento</p></li>
        <li><p>Documentação de API abrangente para integração suave</p></li>
        <li><p>Acesso exclusivo para nossos usuários <span class="highlight">ULTRA</span></p></li>
    </ul>
<?php endif; ?>

    
    
    
    <h2>Contate-nos</h2>
    <p>Precisa de ajuda ou tem dúvidas? Estamos apenas a um clique de distância. Entre em contato conosco para qualquer pergunta, comentário ou sugestão. Estamos aqui para ajudar você!</p>
</body>
</html>




















