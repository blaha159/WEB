<?php

require_once(MODELS."DatabaseModel.php");

class LoginModel extends DatabaseModel{
    /**
     * Zkusí registrovat uživatele, vrací číslo výsledku
     *   0 Uživatel se vytvořil
     *   1 Existuje uživatel se stejným jménem
     *   2 Existuje uživatel se stejným e-mailem
     *   3 Hesla se neschodují
     */
    public function register(){
        // Zadané parametry
        $rUsername = htmlspecialchars($_POST["rUsername"]);
        $rMail = htmlspecialchars($_POST["rMail"]);
        $rPassword = htmlspecialchars($_POST["rPassword"]);
        $rPassword2 = htmlspecialchars($_POST["rPassword2"]);

        // Login nebo email je zabraný
        $sql = "SELECT username, mail FROM users WHERE username = :username OR mail = :mail";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            "username" => $rUsername,
            "mail" => $rMail,
        ));
        $res = $query->fetch();
        if($res != null){
            if($res['username'] == $rUsername){
                return 1;
            }
            if($res['mail'] == $rMail){
                return 2;
            }
        }

        // Hesla se neshodují
        if($rPassword != $rPassword2){
            return 3;
        }

        // Zahashuj heslo
        $rPassword = password_hash($rPassword, PASSWORD_BCRYPT);

        // Registruj uživatele
        $sql = "INSERT INTO users(`username`, `password`, `mail`) VALUES ( :username, :password, :mail)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            "username" => $rUsername,
            "password" => $rPassword,
            "mail" => $rMail,
        ));
        return 0;
    }

    /**
     * Zkusí přihlásit uživatele, vrací číslo výsledku
     *   0 Uživatel se přihlásil
     *   1 Údaje byly špatně zadány
     */
    public function login(){
        // Zadané parametry
        $lUsername = htmlspecialchars($_POST["lUsername"]);
        $lPassword = htmlspecialchars($_POST["lPassword"]);

        // Vyber data
        $sql = "SELECT users.*, groups.nazev FROM users 
              INNER JOIN `groups` ON users.group_id = groups.id
              WHERE username = :username";

        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            "username" => $lUsername,
        ));
        $res = $query->fetch();

        // Přihlašovací jméno neexistuje
        if($res == null){
            return 1;
        }

        echo password_hash($lPassword,PASSWORD_BCRYPT);
        //print_r($res);
        // Hesla nejsou stejná
        if(!password_verify($lPassword, $res['password'])){
            return 1;
        }

        // Přihlaš uživatele
        appSession::set("id", $res["id"]);
        appSession::set("username", $res["username"]);
        appSession::set("group", $res["group_id"]);
        appSession::set("group_name", $res["nazev"]);
        return 0;
    }

    /**
     * Odhlásí uživatele
     */
    public function logout(){
        appSession::destroy();
    }
}

?>
