<?php

namespace It20Academy\App\Models;

class Post
{
    private $id;
    private $title;
    private $content;
    private $author;
    private $status;
    private $category;
    private $img;

    public static function all(): array
    {
        $db = require_once '../storage/db.php';
        $posts = isset($db['posts']) ? $db['posts'] : [];

        return array_map(function ($initialPost) {
            $post = new self;
            $post ->setId($initialPost['id']);
            $post ->setTitle($initialPost['title']);
            $post ->setContent($initialPost['content']);
            $post ->setAuthor($initialPost['author']);
            $post ->setStatus($initialPost['status']);
            $post ->setCategory($initialPost['category']);
            $post ->setImg($initialPost['img']);
            return $post;
        }, $posts);
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

    public function getContent(): string
    {
        return $this->content;
    }



    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }



    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }




    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getCategory(): string
    {
        return $this->category;
    }




    public function setImg(string $img): void
    {
        $this->img = $img;
    }

    public function getImg(): string
    {
        return $this->img;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }
}