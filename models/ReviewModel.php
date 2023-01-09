<?php

require_once(MODELS."DatabaseModel.php");

class ReviewModel extends DatabaseModel{

    public function getAllReviews():array{
        $sql = "SELECT reviews.*,reviews.text reviewtext,reviews.id reviewid, users.username, games.* FROM reviews INNER JOIN games ON reviews.game_id = games.id 
                INNER JOIN users ON reviews.user_id = users.id";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();
        return $res;
    }

    public function deleteReview():int{
        $id = htmlspecialchars($_POST['id']);
        $sql = "DELETE FROM reviews WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            'id' => $id,
        ));
        return 0;
    }

}
?>
