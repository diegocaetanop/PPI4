<?php


function inserirOrdem ($id_ordem,$data_ordem,$preco_total,$id_album){
    include '../conexao.php';
    
    $sql="select * from ordem_servico where id_ordem=$id_ordem;";
    $result=mysqli_query($conexao,$sql);
    if(mysqli_num_rows($result) > 0){
        $sql="update ordem_servico set preco_total=$preco_total, data_ordem='$data_ordem' where id_ordem=$id_ordem;";
        $result=mysqli_query($conexao,$sql);
        if($result!=1){
            
            die("erro up");
        }
        $sql2='update albuns set id_ordem='.$id_ordem.' where id_album='.$id_album.';';
        $result2=mysqli_query($conexao,$sql2);
        if($result2!=1){
            
            die("erro up albuns1");
        }
        
    }else{
        $sql="insert into ordem_servico (id_ordem,data_ordem,preco_total) values ($id_ordem,'$data_ordem',$preco_total)";
        $result=mysqli_query($conexao,$sql);
        if($result!=1){
            
          die("erro insert");
        }
        $sql2='update albuns set id_ordem='.$id_ordem.' where id_album='.$id_album.';';
        $result2=mysqli_query($conexao,$sql2);
        if($result2!=1){
            
            die("erro up albuns2");
        }
        
    }
}
