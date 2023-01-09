<?php
class Controller{
    public function __construct($model){
        require_once(MODELS.$model.".php");
        $this->model=new $model;

        require_once(VIEWS."View.php");
        $this->view=new View();
    }
}
?>
