<?php
/**
 * Created by PhpStorm.
 * User: Alisson
 * Date: 13/10/2018
 * Time: 18:24
 */

class FotoDAO
{
    public function read($conexao){
        $sql="select valor_foto from fotos where id_foto=1;";
        $resultado=mysqli_query($conexao,$sql);
        while ($res=mysqli_fetch_array($resultado)){
            $valor_foto=$res['valor_foto'];
        }
        return $valor_foto;
    }

    public function update(FotoVO $fotoVO,$conexao){
        $id_foto=$fotoVO->getIdFoto();
        $valor_foto=$fotoVO->getValorFoto();

        $sql="update fotos set valor_foto = $valor_foto where id_foto=$id_foto;";
        return mysqli_query($conexao,$sql);
    }
}