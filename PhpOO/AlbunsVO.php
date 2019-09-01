<?php
/**
 * Created by PhpStorm.
 * User: Alisson
 * Date: 04/10/2018
 * Time: 13:31
 */

class AlbunsVO
{
    public $id_album;
    public $nome;
    public $qtde_fotos;
    public $valor_base;
    public $valor_total;
    public $dispo_escolha;
    public $link_down;
    public $escolhas;
    public $id_pessoa;

    /**
     * @return mixed
     */
    public function getIdPessoa()
    {
        return $this->id_pessoa;
    }

    /**
     * @param mixed $id_pessoa
     */
    public function setIdPessoa($id_pessoa)
    {
        $this->id_pessoa = $id_pessoa;
    }


    /**
     * @return mixed
     */
    public function getIdAlbum()
    {
        return $this->id_album;
    }

    /**
     * @param mixed $id_album
     */
    public function setIdAlbum($id_album)
    {
        $this->id_album = $id_album;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getQtdeFotos()
    {
        return $this->qtde_fotos;
    }

    /**
     * @param mixed $qtde_fotos
     */
    public function setQtdeFotos($qtde_fotos)
    {
        $this->qtde_fotos = $qtde_fotos;
    }

    /**
     * @return mixed
     */
    public function getValorBase()
    {
        return $this->valor_base;
    }

    /**
     * @param mixed $valor_base
     */
    public function setValorBase($valor_base)
    {
        $this->valor_base = $valor_base;
    }

    /**
     * @return mixed
     */
    public function getValorTotal()
    {
        return $this->valor_total;
    }

    /**
     * @param mixed $valor_total
     */
    public function setValorTotal($valor_total)
    {
        $this->valor_total = $valor_total;
    }

    /**
     * @return mixed
     */
    public function getDispoEscolha()
    {
        return $this->dispo_escolha;
    }

    /**
     * @param mixed $dispo_escolha
     */
    public function setDispoEscolha($dispo_escolha)
    {
        $this->dispo_escolha = $dispo_escolha;
    }

    /**
     * @return mixed
     */
    public function getLinkDown()
    {
        return $this->link_down;
    }

    /**
     * @param mixed $link_down
     */
    public function setLinkDown($link_down)
    {
        $this->link_down = $link_down;
    }

    /**
     * @return mixed
     */
    public function getEscolhas()
    {
        return $this->escolhas;
    }

    /**
     * @param mixed $escolhas
     */
    public function setEscolhas($escolhas)
    {
        $this->escolhas = $escolhas;
    }


}