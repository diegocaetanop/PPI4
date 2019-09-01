<?php
/**
 * Created by PhpStorm.
 * User: Alisson
 * Date: 04/10/2018
 * Time: 13:35
 */

class AlbunsDAO
{
    public function create(AlbunsVO $albunsVO, $conexao){

        $id_pessoa=$albunsVO->getIdPessoa();
        $nomeAlbum=$albunsVO->getNome();
        $valorBase=$albunsVO->getValorBase();

        // falta usar o objeto album
        //

        $sql="INSERT INTO `albuns` (id_album, nome_album, disponivel_escolha, qtde_fotos, preco_base, link_download_album, escolhidas, id_pessoa) 
              VALUES (default , '$nomeAlbum', 'S', '0', $valorBase, NULL, NULL, $id_pessoa);";
        return mysqli_query($conexao, $sql);
    }

    public function read(AlbunsVO $albunsVO,$conexao){
        $id_pessoa=$albunsVO->getIdPessoa();
        $sql="select * from albuns where id_pessoa=$id_pessoa;";
        $return=array();
        $resposta=mysqli_query($conexao,$sql);
        if (mysqli_num_rows($resposta)>0){
            $return = array();
            while ($res=mysqli_fetch_array($resposta)){
                $albunsVO->setIdAlbum($res['id_album']);
                $albunsVO->setNome($res['nome_album']);
                $albunsVO->setValorBase($res['preco_base']);
                $albunsVO->setValorTotal($res['valor_total']);
                $albunsVO->setDispoEscolha($res['disponivel_escolha']);
                $albunsVO->setEscolhas($res['escolhidas']);
                $albunsVO->setLinkDown($res['link_download_album']);
                $albunsVO->setQtdeFotos($res['qtde_fotos']);

                $return[]=clone $albunsVO;
            }
            return $return;
        }else
            return 0;
    }

    public function update(AlbunsVO $albunsVO,$conexao){
        $id_pessoa=$albunsVO->getIdPessoa();
        $valorBase=$albunsVO->getValorBase();
        $sql="update albuns set preco_base=$valorBase where id_pessoa=$id_pessoa";
        return mysqli_query($conexao, $sql);
    }

    public function add_fotos($diretorio){

    }

    public function selectAlbumCliente(AlbunsVO $albunsVO,$conexao){
        $nome_album=$albunsVO->getNome();
        $id=$albunsVO->getIdPessoa();

        $sql="select * from albuns where nome_album='$nome_album' and id_pessoa= $id;";
        $resposta=mysqli_query($conexao,$sql);
        if (mysqli_num_rows($resposta)>=1){
            $return = array();
            while ($res=mysqli_fetch_array($resposta)){
                $albunsVO->setIdAlbum($res['id_album']);
                $albunsVO->setNome($res['nome_album']);
                $albunsVO->setValorBase($res['preco_base']);
                $albunsVO->setValorTotal($res['valor_total']);
                $albunsVO->setDispoEscolha($res['disponivel_escolha']);
                $albunsVO->setEscolhas($res['escolhidas']);
                $albunsVO->setLinkDown($res['link_download_album']);
                $albunsVO->setQtdeFotos($res['qtde_fotos']);

                $return[]=clone $albunsVO;
            }
            return $return;
        }else
            return 0;
    }

    public function updateEscolhas(AlbunsVO $albunsVO,$conexao){

        $id=$albunsVO->getIdPessoa();
        $qtde_esc=$albunsVO->getQtdeFotos();
        $fotos_esc=$albunsVO->getEscolhas();
        $valor_total=$albunsVO->getValorTotal();
        $sql_update="update albuns set qtde_fotos=$qtde_esc ,escolhidas='$fotos_esc' ,valor_total=$valor_total where id_pessoa=$id;";
        return mysqli_query($conexao, $sql_update);
    }

    public function updateLinkDown(AlbunsVO $albunsVO, $conexao){
        $id=$albunsVO->getIdPessoa();
        $linkDown=$albunsVO->getLinkDown();
        $sql="update albuns set link_download_album='$linkDown ' where id_pessoa=$id;";
        $resposta=mysqli_query($conexao,$sql);
        if($resposta==1)
            return 1;
        else
            return 0;
    }
}