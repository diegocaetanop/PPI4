<?php
/**
 * Created by PhpStorm.
 * User: Alisson
 * Date: 31/10/2018
 * Time: 20:35
 */

class EventosDAO
{
    public function create(EventosVO $eventosVO, $conexao){
        $data_evento=$eventosVO->getDataEvento();
        if($this->search($eventosVO, $conexao)==1)
            return 0;
        $sql="insert into eventos (data_evento) value ('$data_evento');";
        $resposta=mysqli_query($conexao,$sql);
        if($resposta==true)
            return 1;
        else
            return 0;
    }
    public function search(EventosVO $eventosVO,$conexao){
        $data=$eventosVO->getDataEvento();
        $sql="select * from eventos where data_evento='$data';";
        $res = mysqli_query($conexao,$sql);
        if(mysqli_num_rows($res)>0)
            return 1;
        else
            return 0;

    }

    public function delete(EventosVO $eventosVO,$conexao){
        $data=$eventosVO->getDataEvento();
        $sql="Delete from eventos where data_evento='$data';";
        $res = mysqli_query($conexao,$sql);
        if($res==true)
            return 1;
        else
            return 0;

    }
}