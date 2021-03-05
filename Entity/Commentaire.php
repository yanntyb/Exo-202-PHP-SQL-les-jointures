<?php


class Commentaire
{
    private ?int $id;
    private ?string $content;
    private ?int $user_fk;
    private ?int $article_fk;

    public function __construct(int $id = null, string $content = null, int $user_fk = null, int $article_fk = null){
        $this->id = $id;
        $this->content = $content;
        $this->user_fk = $user_fk;
        $this->article_fk = $article_fk;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): Commentaire
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string|null $content
     */
    public function setContent(?string $content): Commentaire
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserFk(): ?int
    {
        return $this->user_fk;
    }

    /**
     * @param int|null $user_fk
     */
    public function setUserFk(?int $user_fk): Commentaire
    {
        $this->user_fk = $user_fk;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getArticleFk(): ?int
    {
        return $this->article_fk;
    }

    /**
     * @param int|null $article_fk
     */
    public function setArticleFk(?int $article_fk): Commentaire
    {
        $this->article_fk = $article_fk;
        return $this;
    }



}