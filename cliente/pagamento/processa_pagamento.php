<?php
include '../../PhpOO/conexao.php';
include '../../repositorios/validaUsuario.php';

    // recebe valores da pagina anterior
    $id_item=$_POST['id'];
    $preco_total=$_POST['preco_total'];
    $ref=$_POST['ref'];
    $nome_comprador=$_POST['nome_comprador'];
    $email=$_POST['email'];
    $data= date('y-m-d');

            // carrega o formulario com as informações da compra 
            // o script no final da pag se encarrega se auto submeter quando toda a operação for finalizada
?>
<body>
    <form method="post" action="https://pagseguro.uol.com.br/v2/checkout/payment.html" name="myform">  
          
                        <!-- Campos obrigatórios -->  
                        <!-- Campos obrigatórios -->  
        <input name="receiverEmail" type="hidden" value="alisson-gs@hotmail.com">  
        <input name="currency" type="hidden" value="BRL">  
  
        <!-- Itens do pagamento (ao menos um item é obrigatório) -->  
        <input name="itemId1" type="hidden" value="<?php echo$id_item?>">  
        <input name="itemDescription1" type="hidden" value="Album de fotos <?php echo$nome_comprador?>">  
        <input name="itemAmount1" type="hidden" value="<?php echo$preco_total?>">  
        <input name="itemQuantity1" type="hidden" value="1">  
          
  
        <!-- Código de referência do pagamento no seu sistema (opcional) -->  
        <input name="reference" type="hidden" value="<?php echo$ref?>">  
          
         
  
        <!-- Dados do comprador (opcionais) -->  
        <input name="senderName" type="hidden" value="<?php echo$nome_comprador?>">  
        
        <input name="senderEmail" type="hidden" value="<?php echo$email?>">  
  
                        </form>
<script type="text/javascript">
var t = setTimeout ("document.myform.submit ();", 2); // 2 segundos medidos em milissegundos 
</script>
</body>