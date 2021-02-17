<?php

namespace It20Academy\App\Models;

use It20Academy\App\Core\Db;

class Post
{
    private $id;
    private $authorId;
    private $statusId;
    private $categoryId;
    private $title;
    private $content;
    private $authorName;
    private $statusName;
    private $categoryName;
    private $img;

    public static function all(): array
    {
        $dbh = (new Db())->getHandler();

        $statement  = $dbh->query("SELECT posts.id, posts.title, posts.content, posts.author_id, authors.name AS author,  
posts.status_id, statuses.name AS status, posts.category_id, categories.name AS category, posts.img 
FROM authors 
JOIN posts 
ON authors.id=posts.author_id
JOIN categories
ON posts.category_id=categories.id
JOIN statuses
ON statuses.id=posts.status_id");

        $initialAllPosts = $statement->fetchAll();

        return array_map(function ($initialAllPost) {

            $post = new self;

            $post->setId($initialAllPost['id']);
            $post->setAuthorId($initialAllPost['author_id']);
            $post->setStatusId($initialAllPost['status_id']);
            $post->setCategoryId($initialAllPost['category_id']);
            $post->setTitle($initialAllPost['title']);
            $post->setContent($initialAllPost['content']);
            $post->setAuthorName($initialAllPost['author']);
            $post->setStatusName($initialAllPost['status']);
            $post->setCategoryName($initialAllPost['category']);
            $post->setImg($initialAllPost['img']);

            return $post;

        }, $initialAllPosts);
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setAuthorId(int $authorId): void
    {
        $this->authorId = $authorId;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function setAuthorName(string $authorName): void
    {
        $this->authorName = $authorName;
    }

    public function getAuthorName()
    {
        return $this->authorName;
    }

    public function setStatusId(int $statusId): void
    {
        $this->statusId = $statusId;
    }

    public function getStatusId()
    {
        return $this->statusId;
    }

    public function setStatusName(string $statusName): void
    {
        $this->statusName = $statusName;
    }

    public function getStatusName()
    {
        return $this->statusName;
    }

    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    public function setCategoryName(string $categoryName): void
    {
        $this->categoryName = $categoryName;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function getCategoryName()
    {
        return $this->categoryName;
    }

    public function setImg(string $img): void
    {
        $this->img = $img;
    }

    public function getImg()
    {
        return $this->img;
    }

    // РАБОТА ФУНКЦИЙ

    public function truncate_string($maxSymbol): string
    {

        if( mb_strlen($this->getContent()) > $maxSymbol ) {
            return substr_replace($this->getContent(), '...', $maxSymbol);
    } else {
        return $this->getContent();
    }
    }

    public function getFio($abbr): string {
        $fio = explode(' ', $abbr);

        return $fio[0] . ' ' .  mb_substr($fio[1], 0, 1) . '.';
    }
    public function slug($str): string {
        $str = trim($str);
        $str = mb_strtolower($str);
        $str = strtr($str, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
        $str = str_replace(' ', '-', $str);

        return $str;
    }
    public function getImgSlice($str): string {
        $str1 = explode('\\', $str);
        $str2 = array_slice($str1, -1)[0];
    
        return $str2;
    }
}