<?php

namespace It20Academy\App\Models;

use It20Academy\App\Core\Db;

class Author
{
    private $id;
    private $name;

public static function allAuthors(): array
    {
        $dbh = (new Db())->getHandler();
        $statement = $dbh->query('select * from authors');
        $initialAuthors = $statement->fetchAll();

        // dump($initialAuthors);

        return array_map(function ($initialAuthors) {
            $authors = new self;
            $authors->setIdAuthor($initialAuthors['id']);
            $authors->setNameAuthor($initialAuthors['name']);
            
            return $authors;
        }, $initialAuthors);
    }

        // STATUSES

    public function setIdAuthor($id): void
    {
        $this->id = $id;
    }

    public function getIdAuthor(): string
    {
        return $this->id;
    }
    public function setNameAuthor(string $name): void
    {
        $this->name = $name;
    }

    public function getNameAuthor(): string
    {
        return $this->name;
    }
}