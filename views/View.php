<?php

class View{
    protected $dataFetch;
    protected $queryResult;

    /**
     * Sestaví stránku pro zobrazení
     */
    public function getView($page){
        global $dataFetch;
        global $queryResult;

        $dataFetch = $this->dataFetch;
        $queryResult = $this->queryResult;

        require(VIEWS."header.php");
        require(VIEWS.$page.".php");
        require(VIEWS."footer.php");
    }

    /**
     * Nastaví atribut data podle klíče
     */
    public function setData($key, $data){
        $this->dataFetch[$key] = $data;
    }

    /**
     * Vrátí atribut data podle klíče
     */
    public function getData($key):array{
        return $this->dataFetch[$key];
    }

    /**
     * Nastaví atribut result
     */
    public function setResult($res){
        $this->queryResult = $res;
    }

    /**
     * Nastaví atribut result
     */
    public function setResultKey($key, $res){
        $this->queryResult[$key] = $res;
    }


    /**
     * Vrátí atribut result
     */
    public function getResult():int{
        return $this->queryResult;
    }
}

?>
