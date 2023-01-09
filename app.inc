<?php

require_once("appSession.inc");

class app {

    public function start(){
        appSession::start();

        if(isset($_GET["page"]) && array_key_exists($_GET["page"], WEB_PAGES)){
            $pageKey = $_GET["page"];
        } else {
            $pageKey = HOME;
        }
        if(isset($_GET["id"])){
            $id = $_GET["id"];
        }
        $pageInfo = WEB_PAGES[$pageKey];

        require_once(CONTROLLERS.$pageInfo["controller"].".php");
        $pageController = new $pageInfo["controller"];

        if(isset($id)){
            echo $pageController->showDetail($pageInfo["view"],$id);
        }else {
            echo $pageController->show($pageInfo["view"]);
        }

    }
}

?>

