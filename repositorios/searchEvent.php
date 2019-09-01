<?php
/**
 * Created by PhpStorm.
 * User: Alisson
 * Date: 31/10/2018
 * Time: 20:39
 */

    include '../PhpOO/EventosVO.php';
    include '../PhpOO/EventosDAO.php';
    include '../PhpOO/conexao.php';

    $data_evento=$_POST['data_evento'];

    $eventoVO=new EventosVO();
    $eventoDAO=new EventosDAO();

    $eventoVO->setDataEvento($data_evento);
    echo $eventoDAO->search($eventoVO,$conexao);