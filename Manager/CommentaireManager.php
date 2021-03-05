<?php


class CommentaireManager
{
    private ?PDO $db;

    /**
     * CommentaireManager constructor.
     */
    public function __construct(){
        $this->db = DB::getInstance();
    }

    /**
     * @param bool $solo
     * @param array|null $id
     * @return array
     */
    public function getComment(): array{
        $comments = [];
        $conn = $this->db->prepare("SELECT * FROM commentaire");
        if($conn->execute()){
            foreach($conn->fetchAll() as $item){
                $comment = new Commentaire($item["id"]);
                $comment
                    ->setId($item["id"])
                    ->setContent($item["content"])
                    ->setUserFk($item["user_fk"])
                    ->setArticleFk($item["article_fk"])
                ;
                $comments[] = $comment;
            }
        }
        return $comments;
    }

    /**
     * @param Utilisateur $user
     * @param Commentaire $comment
     * @param Article $article
     * @return bool
     */
    public function insert(Utilisateur $user, Commentaire $comment, Article $article): bool {
        if(is_null($comment->getId())){
            $conn = $this->db->prepare("
                INSERT INTO commentaire (content, user_fk, article_fk) VALUES  ( :content, :user_fk, :article_fk)
            ");

            $conn->bindValue(":content", $comment->getContent());
            $conn->bindValue(":user_fk", $user->getId());
            $conn->bindValue(":article_fk", $article->getId());

            return $conn->execute();
        }
        return false;
    }
}