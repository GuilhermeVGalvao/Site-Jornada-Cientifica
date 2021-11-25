<?php

abstract class Validation {

    # valida parametros
    public static function filter(array $target, array $params) {

        $view = new View();
        $res = [];
        
        foreach ($params as $value => $type) {

            $type == 'int' ? $type = 'integer' : false;
            
            if ($p = @itisreally($target[$value])) {

                if (is_numeric($p) && $type !== "string") {

                    $p = doubleval($p);
                    if ($type === 'integer') {
                        $p = intval($p);
                    }

                }

                if (gettype($p) == $type) {
                    
                    $res = array_merge($res, [$value => $p]);

                } else {
                    $view->erro("Parâmetro $value deve ser $type", 'params_validation_type', true);
                }


            } else {
                $view->erro("Parâmetro $value está vazio", 'params_validation_error', true);
            }


        }

        return $res;

    }

    # valida imagens
    public static function validaImg(array $file) {  
        
        $nome = md5($file['name'].date('Y-m-d H:i:s'));

        // Pega a extensão
        $extensao = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        //lista de extensões e mime-types permitidos
        $list_ext_mime = array(
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'bmp' => 'image/bmp',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff'
        );

        //caso exista uma extensão como a do arquivo na lista
        if (array_key_exists($extensao, $list_ext_mime)) {
            //caso o mime-type do arquivo corresponda a da extensão
            if ($list_ext_mime[$extensao] == $file["type"]) {
                return [
                    'tmp_name' => $file["tmp_name"],
                    'name' => $nome.".".$extensao
                ];
            }
        }

        return false;

    }

}