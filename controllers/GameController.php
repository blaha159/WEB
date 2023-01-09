<?php
require_once(CONTROLLERS."Controller.php");

class GameController extends Controller{
    public function __construct(){
        parent::__construct("GameModel");
    }

    public function show($pageView):string{

        if(isset($_POST["button"])){
            if($_POST["button"] == "gDelete") {
                $this->view->setResult($this->model->deleteGame($_POST["id"]));
            } else if($_POST["button"] == "gConfirm") {
                $this->view->setResult($this->model->confirmGame($_POST["id"]));
            } else if($_POST["button"] == "gRevoke") {
                $this->view->setResult($this->model->revokeGame($_POST["id"]));
            }
        }

        $this->view->setData('games',$this->model->getAllGames());
        ob_start();
        $this->view->getView($pageView);
        return ob_get_clean();
    }
    public function showDetail($pageView,$id):string{
        if(isset($_POST["nrSubmit"])){
            $this->view->setResult($this->model->newReview($id));
        }
        $this->view->setData('game',$this->model->getGame($id));
        $this->view->setData('reviews',$this->model->getReviewsByGame($id));
        ob_start();
        $this->view->getView($pageView);
        return ob_get_clean();
    }
}

?>
