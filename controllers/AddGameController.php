<?php

require_once(CONTROLLERS."Controller.php");

class AddGameController extends Controller {
    public function __construct(){
        parent::__construct("GameModel");
    }

    /**
     * Ovládá logiku, zobrazuje stránku
     * @param $pageView defaultní stránka k zobrazení
     * @return string webová stránka
     */
    public function show($pageView):string{
        // Obsluha nového článku
        if(isset($_POST["cSubmit"])){
            $this->view->setResult($this->model->newGame());
        }

        // Výběr dat
        $this->view->setData('games', $this->model->getMyGames());

        // Výpis view
        ob_start();
        $this->view->getView($pageView);
        return ob_get_clean();
    }


}

?>
