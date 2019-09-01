<?php
    function criptoSenha($senha){
        return password_hash($senha,PASSWORD_DEFAULT);
    }