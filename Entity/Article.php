<?php


class Article
{
    private ?int $id;
    private ?string $title;
    private ?string $content;
    private ?int $author_fk;
    private ?int $category_fk;

    public function __construct(int $id = null, string $title = null, string $content = null, int $author_fk = null, int $category_fk = null){
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->author_fk = $author_fk;
        $this->category_fk = $category_fk;
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
     * @return $this
     */
    public function setId(?int $id): Article
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return $this
     */
    public function setTitle(?string $title): Article
    {
        $this->title = $title;
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
     * @return $this
     */
    public function setContent(?string $content): Article
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAuthorFk(): ?int
    {
        return $this->author_fk;
    }

    /**
     * @param int|null $author_fk
     * @return $this
     */
    public function setAuthorFk(?int $author_fk): Article
    {
        $this->author_fk = $author_fk;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCategoryFk(): ?int
    {
        return $this->category_fk;
    }

    /**
     * @param int|null $category_fk
     * @return $this
     */
    public function setCategoryFk(?int $category_fk): Article
    {
        $this->category_fk = $category_fk;
        return $this;
    }
}