<?php

namespace App\DAO;

use App\Model\Author;
use mysqli;

class AuthorDAO
{
    private $connection;

    public function __construct(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function findAll()
    {
        $sql = "SELECT * FROM authors";
        $result = $this->connection->query($sql);
        $authors = [];
        while ($row = $result->fetch_object(Author::class)) {
            $authors[] = $row;
        }
        return $authors;
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM authors WHERE id = $id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_object(Author::class);
    }
    
    public function create(Author $author)
    {
        $sql = "INSERT INTO authors (name, biography, birth_date, death_date) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ssss", $author->getName(), $author->getBiography(), $author->getBirthDate(), $author->getDeathDate());
        $stmt->execute();
    }

    public function update(Author $author)
    {
        $sql = "UPDATE authors SET name = ?, biography = ?, birth_date = ?, death_date = ? WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ssssi", $author->getName(), $author->getBiography(), $author->getBirthDate(), $author->getDeathDate(), $author->getId());
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM authors WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}