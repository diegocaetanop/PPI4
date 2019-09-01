<?php

function uploadFotos($arquivo,$diretorio){
    
    $error= -1;
    $success=0;

    for ($controle = 0; $controle < count($arquivo['name']); $controle++){
        $arquivo['name'][$controle]="img$controle.zip"; // renomeia as fotos no name indice controle
        $destino = $diretorio."/".$arquivo['name'][$controle];
        if(move_uploaded_file($arquivo['tmp_name'][$controle], $destino)){
            $success++;
        }else{
            $error++;
        }
    }
    if($success>0){
        echo "<br><div class='text-center' style='background-color:palegreen;padding:5px;border-radius:5px;margin-bottom:10px'><p style='color:#fff'>Upload feito com sucesso de $success imagens.</p></div>";
    }else
    if($error>=0){
        echo "<br><div class='text-center' style='background-color:#ff5555;padding:5px;border-radius:5px;margin-bottom:10px'><p style='color:#fff'>Falha no upload $error não foram carregadas.</p></div>";
    }  
}

function uploadZip($arquivo,$diretorio){

    $error= -1;
    $success=0;
    for ($controle = 0; $controle < count($arquivo['name']); $controle++){
        $arquivo['name'][$controle]="fotos.zip"; // renomeia as fotos no name indice controle
        $destino = $diretorio."/".$arquivo['name'][$controle];
        if(move_uploaded_file($arquivo['tmp_name'][$controle], $destino)){
            $success++;
        }else{
            $error++;
        }
    }
    if($success>0){
        echo "<div class='text-center' style='background-color:palegreen;padding:5px;border-radius:5px;margin-bottom:10px'><p style='color:#fff'>Upload feito com sucesso de $success imagens.</p></div>";
    }else
        if($error>=0){
            echo "<br><div class='text-center' style='background-color:#ff5555;padding:5px;border-radius:5px;margin-bottom:10px'><p style='color:#fff'>Falha no upload $error não foram carregadas.</p></div>";
        }
}

function extractFoto($diretorio){
    $arquivo = $diretorio.'/'.'fotos.zip';
    $destino = $diretorio;
    //die($destino);
    $zip = new ZipArchive;
    $zip->open($arquivo);

    $zip->extractTo($destino);
    $zip->close();
    unlink($destino.'/fotos.zip');
}
