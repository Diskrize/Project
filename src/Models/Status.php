<?php

namespace It20Academy\App\Models;

use It20Academy\App\Core\Db;

class Status
{
    private $id;
    private $name;

public static function allStatuses(): array
    {
        $dbh = (new Db())->getHandler();
        $statement = $dbh->query('select * from statuses');
        $initialStatuses = $statement->fetchAll();
        
        // dump($initialStatuses);

        return array_map(function ($initialStatuses) {
            $statuses = new self;
            $statuses->setIdStatus($initialStatuses['id']);
            $statuses->setNameStatus($initialStatuses['name']);
            
            return $statuses;
        }, $initialStatuses);
    }

        // STATUSES

    public function setIdStatus($id): void
    {
        $this->id = $id;
    }

    public function getIdStatus(): string
    {
        return $this->id;
    }
    public function setNameStatus(string $name): void
    {
        $this->name = $name;
    }

    public function getNameStatus(): string
    {
        return $this->name;
    }
}