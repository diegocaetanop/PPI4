<?php
/**
 * Created by PhpStorm.
 * User: Alisson
 * Date: 01/11/2018
 * Time: 17:46
 */

class MensagemDAO
{
    public function create(MensagemVO $mensagemVO, $conexao){
        $id_destino=$mensagemVO->getIdDestino();
        $id_origem=$mensagemVO->getIdOrigem();
        $mensagem=$mensagemVO->getMensagem();
        $assunto=$mensagemVO->getAssunto();
        $nome_cliente=$mensagemVO->getNomeCliente();

        $sql="insert into mensagem (mensagem,assunto,nome_cliente,id_destino,id_origem) values
                ('$mensagem','$assunto','$nome_cliente',$id_destino,$id_origem) ";
        return mysqli_query($conexao,$sql);
    }

    public function select(MensagemVO $mensagemVO,$conexao){
        $id_destino=$mensagemVO->getIdDestino();
        $id_origem=$mensagemVO->getIdOrigem();

        if(!empty($id_origem))
            $sql="select * from mensagem where id_origem=$id_origem order by id_mensagem desc; ";
        else
            $sql="select * from mensagem where id_destino=$id_destino order by id_mensagem desc; ";

        $return = array();
        $resposta=mysqli_query($conexao,$sql);
        if(mysqli_num_rows($resposta)>0){
            while($res=mysqli_fetch_array($resposta)){
                $mensagemVO->setIdMensagem($res['id_mensagem']);
                $mensagemVO->setAssunto($res['assunto']);
                $mensagemVO->setMensagem($res['mensagem']);
                $mensagemVO->setNomeCliente($res['nome_cliente']);
                $mensagemVO->setIdDestino($res['id_destino']);
                $mensagemVO->setIdOrigem($res['id_origem']);

                $return[]=clone $mensagemVO;
            }

            return $return;
        }else{
            return 0;
        }
    }
    public function countMessages(MensagemVO $mensagemVO,$conexao){
        $id_destino=$mensagemVO->getIdDestino();
        $sql="select count(*) as total_mensagem from mensagem where id_destino=$id_destino or id_origem=$id_destino;";
        $resultado=mysqli_query($conexao,$sql);
        if($resultado==true){
            while ($res=mysqli_fetch_array($resultado)){
                $total_mensagens=$res['total_mensagem'];
            }
            return $total_mensagens;
        }else{
            return 0;
        }
    }
}