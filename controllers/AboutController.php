<?php
require_once(CONTROLLERS."Controller.php");

class AboutController extends Controller{
    public function __construct(){
    	parent::__construct("DatabaseModel");
    }

    public function show($pageView):string{
        ob_start();
        $this->view->getView($pageView);
        return ob_get_clean();
    }
}
?>
