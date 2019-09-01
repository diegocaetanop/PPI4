<?php
/**
 * Created by PhpStorm.
 * User: Alisson
 * Date: 25/09/2018
 * Time: 16:10
 */

class PessoaDAO
{
    public function create(PessoaVO $pessoaVO, $conexao){

        // retorna valores em memoria de pessoa
        //$id=$pessoaVO->getIdPessoa();
        $nome = $pessoaVO->getNome();
        $cpf = $pessoaVO->getCpf();
        $endereco = $pessoaVO->getEndereco();
        $telefone = $pessoaVO->getTelefone();
        $email = $pessoaVO->getEmail();
        $senha = $pessoaVO->getSenha();
        $data_entrada = date("y-m-d");
        //$permissao = $pessoaVO->getPermissao();

        $sql="insert into pessoa (nome, cpf, endereco, telefone, email, senha, data_entrada, permissao ) 
              VALUES ('$nome', $cpf, '$endereco', $telefone, '$email', '$senha', '$data_entrada', default );";

        return mysqli_query($conexao, $sql);
    }

    //seleciona todos os clientes
    public function read($conexao){

        //$pessoa_user=new PessoaVO();
        // Consulta ao banco de dados

        $sql = "SELECT * from pessoa where permissao='user' order by id_pessoa desc;";
        $resposta=mysqli_query($conexao,$sql);
        if(($resposta==true) && (mysqli_affected_rows($conexao)>0)){
            $pessoa_user=new PessoaVO();
            while ($res=mysqli_fetch_array($resposta)){
                $pessoa_user->setIdPessoa($res['id_pessoa']);
                $pessoa_user->setNome($res['nome']);
                $pessoa_user->setCpf($res['cpf']);
                $pessoa_user->setEmail($res['email']);
                $pessoa_user->setEndereco($res['endereco']);
                $pessoa_user->setTelefone($res['telefone']);
                $pessoa_user->setPermissao($res['permissao']);

                $return[]=clone $pessoa_user;
            }
            return $return;
        }else{
            echo"<div class=\"alert alert-danger\" role=\"alert\">  Não há nenhum cliente cadastrado !!!</div>";
            return 0;
        }
    }

    // atualiza dados do usuario
    public function update(PessoaVO $pessoa_user, $conexao){
        $id=$pessoa_user->getIdPessoa();
        $nome=$pessoa_user->getNome();
        $cpf=$pessoa_user->getCpf();
        $endereco=$pessoa_user->getEndereco();
        $telefone=$pessoa_user->getTelefone();
        $email=$pessoa_user->getEmail();

        $sql="UPDATE `pessoa` SET `nome` = '$nome', `cpf` = $cpf, `endereco` = '$endereco', `telefone` = $telefone, `email` = '$email'
                      WHERE id_pessoa = $id;";
        $resposta=mysqli_query($conexao,$sql);

        if($resposta==true)
            return 1;
        else
            return 0;
    }

    // deletar um usuario

    public function delete(PessoaVO $pessoa_user ,$conexao){

        $id=$pessoa_user->getIdPessoa();
        $sql="Delete from pessoa where id_pessoa=$id";
        $resposta= mysqli_query($conexao, $sql);
        if($resposta==true){
            echo"<script> alert('Cliente excluido com sucesso !!! '); window.location = 'clientes.php';</script>";
        }else
            echo "<script> alert('Erro ao excluir cliente !!! ');window.location = 'clientes.php';</script>";
    }

    public function login(PessoaVO $pessoaVO,$conexao){

        $nome=$pessoaVO->getNome();
        $senha=$pessoaVO->getSenha();

        $sql="select * from pessoa where nome='$nome' and senha ='$senha';";
        $resposta= mysqli_query($conexao, $sql);

        if($resposta==true){
            $pessoa_user=new PessoaVO();
            while ($res=mysqli_fetch_array($resposta)){
                $pessoa_user->setIdPessoa($res['id_pessoa']);
                $pessoa_user->setNome($res['nome']);
                $pessoa_user->setPermissao($res['permissao']);

                session_start();
                $_SESSION['user']=$res['permissao'];
                $_SESSION['id']=$res['id_pessoa'];

                $return[]=clone $pessoaVO;
            }

            return 1;
        }else{
            die("erro");
        }
    }

    public function loginCliente(PessoaVO $pessoaVO,$conexao){

        $email=$pessoaVO->getEmail();
        $senha=$pessoaVO->getSenha();

        $sql="select * from pessoa where email='$email';";
        //die($sql);
        $resposta= mysqli_query($conexao, $sql);

        if($resposta==true){
            $pessoa_user=new PessoaVO();
            while ($res=mysqli_fetch_array($resposta)){
                $pessoa_user->setIdPessoa($res['id_pessoa']);
                $pessoa_user->setNome($res['nome']);
                $pessoa_user->setPermissao($res['permissao']);
                $pessoa_user->setSenha($res['senha']);
                session_start();
                $_SESSION['user']=$res['permissao'];
                $_SESSION['id']=$res['id_pessoa'];

                $return[]=clone $pessoaVO;
            }

            if(password_verify($senha,$pessoa_user->getSenha())){
                return 1;
            }
        }else{
            die("erro");
        }
    }


    // seleciona um cliente expecifico

    public function selectClient(PessoaVO $pessoaVO,$conexao){

        $nome=$pessoaVO->getNome();
        // Consulta ao banco de dados
        $sql = "SELECT * from pessoa where permissao='user' and nome like '%$nome%';";
        $resposta=mysqli_query($conexao,$sql);
        if($resposta==true){
            $pessoa_user=new PessoaVO();
            while ($res=mysqli_fetch_array($resposta)){
                $pessoa_user->setIdPessoa($res['id_pessoa']);
                $pessoa_user->setNome($res['nome']);
                $pessoa_user->setCpf($res['cpf']);
                $pessoa_user->setEmail($res['email']);
                $pessoa_user->setEndereco($res['endereco']);
                $pessoa_user->setTelefone($res['telefone']);
                $pessoa_user->setPermissao($res['permissao']);

                $return[]=clone $pessoa_user;
            }
            var_dump($return);
            return $return;
        }else{
            die("erro");
        }
    }

    // seleciona um cliente espefico
    public function selectClientSpecific(PessoaVO $pessoaVO, $conexao){

        $sql_editar="select * from pessoa where id_pessoa=".$pessoaVO->getIdPessoa();
        $result= mysqli_query($conexao, $sql_editar);
        if(mysqli_num_rows($result) > 0){
            while ($res= mysqli_fetch_array($result)){

                $pessoaVO->setIdPessoa($res['id_pessoa']);
                $pessoaVO->setNome($res['nome']);
                $pessoaVO->setCpf($res['cpf']);
                $pessoaVO->setEmail($res['email']);
                $pessoaVO->setEndereco($res['endereco']);
                $pessoaVO->setTelefone($res['telefone']);

                $return[]=clone $pessoaVO;
            }
            return $return;
        }else{
            echo "erro";
        }
    }
}