<?php



class ArticleManager
{
    private ?PDO $db;

    /**
     * RandoManager constructor.
     */
    public function __construct(){
        $this->db = DB::getInstance();
    }

    /**
     * @return array
     */
    public function getArticle(): array{
        $articles = [];
        $conn = $this->db->prepare("SELECT * FROM article");
        if($conn->execute()){
            foreach($conn->fetchAll() as $item){
                $article = new Article($item["id"]);
                $article
                    ->setId($item["id"])
                    ->setTitle($item["title"])
                    ->setContent($item["content"])
                    ->setAuthorFk($item["author_fk"])
                    ->setCategoryFk($item["category_fk"])
                ;
                $articles[] = $article;
            }
        }
        return $articles;
    }

    /**
     * @param Article $article
     * @return bool
     */
    public function insert(Article $article): bool {
        if(is_null($article->getId())){
            $conn = $this->db->prepare("
                INSERT INTO article (title, content, author_fk, category_fk) VALUES  ( :title, :content, :author_fk, :duration, :category_fk)
            ");

            $conn->bindValue(":title", $article->getTitle());
            $conn->bindValue(":content", $article->getContent());
            $conn->bindValue(":author_fk", $article->getAuthorFk());
            $conn->bindValue(":category_fk", $article->getCategoryFk());

            return $conn->execute();
        }
        return false;
    }

    public function getCategory(Article $article): array
    {
        $articles = [];
        $conn = $this->db->prepare("
            SELECT a.id, a.title, a.content ,c.name
            FROM article as a
            INNER JOIN categorie as c ON a.category_fk = c.id WHERE a.id = :id
        ");
        $conn->bindValue(":id", $article->getId());
        if($conn->execute()){
            foreach($conn->fetchAll() as $item){
                $articles[] = $item;
            }
        }
        return $articles;
    }
}