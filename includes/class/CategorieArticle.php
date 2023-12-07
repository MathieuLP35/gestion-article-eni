<?php

class CategorieArticle
{

        private $id;
        private $label;

        public function __construct($id = "", $label = "")
        {
            $this->id = $id;
            $this->label = $label;
        }

        public function getId(): mixed
        {
            return $this->id;
        }

        public function setId(mixed $id): void
        {
            $this->id = $id;
        }

        public function getLabel(): mixed
        {
            return $this->label;
        }

        public function setLabel(mixed $label): void
        {
            $this->label = $label;
        }

        public function create()
        {
            $bdd = connectBDD();
            $sql = "INSERT INTO categorie_article (label) VALUES (?)";
            $stmt = $bdd->prepare($sql);
            $stmt->bindParam(1, $this->label);
            $stmt->execute([$this->label]);
            $bdd = null;
        }

        public function find()
        {
            $bdd = connectBDD();
            $sql = "SELECT * FROM categorie_article WHERE id = ?";
            $stmt = $bdd->prepare($sql);
            $stmt->bindParam(1, $this->label);
            $stmt->execute([$this->id]);
            $categorie = $stmt->fetch();
            $bdd = null;
            return $categorie;
        }

        public function update()
        {
            $bdd = connectBDD();
            $sql = "UPDATE categorie_article SET label = ? WHERE id = ?";
            $stmt = $bdd->prepare($sql);
            $stmt->bindParam(1, $this->label);
            $stmt->execute([$this->label, $this->id]);
            $bdd = null;
        }

        public function delete()
        {
            $bdd = connectBDD();
            $sql = "DELETE FROM categorie_article WHERE id = ?";
            $stmt = $bdd->prepare($sql);
            $stmt->bindParam(1, $this->label);
            $stmt->execute([$this->id]);
            $bdd = null;
        }

        public function findAll()
        {
            $bdd = connectBDD();
            $sql = "SELECT * FROM categorie_article";
            $stmt = $bdd->prepare($sql);
            // UTF-8 pour les accents
            $stmt->execute();
            $categories = $stmt->fetchAll();
            $bdd = null;
            return $categories;
        }

}