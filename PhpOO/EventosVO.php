<?php
/**
 * Created by PhpStorm.
 * User: Alisson
 * Date: 31/10/2018
 * Time: 20:34
 */

class EventosVO
{
    private $id;
    private $data_evento;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDataEvento()
    {
        return $this->data_evento;
    }

    /**
     * @param mixed $data_evento
     */
    public function setDataEvento($data_evento)
    {
        $this->data_evento = $data_evento;
    }

}