<?php
/**
 * Created by PhpStorm.
 * User: Alisson
 * Date: 12/11/2018
 * Time: 10:33
 */

class PagamentoVO
{
    private $id_pagamento;
    private $referencia;
    private $valor_final;
    private $id_album;
    private $data_pagamento;

    /**
     * @return mixed
     */
    public function getDataPagamento()
    {
        return $this->data_pagamento;
    }

    /**
     * @param mixed $data_pagamento
     */
    public function setDataPagamento($data_pagamento)
    {
        $this->data_pagamento = $data_pagamento;
    }



    /**
     * @return mixed
     */
    public function getIdPagamento()
    {
        return $this->id_pagamento;
    }

    /**
     * @param mixed $id_pagamento
     */
    public function setIdPagamento($id_pagamento)
    {
        $this->id_pagamento = $id_pagamento;
    }

    /**
     * @return mixed
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * @param mixed $referencia
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;
    }

    /**
     * @return mixed
     */
    public function getValorFinal()
    {
        return $this->valor_final;
    }

    /**
     * @param mixed $valor_final
     */
    public function setValorFinal($valor_final)
    {
        $this->valor_final = $valor_final;
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