<?php

namespace App\Controller;

use App\DAO\AuthorDAO;
use App\Model\Author;
use mysqli;

class AuthroController
{
    private $dao;

    public function __construct(mysqli $connection)
    {
        $this->dao = new AuthorDAO($connection);
    }

    public function index()
    {
        $authors = $this->dao->findAll();
        return json_encode([
            'authors' => $authors,
            'message' => 200
        ]);
    }

    public function show($id)
    {
        $author = $this->dao->findById($id);
       
       if(!$author) {
            return json_encode([
                'message' => 'Author not found',
                'status' => 404
            ]);
        }

        return json_encode($author);
    }

    public function store(Author $author)
    {
        $validation = $this->validate($author);
        if ($validation) {
            return json_encode($validation);
        }

        $this->dao->create($author);
        return json_encode([
            'message' => "Author created successfully",
            'status' => 201
        ]);
    }

    public function update(Author $author)
    {
        $validation = $this->validate($author);
        if ($validation) {
            return json_encode($validation);
        }

        $existingAuthor = $this->dao->findById($author->getId());
        if (!$existingAuthor) {
            return json_encode([
                'message' => 'Author not found',
                'status' => 404
            ]);
        }

        $this->dao->update($author);
        return json_encode([
            'message' => "Author updated successfully",
            'status' => 200
        ]);
    }

    public function destroy($id)
    {
        $author = $this->dao->delete($id);
        if($author) {
            return json_encode([
                'message' => 'Author not found',
                'status' => 404
            ]);
        }

        $this->dao->delete($id);
        return json_encode([
            'message' => "Author deleted successfully",
            'status' => 200
        ]);

    }

    private function validate(Author $author)
    {
        if (empty($author->getName())) {
            return [
                'message' => "Name is required",
                'status' => 400
            ];
        }

        if (empty($author->getBiography())) {
            return [
                'message' => "Biography is required",
                'status' => 400
            ];
        }

        if (empty($author->getBirthDate())) {
            return [
                'message' => "Birth date is required",
                'status' => 400
            ];
        }

        if ($author->getDeathDate() !== null && strtotime($author->getDeathDate()) === false) {
            return [
                'message' => "Death date is invalid",
                'status' => 400
            ];
        }

        return false;
    }

}
