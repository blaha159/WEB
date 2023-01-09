<?php

require_once(MODELS."DatabaseModel.php");

class GameModel extends DatabaseModel{
    public function getAllGames():array{
        $sql = "SELECT games.*, users.username FROM games
                INNER JOIN users ON games.author = users.id";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();
        return $res;
    }
    public function getGame($id):array{
        $sql = "SELECT games.*, users.username FROM games 
                INNER JOIN users ON games.author = users.id WHERE games.id = '" .$id."'";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();
        return $res;
    }

    public function getReviewsByGame($id):array{
        $sql = "SELECT reviews.*, users.username FROM reviews INNER JOIN games ON reviews.game_id = games.id 
                INNER JOIN users ON reviews.user_id = users.id WHERE games.id = '" .$id."'";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();
        return $res;
    }

    public function newReview($id)
    {
        $nrText = htmlspecialchars($_POST["nrText"]);
        $nrRisk = $_POST["nrRisk"];
        $nrUseful = 0;
        if (isset($_POST["nrUseful"]) && $_POST["nrUseful"]) {
            $nrUseful = 1;
        }

        $sql = "INSERT INTO reviews(`user_id`, `risk`, `useful`,`text`,`game_id`) VALUES ( :user_id, :risk, :useful, :text, :game_id)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            "user_id" => appSession::get('id'),
            "risk" => $nrRisk,
            "useful" => $nrUseful,
            "text" => $nrText,
            "game_id" => $id
        ));
        return 0;
    }

    public function getMyGames():array{
        $sql = "SELECT games.*, users.username FROM games
                INNER JOIN users ON games.author = users.id WHERE games.author = :user_id";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            "user_id" => appSession::get('id')
        ));
        $res = $query->fetchAll();
        return $res;
    }

    public function newGame()
    {
        $cHome = htmlspecialchars($_POST["cHome"]);
        $cAway = htmlspecialchars($_POST["cAway"]);
        $cText = htmlspecialchars($_POST["cText"]);
        $cDate = $_POST["cDate"];
        $cTime = $_POST["cTime"];

        $sql = "INSERT INTO games(`home`, `away`, `date`,`time`,`author`,`text`,soubor) VALUES ( :home, :away, :date,:time, :author, :text, :soubor)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            "author" => appSession::get('id'),
            "home" => $cHome,
            "away" => $cAway,
            "date" => $cDate,
            "time" => $cTime,
            "text" => $cText,
            "soubor" => basename($_FILES["cSoubor"]["name"])
        ));

        $id = $this->pdo->lastInsertId();
        if (count($_FILES)>0) {
            $target_dir = "uploads/";
            $target_file = $target_dir . $id;
            if (move_uploaded_file($_FILES["cSoubor"]["tmp_name"], $target_file)) {
                //echo "The file ". htmlspecialchars( basename( $_FILES["cSoubor"]["name"])). " has been uploaded.";
            } else {
                //echo "Sorry, there was an error uploading your file.";
                return 10;
            }
        };
        return 0;
    }

    public function deleteGame($id):int
    {
        $reviews = $this->getReviewsByGame($id);
        if (count($reviews) > 0) {
            return 3;
        } else {
            // Proveď delete
            $sql = "DELETE FROM games WHERE id = :id";
            $query = $this->pdo->prepare($sql);
            $query->execute(array(
                'id' => $id,
            ));
            return 2;
        }
    }

    public function confirmGame($id):int
    {
        // Proveď delete
        $sql = "UPDATE games set approved = 1 WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            'id' => $id,
        ));
        return 0;
    }

    public function revokeGame($id):int
    {

        // Proveď delete
        $sql = "UPDATE games set approved = 0 WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            'id' => $id,
        ));
        return 0;
    }
}

?>
