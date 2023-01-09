<?php

require_once(MODELS."DatabaseModel.php");

class UsersModel extends DatabaseModel{
    /*
     * Vrátí všechny uživatele
     */
    public function getAllUsers():array {
        $sql = "SELECT users.*, `groups`.*, users.id id FROM users
                INNER JOIN `groups` ON users.group_id = `groups`.id";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();
        return $res;
    }

    /**
     * Vrátí všechny role
     */
    public function getAllGroups():array {
        $sql = "SELECT * FROM `groups`";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();
        return $res;
    }

    /**
     * Zkusí upravit uživateli roli, vrací číslo výsledku
     *   0 Role byla změněna
     *   1 Na změnu role nemá přihlášený uživatel dostatečné oprávnění
     */
    public function updateGroup():int {
        // Předané parametry
        $id = htmlspecialchars($_POST['id']);
        $group_id = htmlspecialchars($_POST['group_id']);

        // Proveď update
        $sql = "UPDATE users SET group_id = :group_id WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            'group_id' => $group_id,
            'id' => $id,
        ));
        return 0;
    }

    /**
     * Zkusí smazat uživatele (včetně všech jeho článků), vrací číslo výsledku
     *   0 Uživatel byl odstraněn
     *   1 Na odstranění uživatele nemá přihlášený uživatel dostatečné oprávnění
     */
    public function deleteUser():int {
        // Předané parametry
        $id = htmlspecialchars($_POST['id']);

        // Uživatel chce smazat vyššího uživatele
        $sql = "SELECT users.*,`groups`.nazev FROM users, `groups` WHERE users.id = :id AND users.group_id=`groups`.id";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            'id' => $id,
        ));
        $res = $query->fetch();
        if(in_array($res['nazev'], array('superadmin'))){
            return 1;
        }

        // Proveď delete
        $sql = "DELETE FROM users WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            'id' => $id,
        ));
        return 0;
    }
}

?>
