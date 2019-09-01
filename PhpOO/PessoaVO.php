<?php


class PessoaVO
{
    public $id_pessoa;
    public $nome;
    public $cpf;
    public $endereco;
    public $email;
    public $senha;
    public $data_entrada;
    public $data_saida;
    public $permissao;
    public $telefone;

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

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
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getDataEntrada()
    {
        return $this->data_entrada;
    }

    /**
     * @param mixed $data_entrada
     */
    public function setDataEntrada($data_entrada)
    {
        $this->data_entrada = $data_entrada;
    }

    /**
     * @return mixed
     */
    public function getDataSaida()
    {
        return $this->data_saida;
    }

    /**
     * @param mixed $data_saida
     */
    public function setDataSaida($data_saida)
    {
        $this->data_saida = $data_saida;
    }

    /**
     * @return mixed
     */
    public function getPermissao()
    {
        return $this->permissao;
    }

    /**
     * @param mixed $permissao
     */
    public function setPermissao($permissao)
    {
        $this->permissao = $permissao;
    }


}