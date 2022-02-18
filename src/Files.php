<?php

namespace gustin\electraphp;

class Files
{
    public static function createFile($filename)
    {
        if($filename == ""){
            echo "Arquivo Inválido.";
            exit();
        }
        if (empty($filename) || !isset($filename) || !$filename) {
            echo "Arquivo Inválido.";
            exit();
        }
        if(file_exists($filename)){ 
            echo "Arquivo já existente.";
            exit();
        };
        
        try {
            if(@fopen($filename, "x")) echo "Arquivo criado";
            @fclose($filename);
            return true;
        } catch (\Exception $e) {
            echo ("Erro ao criar arquivo.");
            exit();
        }
    }

    public static function removeFile($filename)
    {
        if (empty($filename) || !isset($filename) || !file_exists($filename)) {
            echo ("Arquivo não existente.");
            exit();
        }
        try {
            if(@unlink($filename)){
                echo "Arquivo removido.";
                return true;
            }
        } catch (\Exception $e) {
            echo ("Erro ao excluir.");
            exit();
        }
    }
    public static function readFile($filename){
        if($filename == ""){
            echo "Arquivo Inválido.";
            exit();
        }
        if (empty($filename) || !isset($filename) || !$filename) {
            echo "Arquivo Inválido.";
            exit();
        }
        
        try {
            $handle = fopen($filename,"r");
            $fileread = fread($handle,filesize($filename));
            return $fileread;
            fclose($filename);
        } catch (\Exception $e) {
            echo ("Erro ao criar arquivo.");
        }
    }
}
