<?php
/**
 * Created by PhpStorm.
 * User: Alisson
 * Date: 01/11/2018
 * Time: 17:45
 */

class MensagemVO
{
    private $id_mensagem;
    private $mensagem;
    private $assunto;
    private $id_destino;
    private $id_origem;
    private $nome_cliente;

    /**
     * @return mixed
     */
    public function getIdOrigem()
    {
        return $this->id_origem;
    }

    /**
     * @param mixed $id_origem
     */
    public function setIdOrigem($id_origem)
    {
        $this->id_origem = $id_origem;
    }

    /**
     * @return mixed
     */
    public function getNomeCliente()
    {
        return $this->nome_cliente;
    }

    /**
     * @param mixed $nome_cliente
     */
    public function setNomeCliente($nome_cliente)
    {
        $this->nome_cliente = $nome_cliente;
    }



    /**
     * @return mixed
     */
    public function getIdMensagem()
    {
        return $this->id_mensagem;
    }

    /**
     * @param mixed $id_mensagem
     */
    public function setIdMensagem($id_mensagem)
    {
        $this->id_mensagem = $id_mensagem;
    }

    /**
     * @return mixed
     */
    public function getMensagem()
    {
        return $this->mensagem;
    }

    /**
     * @param mixed $mensagem
     */
    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;
    }

    /**
     * @return mixed
     */
    public function getAssunto()
    {
        return $this->assunto;
    }

    /**
     * @param mixed $assunto
     */
    public function setAssunto($assunto)
    {
        $this->assunto = $assunto;
    }

    /**
     * @return mixed
     */
    public function getIdDestino()
    {
        return $this->id_destino;
    }

    /**
     * @param mixed $id_destino
     */
    public function setIdDestino($id_destino)
    {
        $this->id_destino = $id_destino;
    }


}