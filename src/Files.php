<?php

namespace gustin\electraphp;

class Files
{
    /**
     * @param string $filename
     * @return string
     */
    public static function createFile($filename)
    {
        if ($filename == "") {
            return "Arquivo Inválido.";
        }
        if (empty($filename) || !isset($filename) || !$filename) {
            return "Arquivo Inválido.";
        }
        if (file_exists($filename)) {
            return "Arquivo já existente.";
        };
        try {
            if (@fopen($filename, "x")) {
                @fclose($filename);
                return "Arquivo criado";
            };
        } catch (\Exception $e) {
            return "Erro ao criar arquivo.";
        }
    }

    /**
     * @param string $filename
     * @return string
     */
    public static function removeFile($filename)
    {
        if (empty($filename) || !isset($filename) || !file_exists($filename)) {
            return "Arquivo não existente.";
        }
        try {
            if (@unlink($filename)) {
                return "Arquivo removido.";
            }
        } catch (\Exception $e) {
            return "Erro ao excluir.";
        }
    }
    /**
     * @param string $filename
     * @return string
     */
    public static function readFile($filename)
    {
        if ($filename == "") {
            return "Arquivo Inválido.";
        }
        if (empty($filename) || !isset($filename) || !$filename) {
            return "Arquivo Inválido.";
        }
        if (filesize($filename) == 0) {
            return "Arquivo vazio.";
        }
        try {
            $handle = fopen($filename, "r");
            $fileread = fread($handle, filesize($filename));
            fclose($filename);
            return $fileread;
        } catch (\Exception $e) {
            throw new \Error("Erro ao criar arquivo.");
        }
    }
}
