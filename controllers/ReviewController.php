<?php
require_once(CONTROLLERS."Controller.php");

class ReviewController extends Controller{
    public function __construct(){
        parent::__construct("ReviewModel");
    }

    public function show($pageView):string{

        if(isset($_POST["button"])){
            if($_POST["button"] == "rDelete") {
                $this->view->setResult($this->model->deleteReview($_POST["id"]));
            }
        }

        $this->view->setData('reviews',$this->model->getAllReviews());
        ob_start();
        $this->view->getView($pageView);
        return ob_get_clean();
    }

}

?>
