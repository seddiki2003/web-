<?php

class event
{
    private int $id;
    private string $nomevent;
    private string $description;
    private int $date;

    public function __construct(string $nomevent, string $description, int $date)
    {
        $this->description = $nomevent;
        $this->description = $description;
        $this->date = $date;
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function getdescription()
    {
        return $this->description;
    }
    public function getdate()
    {
        return $this->date;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($description)
    {
        $this->prenom = $description;
    }

    public function setdate($date)
    {
        $this->date = $date;
    }

    public function getId()
    {
        return $this->id;
    }
}
