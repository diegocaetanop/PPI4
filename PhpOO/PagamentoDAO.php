<?php
/**
 * Created by PhpStorm.
 * User: Alisson
 * Date: 12/11/2018
 * Time: 10:40
 */

class PagamentoDAO
{
    public function create(PagamentoVO $pagamentoVO,$conexao){
        $id_album=$pagamentoVO->getIdAlbum();
        $valor_final=$pagamentoVO->getValorFinal();
        $sql="insert into pagamento (valor_final,id_album,status) values ($valor_final,$id_album,'Pago');";
        $resposta=mysqli_query($conexao,$sql);
        if($resposta==true)
            return 1;
        else
            return 0;
    }

    public function update(PagamentoVO $pagamentoVO,$conexao){
        $id_album=$pagamentoVO->getIdAlbum();
        $valor_final=$pagamentoVO->getValorFinal();
        $data=$pagamentoVO->getDataPagamento();
        if($data==null)
            $sql="update pagamento set valor_final=$valor_final where id_album=$id_album;";
        else
            $sql="update pagamento set valor_final=$valor_final, data_pagamento='$data' where id_album=$id_album;";

        $resposta=mysqli_query($conexao,$sql);
        if($resposta==true)
            return 1;
        else
            return 0;
    }

    public function selectPagamentoAlbum(PagamentoVO $pagamentoVO,$conexao){
        $id_album=$pagamentoVO->getIdAlbum();
        $sql="select * from pagamento where id_album = '$id_album';";
        $retorno=mysqli_query($conexao,$sql);
        if(mysqli_num_rows($retorno)>=1)
            return 1;
        else
            return 0;
    }
}