<html>
<head>
    <title>Resposta do Pagamento</title>
    <style>
        .qrcode{
            height:300px;
            width:300px;
        }
        form{
            background:white;
        }
        .logo-plans {
            display: flex;
            flex-direction: column;
            width: 60%;
            margin-left: 20%;
            justify-content: center;
            align-items: center;
            margin-top:20px;
        }
        .logo-plans img{
            width:20%!important;
        }
        .logo-plans h2 {
            font-size:24px;
            }
        .logo-plans h2 span{
            color:#00C040;
        }
        .select-plans{
            display: flex;
            flex-direction: column;
            align-content: center;
            justify-content: center;
            align-items: center;
        }
        .form-head{
            background:#252932 !important;
            padding: 1px;
            border: 2px solid black;
            border-bottom:none;
        }
        .general-form{
            border: 2px solid black;  
            border-top: none;
        }
        .form-head h2{
            font-weight:700;
            font-size: 26px;
            color:#00C040;
        }
        .form-head p{
            font-weight:500;
            font-size: 15px;
        }
        .card-body text {
            max-width:100px;
        }
        .pixcode {
            max-width: 280px; /* Defina aqui o tamanho máximo que você quer */
            overflow-wrap: break-word; /* Isso fará com que o texto quebre para a próxima linha caso ele ultrapasse o tamanho máximo. */
        }
        .pixcode-box {
            width: 350px;
            height: 150px;
            border: 2px solid #000;
            padding: 10px;
            cursor: pointer;
        }
        .card-body div{
            margin-bottom: 10px;
        }
        
        .modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.9);
}

.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

.close {
  position: absolute;
    top: 35px;
    right: 300px;
    color: white!important;
    font-size: 80px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
@media(max-width:800px){
    .close {
    position: absolute;
    top: 25px;
    right: 0px;
}
.pixcode-box {
    width: 300px;
    height: 150px;
    border: 2px solid #000;
    padding: 10px;
    cursor: pointer;
}
}
</style>
</head>
<body>
<div class="form-signin">
         <div class="card-header text-center form-head">
                <h2 class="form-signin-heading">Finalize agora mesmo seu pagamento!</h2>
                <p>Você também pode pagar pelo seu email, te enviamos um email agora mesmo!</p>
        </div>
        <div class= "general-form"> 
     <div class="card-body card-pix p30 rounded-bottom">
            <div>Valor: <?php echo $amount; ?> R$</div>
            <div>Descrição: Plano Revendedor Master</div>
            <div>Método de Pagamento: Pix</div>
            <div> Clique no código Pix copia e cola, e copie pague no seu banco:</div>
            <div class="pixcode-box" onclick="copyToClipboard('pixcode')">
           <p id="pixcode" class="pixcode"><?php echo $pixcode; ?></p>
            </div>
            <div>ID da transação: <?php echo $transactionId; ?></div>
           
        <div>Clique no QR Code para aumentar:
        <img class="qrcode" src="data:image/png;base64,<?php echo $qrcode ?>" alt="QR Code" onclick="openModal()"></div>

        <div id="myModal" class="modal">
          <span class="close" onclick="closeModal()">&times;</span>
          <img class="modal-content" id="img01">
        </div>

        
        <button class="w-100 btn btn-lg btn-primary" type="submit">Gerar QR Code</button>
       </div>
     <?php echo form_close(); ?>
    </div>
</div>


<script>
    function copyToClipboard(elementId) {
    var copyText = document.getElementById(elementId).innerText;
    var textarea = document.createElement("textarea");
    textarea.textContent = copyText;
    textarea.style.position = "fixed";  // Evita rolagem para o fim do corpo
    document.body.appendChild(textarea);
    textarea.select();
    try {
        return document.execCommand("copy");  // A função de copiar texto do security sandbox do Chrome
    } catch (ex) {
        console.warn("Copy to clipboard failed.", ex);
        return false;
    } finally {
        document.body.removeChild(textarea);
    }
}

function openModal() {
  document.getElementById('myModal').style.display = "block";
  document.getElementById('img01').src = document.querySelector('.qrcode').src;
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

</script>

</body>
</html>



































