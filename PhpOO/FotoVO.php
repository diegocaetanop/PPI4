<?php
/**
 * Created by PhpStorm.
 * User: Alisson
 * Date: 13/10/2018
 * Time: 18:20
 */

class FotoVO
{
    private $id_foto;
    private $valor_foto;
    private $id_album;

    /**
     * @return mixed
     */
    public function getIdFoto()
    {
        return $this->id_foto;
    }

    /**
     * @param mixed $id_foto
     */
    public function setIdFoto($id_foto)
    {
        $this->id_foto = $id_foto;
    }

    /**
     * @return mixed
     */
    public function getValorFoto()
    {
        return $this->valor_foto;
    }

    /**
     * @param mixed $valor_foto
     */
    public function setValorFoto($valor_foto)
    {
        $this->valor_foto = $valor_foto;
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


}