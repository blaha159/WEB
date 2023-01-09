<?php

require_once(CONTROLLERS."Controller.php");

class UsersController extends Controller{
    public function __construct(){
        parent::__construct("UsersModel");
    }

    /**
     * Ovládá logiku, zobrazuje stránku
     * @param $pageView defaultní stránka k zobrazení
     * @return string webová stránka
     */
    public function show($pageView):string{
        // Obsluha ovládání
        if(in_array(appSession::get('group_name'), array('superadmin','admin'))){
            if(isset($_POST["update"])){
                $this->view->setResult($this->model->updateGroup());
            } else if(isset($_POST["delete"])){
                $this->view->setResult($this->model->deleteUser());
            }
        }

        // Výběr dat
        $this->view->setData('users', $this->model->getAllUsers());
        $this->view->setData('groups', $this->model->getAllGroups());

        // Výpis view
        ob_start();
        $this->view->getView($pageView);
        return ob_get_clean();
    }
}

?>
