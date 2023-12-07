<?php

class Article extends CategorieArticle
{
    private $id;
    private $label;
    private $description;
    private $prix;
    private $image;
    private $categorie;

    public function __construct($id = "", $label = "", $description = "", $prix = "", $image = "", $categorie = "")
    {
        $this->id = $id;
        $this->label = $label;
        $this->description = $description;
        $this->prix = $prix;
        $this->image = $image;
        $this->categorie = $categorie;
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

    public function getDescription(): mixed
    {
        return $this->description;
    }

    public function setDescription(mixed $description): void
    {
        $this->description = $description;
    }

    public function getPrix(): mixed
    {
        return $this->prix;
    }

    public function setPrix(mixed $prix): void
    {
        $this->prix = $prix;
    }

    public function getImage(): mixed
    {
        return $this->image;
    }

    public function setImage(mixed $image): void
    {
        $this->image = $image;
    }

    public function getCategorie(): mixed
    {
        return $this->categorie;
    }

    public function setCategorie(mixed $categorie): void
    {
        $this->categorie = $categorie;
    }

    public function getCategoryLabel(): mixed
    {
        return $this->getCategorie()->getLabel();
    }

    public function create()
    {
        $connexion = connectBDD();
        $r = $connexion->prepare("INSERT INTO article (label, description, prix, image, categorie) VALUES (?, ?, ?, ?, ?)");
        $r->bindParam(1, $this->label);
        $r->bindParam(2, $this->description);
        $r->bindParam(3, $this->prix);
        $r->bindParam(4, $this->image);
        $r->bindParam(5, $this->categorie);
        $r->execute();
        $bdd = null;
    }

    public function find()
    {
        $bdd = connectBDD();
        $sql = "SELECT article.*, categorie_article.label as categorie_label FROM article
        LEFT JOIN categorie_article ON article.categorie = categorie_article.id
        WHERE article.id = ?";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(1, $this->id);
        $stmt->execute([$this->id]);
        $article = $stmt->fetch();
        $bdd = null;
        return $article;
    }

    public function update()
    {
        $bdd = connectBDD();
        $sql = "UPDATE article SET label = ?, description = ?, prix = ?, image = ?, categorie = ? WHERE id = ?";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(1, $this->label);
        $stmt->bindParam(2, $this->description);
        $stmt->bindParam(3, $this->prix);
        $stmt->bindParam(4, $this->image);
        $stmt->bindParam(5, $this->categorie);
        $stmt->bindParam(6, $this->id);
        $stmt->execute();
        $bdd = null;
    }

    public function delete()
    {
        $bdd = connectBDD();
        $sql = "DELETE FROM article WHERE id = ?";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $bdd = null;
    }

    public function findAll()
    {
        $bdd = connectBDD();
        $sql = "SELECT article.*, categorie_article.label as categorie_label FROM article
            LEFT JOIN categorie_article ON article.categorie = categorie_article.id";
        $stmt = $bdd->prepare($sql);
        $stmt->execute();
        $articles = $stmt->fetchAll();
        $bdd = null;
        return $articles;
    }

}