<?php

class Validator{
    private $erreurs=[];


    public function getErreurs()
    {
        return $this->erreurs;
    }

    public function addErreur(string $key,$erreur){
        $this->erreurs[$key]= $erreur;
    }

    public function isValid():bool{
        return empty($this->erreurs);
    }

    public function isEmpty(string $data,string $key,string $erreur):bool{
        if (empty($data)) {
            $this->addErreur($key, $erreur);
            return true;
        }
        return false;
    }


    public function isNumber(int|float $data,string $key,string $erreur,int $min=1,int $max=1000000):bool{
        if (!filter_var($data, FILTER_VALIDATE_INT, ["options" => ["min_range" => $min, "max_range" => $max] ])) {
            $this->addErreur($key, $erreur);
            return false;
        }
        return true;
    }
}