<?php

function deletar_fotos(PessoaVO $pessoaVO,$diretorio){
    $nome=$pessoaVO->getNome();
    $id=$pessoaVO->getIdPessoa();
    $diretorio=$diretorio.$nome.$id;
    if(is_dir($diretorio)){
        //exclui as fotos do album
        foreach (scandir($diretorio)as $item){
            if(!in_array($item, array(".",".."))){
                unlink("$diretorio/".$item);

            }
        }
        rmdir($diretorio);// exclui o diretorio onde estavam as fotos (album)
        echo "<div class='text-center' style='background-color:palegreen;padding:5px;border-radius:5px;margin-bottom:10px'><p style='color:#070707'>As fotos do cliente $nome foram excluidas com sucesso.</p></div>";
    }else{
        echo "<div class='text-center' style='background-color:#ff5555;padding:5px;border-radius:5px;margin-bottom:10px'><p style='color:#fff'>Erro: as fotos do cliente $nome ja foram excluidas.</p></div>";
    }
}