<?php


namespace App\Model;

class Author
{
    private $id;
    private $name;
    private $biography;
    private $birth_date;
    private $death_date;

    public function __construct($name, $biography = null, $birth_date = null, $death_date = null, $id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->biography = $biography;
        $this->birth_date = $birth_date;
        $this->death_date = $death_date;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getBiography()
    {
        return $this->biography;
    }

    public function getBirthDate()
    {
        return $this->birth_date;
    }

    public function getDeathDate()
    {
        return $this->death_date;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setBiography($biography)
    {
        $this->biography = $biography;
    }

    public function setBirthDate($birth_date)
    {
        $this->birth_date = $birth_date;
    }

    public function setDeathDate($death_date)
    {
        $this->death_date = $death_date;
    }
}
