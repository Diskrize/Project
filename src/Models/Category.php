<?php

namespace It20Academy\App\Models;

use It20Academy\App\Core\Db;

class Category
{
    private $id;
    private $name;

public static function allCategories(): array
    {
        $dbh = (new Db())->getHandler();
        $statement = $dbh->query('select * from categories');
        $initialCategories = $statement->fetchAll();

        // dump($initialCategories);
        
        return array_map(function ($initialCategories) {
            $categories = new self;
            $categories->setIdCategory($initialCategories['id']);
            $categories->setNameCategory($initialCategories['name']);
            
            return $categories;
        }, $initialCategories);
    }

        // STATUSES

    public function setIdCategory($id): void
    {
        $this->id = $id;
    }

    public function getIdACategory(): string
    {
        return $this->id;
    }
    public function setNameCategory(string $name): void
    {
        $this->name = $name;
    }

    public function getNameCategory(): string
    {
        return $this->name;
    }
}